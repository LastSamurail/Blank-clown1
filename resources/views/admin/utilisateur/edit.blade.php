@extends('layouts.admin')

@section('contenu')

<h1>Modifier l' utilisateur {{$user->name}}</h1>
<!-- BEGIN SAMPLE FORM PORTLET-->
<div class="portlet box purple ">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-gift"></i> E-BA </div>
        <div class="tools">
            <a href="" class="collapse"> </a>
            <a href="#portlet-config" data-toggle="modal" class="config"> </a>
            <a href="" class="reload"> </a>
            <a href="" class="remove"> </a>
        </div>
    </div>
    <div class="portlet-body form">
        <form class="form-horizontal" role="form" method="POST" action="{{ route('utilisateur.update',$user) }}">
        	{{ csrf_field() }}
            {{method_field('PUT')}}
            <div class="form-body">
               
                <div class="form-group">
                    <label class="col-md-3 control-label">Nom</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control input-sm" name="nom" value="{{$user->name}}"> 
                        {!!$errors->first('nom','<span class="help-block m-b-none text-danger">:message</span>')!!}
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Email</label>
                    <div class="col-md-9">
                        <input type="email" class="form-control input-sm" name="email" placeholder="Email" value="{{$user->email}}">

                        {!!$errors->first('email','<span class="help-block m-b-none text-danger">:message</span>')!!}
                   </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Telephone</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control input-sm" name="telephone" value="{{$user->telephone}}">
                        {!!$errors->first('telephone','<span class="help-block m-b-none text-danger">:message</span>')!!} 
                    </div>
                </div>

        
                <div class="form-group">
                    <label class="col-md-3 control-label">Mot de passe</label>
                    <div class="col-md-9">
                        <input type="password" class="form-control input-sm" name="password" placeholder="saisir le mot de passe"> 
                        {!!$errors->first('password','<span class="help-block m-b-none text-danger">:message</span>')!!}
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Confirmer le mot de passe</label>
                    <div class="col-md-9">
                        <input type="password" class="form-control input-sm" name="password_confirmation" placeholder="saisir le mot de passe">
                        {!!$errors->first('password','<span class="help-block m-b-none text-danger">:message</span>')!!}
                     </div>
                </div>

                
                
            </div>
            <div class="form-actions right1">
                <button type="button" class="btn default">Cancel</button>
                <button type="submit" class="btn green">Ajouter</button>
            </div>
        </form>
    </div>
</div>
                                <!-- END SAMPLE FORM PORTLET-->
@endsection