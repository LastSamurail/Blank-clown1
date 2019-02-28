@section("js")

<script type="text/javascript" src="{{ asset('plugins/tinymce/tinymce.min.js') }}"></script>

<script>
    $(function(){
        //Editor settings
        var editor_config = {
            path_absolute : "/",
            selector: ".editor",
            height: 200,
            language: 'fr_FR',
            theme: 'modern',
            menubar: false,
            branding: false,
            plugins: 'directionality autosave contextmenu print preview paste searchreplace autolink directionality fullscreen image link media template codesample charmap hr pagebreak nonbreaking anchor toc advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern code insertdatetime preview print table',
            toolbar1: 'formatselect | bold italic underline forecolor backcolor | numlist bullist hr blockquote alignleft aligncenter alignright alignjustify | link image | outdent indent removeformat code table  | insertdatetime preview print',
            relative_urls: false,
            file_browser_callback: function(field_name, url, type, win){
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;

                if (type == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.open({
                    file : cmsURL,
                    title : 'OTD - Filemanager',
                    width : x * 0.8,
                    height : y * 0.8,
                    resizable : "yes",
                    close_previous : "no"
                });
            }
        };

        tinymce.init(editor_config);

        

    });
</script>
@endsection

@extends('layouts.user')

@section('contenu')

<h1>Ajouter une publication</h1>
<!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet box purple ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i> EBA | Ajout de publication </div>
                <div class="tools">
                    <a href="" class="collapse"> </a>
                    <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                    <a href="" class="reload"> </a>
                    <a href="" class="remove"> </a>
                </div>
            </div>
            <div class="portlet-body form">
            
        <form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST" action="{{ route('publication.store') }}">
        	{{ csrf_field() }}
            <div class="form-body">
               
                <div class="form-group">
                    <label class="col-md-3 control-label">Titre</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control input-sm" name="titre" placeholder="Titre de votre description"> 
                        {!!$errors->first('titre','<span class="help-block m-b-none text-danger">:message</span>')!!}
                    </div>
                </div>
                
     <div class="form-group">
            <label class="col-md-3 control-label">Categorie</label>
            <select name="categorie" class="layout-style-option form-control input-sm" style="width: 500px;">
                <option>Choisir la categorie de votre publication</option>
                @foreach($categories as $c)
                <option value="{{$c->id}}">{{$c->libelle}}</option>
                @endforeach
            </select>
            {!!$errors->first('categorie','<span class="help-block m-b-none text-danger">:message</span>')!!}
    </div>

                 <div class="form-group">
                    <label class="col-md-3 control-label">Contenu</label>
                    <div class="col-md-9">
                        <textarea type="text" class="form-control editor"  name="libelle" placeholder="Entrer le contenu de votre publication">
                            
                        </textarea>  

                        {!!$errors->first('libelle','<span class="help-block m-b-none text-danger">:message</span>')!!}
                   </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Document lié: </label>
                    <input type="file" name="fichier">
                    {!!$errors->first('fichier','<span class="help-block m-b-none text-danger">:message</span>')!!}
            </div>

                
                
            </div>
            <div class="form-actions right1">
                <button type="button" class="btn default">Cancel</button>
                <button type="submit" class="btn green">Publier</button>
            </div>
       </form>
               
            </div>
        </div>
                                <!-- END SAMPLE FORM PORTLET-->
@endsection