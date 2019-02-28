@extends('layouts.admin')

@section('contenu')

@if(session()->has('message'))
<div class=" alert alert-success">
    {{session()->get('message')}}
</div>
@endif
<center><h2>Liste des departements</h2></center>
<a href="{{ route('departement.create') }}" class="btn btn-primary"> <i class="fa fa-plus"></i> Nouvelle departements</a>

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
        @foreach($departements as $r)
        <tr>
            <td>{{$r->id}}</td>
            <td>{{$r->libelle}}</td>
            <td><a href="#" class="btn btn-warning">Modifier</a></td>
            <td>
            <form method="post" action="{{ route('departement.destroy',$r->id)}}">
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