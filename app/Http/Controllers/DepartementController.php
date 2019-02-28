<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departement;

class DepartementController extends Controller
{
     public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departements = Departement::all();
        return view('admin.departement.index',compact('departements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departements = Departement::all();
        return view('admin.departement.create',compact('departements'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //Fonction de creation d'un déparetement
    public function store(Request $request)
    {
        //Systeme de validation du formulaire d'enregistrement
        $this->validate($request, 
        [
            'libelle'=>'required|string',
            
        ],

        [
                'required'=>'Veuillez remplir ce champs svp',
                
        ]
       );
        $departements = Departement::all();
        Departement::create([
            'libelle'=>$request->libelle
        ]);
        session()->flash('message','Departement'.$request->libelle.' crée avec success');

        return redirect()->route('departement.index');



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

    //Fonction de suppression d'un département
    public function destroy($id)
    {
        
        $departements = Departement::findOrFail($id)->delete();
        return redirect()->route('departement.index');
    }
}
