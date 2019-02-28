<?php
use App\Models\TypeDepartement;
use App\Models\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Page d'acceuil

Route::get('/', function () {
    return view('index');
})->name('index');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
/*****/
Route::prefix('moderateur/dashboard')->group(function (){
	Route::get('index','ModerateurDashboardController@index')->name('moderateur.dashboard');
});

/*****/
Route::prefix('utilisateur/dashboard')->group(function (){
	Route::get('index','UtilisateurDashboardController@index')->name('utilisateur.dashboard');
});

/*************************** Administrateur Routes    *******************************/
Route::post('/admin/post', 'Auth\AdminController@AdminLogin')->name('connectAdmin');

/********  ******/
Route::get('/admin/login', 'Auth\AdminController@showLogin')->name('admin.login');

Route::get('/admin/logout','Auth\AdminController@logout')->name('admin.logout');

Route::get('/utilisateur/logout','UtilisateurController@logout')->name('utilisateur.logout');

Route::get('/moderateur/logout','ModerateurController@logout')->name('moderateur.logout');


Route::prefix('admin')->group(function(){
	Route::get('/admin','AdminDashboardController@index')->name('admin');
	Route::resource('utilisateur','UtilisateurController');
	Route::resource('moderateur','ModerateurController');
	Route::resource('categorie','CategorieController');
	Route::resource('departement','DepartementController');
});


/******** Routes qui concernent l'Utilisateurs simple ********/
Route::prefix('utilisateur')->group(function(){
	Route::get('/utilisateur','UtilisateurDashboardController@index')->name('utilisateur');
	Route::resource('publication','PublicationController');
	
});

/******* Routes qui concernent le Moderateur  ********/
Route::prefix('moderateur')->group(function(){
	Route::get('/moderateur','ModerateurDashboardController@index')->name('moderateur');
	Route::resource('publicationValide','PublicationValideController');
	
});

