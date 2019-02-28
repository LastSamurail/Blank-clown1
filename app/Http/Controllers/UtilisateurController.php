<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Departement;
use Illuminate\Support\Facades\Hash;
use Flashy;

class UtilisateurController extends Controller
{
     public function __construct()
    {
        $this->middleware('admin');
    }

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
        //Permet d'afficher les utilistaeurs de type 3 qui sont les utilisateurs simple
        $users = User::where('type',3)->get();
        return view('admin.utilisateur.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Permet d'afficher tout ce qui concerne les departements 
        $departements = Departement::all();
        return view('admin.utilisateur.create',compact('departements'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //Permet de creer les utilisateurs simple apres la validation du formulaire
        $this->validate($request, 
        [
            'nom'=>'required|string|max:30',
            'email'=>'required|unique:users',
            'password'=>'required|min:4|confirmed',
            'telephone'=>'string',
            'departement'=>'required',
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
            'type'=>3,
            'password'=>Hash::make($request->password),
            'departement_id'=>$request->departement,
        ]);
        //Flashy::message("L'utilisateur ".$request->nom. " créer avec succès");
        session()->flash('message','Utilisateur '.$request->nom.' crée avec success');
        return redirect(route('utilisateur.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('admin.utilisateur.edit',compact('user'));
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
        $this->validate($request, 
        [
            'nom'=>'required|string|max:30',
            'email'=>'required|unique:users',
            'password'=>'required|min:4|confirmed',
            'telephone'=>'numeric',
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

        $u = User::find($id);
        $u->name = $request->nom;
        $u->email = $request->email;
        $u->password = Hash::make($request->password);
        $u->telephone = $request->telephone;
        $u->save();

        session()->flash('message','Utilisateur '.$request->nom.' modifié avec success');
        return redirect(route('utilisateur.index'));
        //return view('admin.utilisateur.update',compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //Supression d'un utilisateur
    public function destroy($id)
    {
        $r = User::find($id);
        if ($r) {
           if ($r->publication->isNotEmpty()) {

              foreach ($r->publication as $k){
            $k->delete();
            
            }
           
        }
         $r->delete();
     } 

     return redirect(route('utilisateur.index'));
        
    }
}
