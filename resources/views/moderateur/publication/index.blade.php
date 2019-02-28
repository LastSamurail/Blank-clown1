@extends('layouts.moderateur')

@section('contenu')

@if(session()->has('message'))
<div class=" alert alert-success">
    {{session()->get('message')}}
</div>
@endif
 <center><h2>Liste des publications en attente de validation</h2></center>

 <div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption font-dark">
            <i class="icon-settings font-dark"></i>
            <span class="caption-subject bold uppercase">EBA- Publications en attente de validation </span>
        </div>
        <div class="tools"> </div>
    </div>
    <div class="portlet-body">
        <table class="table table-striped table-bordered table-hover" id="sample_1"><br><br><br>
            <thead>
                <tr>
                    <th>Nom du publicateur</th>
                    <th>Titre de la publication</th>
                    <th>Fichier de la publidation</th>
                    <th>Contenu de la publidation</th>
                    <th>Date de creation de la publication</th>
                    <th>Avis</th>
                </tr>
            </thead>
            <tbody>
               @foreach($publications_dep as $publication) 
                <tr>
                    <td>{{$publication->titre}}</td>
                    <td>{{$publication->fichier}}</td>
                    <td>{{$publication->libelle}}</td>
                    <td>{{$publication->created_at}}</td>
                    <td><a href="#" class="btn btn-danger">Supprimer</a></td>
                    <td><a href="#" class="btn btn-danger">Valider</a></td>
                </tr>
              @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection