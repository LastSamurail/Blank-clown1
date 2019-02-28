@extends('layouts.user')

@section('contenu')

@if(session()->has('message'))
<div class=" alert alert-success">
    {{session()->get('message')}}
</div>
@endif
 <center><h2>Mes publications</h2></center>
<a href="{{ route('publication.create') }}" class="btn btn-primary"> <i class="fa fa-plus"></i> Ajouter une publication</a> <br><br><br>
 <div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption font-dark">
            <i class="icon-settings font-dark"></i>
            <span class="caption-subject bold uppercase">EBA- Mes publications </span>
        </div>
        <div class="tools"> </div>
    </div>
    <div class="portlet-body">
        <table class="table table-striped table-bordered table-hover" id="sample_1">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Fichier</th>
                    <th>Contenu</th>
                    <th>Date de creation de la publication</th>
                    <th>Suppression</th>
                </tr>
            </thead>
            <tbody>
               @foreach($publications as $publication) 
                <tr>
                    <td>{{$publication->titre}}</td>
                    <td>{{$publication->fichier}}</td>
                    <td>{{$publication->libelle}}</td>
                    <td>{{$publication->created_at}}</td>
                    <td><a href="#" class="btn btn-danger">Supprimer</a></td>
                </tr>
              @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection