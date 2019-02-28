@extends('layouts.admin')

@section('contenu')
@if(session()->has('message'))
<div class=" alert alert-success">
    {{session()->get('message')}}
</div>
@endif
<center><h2>Liste des catégories</h2></center>

<a href="{{ route('categorie.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Nouvelle catégorie</a>
</br>
<table class="table table-striped table-bordered table-hover"><br><br><br>
    <thead>
        <tr>
            <th>id</th>
            <th>Libelle</th>
            <th>Modification</th>
            <th>Suppression</th>      
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $r)
        <tr>
            <td>{{$r->id}}</td>
            <td>{{$r->libelle}}</td>
            <td><a href="#" class="btn btn-warning">Modifier</a></td>
            <td>
                <form method="post" action="{{ route('categorie.destroy',$r->id)}}">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <button class="btn btn-danger" type="submit">Supprimer</button> 
                
            </form>
            </td>
        </tr>
      @endforeach
    </tbody>
</table>
@endsection