@extends('layouts.admin')

@section('contenu')

@if(session()->has('message'))
<div class=" alert alert-success">
    {{session()->get('message')}}
</div>
@endif
 <div class="portlet-title">
        <div class="caption font-dark">
            
           <center><span class="caption-subject bold uppercase">FORUM - EBA</span></center> 
        </div>
        <div class="tools"> </div>
    </div>
<a href="{{ route('utilisateur.create') }}" class="btn btn-primary"> <i class="fa fa-plus"></i> Nouvel utilisateur</a> <br><br>
 <div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption font-dark">
            <i class="icon-settings font-dark"></i>
            <span class="caption-subject bold uppercase">EBA - Liste des utilisateurs</span>
        </div> 
        <div class="tools"> </div>
    </div>
    <div class="portlet-body">
        <table class="table table-striped table-bordered table-hover" id="sample_1"><br>
            <thead>
                <tr>
                    <th>Nom</th>
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
                    <td><a href="{{route('utilisateur.edit',$user->id)}} " class="btn btn-warning">Modifier</a></td>
                    <td>
                    <form method="post" action="{{ route('utilisateur.destroy',$user->id)}}">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <button class="btn btn-danger" type="submit">Supprimer</button> 
                
                   </form>
                    </td>
                </tr>
              @endforeach
            </tbody>
        </table>
    </div>
</div>




@endsection