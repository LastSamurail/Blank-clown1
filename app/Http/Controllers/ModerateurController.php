<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Publication;
use App\Models\Departement;


class ModerateurController extends Controller
{
    
     public function __construct()
    {
        $this->middleware('admin');
    }

    //Fonction de deconnexion de l'administrateur
    public function logout()
    {
        //Auth::guard('admin')->logout();
        //Auth::guard('utilisateur')->logout();
        //Auth::guard('moderateur')->logout();
        Auth::logout();
        return redirect(route('index'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('type',2)->get();
        $departements = Departement::where('');
        return view('admin.moderateur.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departements = Departement::all();
        return view('admin.moderateur.create',compact('departements'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // Creation d'un moderateur
    public function store(Request $request)
    {
        // Systeme de validation du formulaire de Creation d'un moderateur avant l'enregistrement
     $this->validate($request, 
            [
                'nom'=>'required|string|max:30',
                'email'=>'required|unique:users',
                'password'=>'required|min:4|confirmed',
                'telephone'=>'string',
            ],

            [
                    'required'=>'Veuillez remplir ce champs svp',
                    'confirmed'=>'Les mots de passe de correspondent pas',
                    'unique'=>'Ce email existe déja, veuillez en saisir un autre',
                    'numeric'=>'Ce champs ne doit contenir que des chiffres',
                    'email'=>'Veuiller saisir une adresse mail valide svp',
                    'min'=>'Ce champs doit contenire au moins 4 caractères',
            ]
           );

            User::create([
                'name'=>$request->nom,
                'email'=>$request->email,
                'telephone'=>$request->telephone,
                'type'=>2,
                'password'=>Hash::make($request->password),
                'departement_id'=>$request->departement,
            ]);
            session()->flash('message','Moderateur '.$request->nom.' crée avec success');
        return redirect(route('moderateur.index'));
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
        $m = User::find($id)->delete();
       

     return redirect(route('moderateur.index'));
    }
}
