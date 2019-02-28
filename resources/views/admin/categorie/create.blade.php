@extends('layouts.admin')

@section('contenu')

<h1>Ajouter un nouvel  categorie</h1>
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
                <form class="form-horizontal" role="form" method="POST" action="{{ route('categorie.store') }}">
                	{{ csrf_field() }}
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Libelle categorie</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control input-sm" name="libelle" placeholder="libelle"> 
                                {!!$errors->first('libelle','<span class="help-block m-b-none text-danger">:message</span>')!!}
                            </div>
                        </div>
                    </div>

                    <div class="form-actions right2">
                        <button type="button" class="btn default">Annuler</button>
                        <button type="submit" class="btn green">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
                                <!-- END SAMPLE FORM PORTLET-->
@endsection