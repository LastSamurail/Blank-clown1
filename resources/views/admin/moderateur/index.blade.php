@extends('layouts.admin')

@section('contenu')
@if(session()->has('message'))
<div class=" alert alert-success">
    {{session()->get('message')}}
</div>
@endif
<center><h2>liste moderateur</h2></center>
<a href="{{ route('moderateur.create') }}" class="btn btn-primary"> <i class="fa fa-plus"></i> Nouvelle moderateur</a>
<table class="table table-striped table-bordered table-hover"><br><br><br>
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Téléphone</th>
            <th>Modification</th>
            <th>Suppression</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->telephone}}</td>
            <td><a href="#" class="btn btn-warning">Modifier</a></td>
            <td>
                <form method="post" action="{{ route('moderateur.destroy',$user->id)}}">
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