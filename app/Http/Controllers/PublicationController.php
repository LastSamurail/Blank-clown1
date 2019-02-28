<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Categorie;
use App\Models\Publication;
use App\Http\Controllers\FileUploadController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Input;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
    {
        $this->middleware('utilisateur');
    }

    public function index()
    {
        $publications = Publication::all();
        return view('utilisateur.publication.index',compact('publications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $categories= Categorie::all();
        return view('utilisateur.publication.create',compact('users','categories'));
    }


    public function uploadFile(Request $request){
       $id_user = Auth::User()->id;
       if ($request->hasFile('fichier') && $request->file('fichier')->isValid()) {
           if (Str::contains($request->file('fichier')->getClientMimeType(),'pdf')) {
               $directory="public/documents/utilisateur".$id_user; 
               $file_name=$request->file('fichier')->extension();
               //Si le dossier de stockage n'existe pas, il se cree automatiquement
               if (!is_dir($directory)) {
                   Storage::makeDirectory($directory);
               }
               $path=$request->file('fichier')->storeAs($directory,$file_name);

               
               //Publications::createAction('fichier_upload',['fichier=>$file_name']);
           }
       }
       return $path;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /**** Systeme de validation ****/

       $path=$this->uploadFile($request);
         $this->validate($request, 
        [
            'titre'=>'required|string|max:30',
            'libelle'=>'required|unique:publications',
            'categorie'=>'required',
            //'fichier'=>'required',
        ],

        [
                'required'=>'Veuillez remplir ce champs svp',
                'confirmed'=>'Les mots de passe de correspondent pas',
                'unique'=>'Ce email existe déja, veuillez en saisir un autre',
                'numeric'=>'Ce champs ne doit contenir que des chiffres',
                'email'=>'Veuiller saisir une adresse mail valide svp',
                'min'=>'Ce champs doit contenire au moins 4 caractères',
        ]);

         /*******Fin du systeme de validation *****/

         /***** Debut d'enregistrement ****/
         $id_users = Auth::User()->id;
         $id_departement_users = Auth::User()->departement_id;
         //dd($id_users);
        // dd($request->fichier);
         $categories = Categorie::all();

        Publication::create([
            'titre'=>$request->titre,
            'libelle'=>$request->libelle,
            'categories_id'=>$request->categorie,
            'departement_pub'=>$id_departement_users,
            'user_id'=>$id_users,
            'fichier'=>$path,
            
        ]);

        //dd($request->titre);
        /***** Fin d'enregistrement ****/

        /***** Message Flash et redirection  ****/
        session()->flash('message','La publication '.$request->titre.' a été crée avec succès');
        return redirect(route('publication.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
