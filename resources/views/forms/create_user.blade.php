<!DOCTYPE >
<html>
<head>
    
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Creer un utilisateur</title>
   @extends('layouts.css')
</head>
<body style="background-color:#E1E5EC;">
    
	<div class="wrapper wrapper-content animated fadeInRight">
         <img src="{{ asset('../asset/eba.jpg') }}">
            <div class="row">

            <div class="col-lg-8" style="margin-left: 500px;">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                     <h5>Forum <small> Texte modifiable</small></h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-6 b-r"><h3 class="m-t-none m-b">Inscrivez  vous</h3>
                                <p>E-BA| Experience</p>
                                <form  action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                <div class="form-group"><label>Nom</label> 
                                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                   @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                   @endif
                                </div>

                             <div class="form-group"><label>Telephone</label>
                              <input id="telephone" type="text" class="form-control{{ $errors->has('telephone') ? ' is-invalid' : '' }}" name="telephone" value="{{ old('telephone') }}" >

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                             </div>
                                     
                                    <div class="form-group"><label>Email</label>
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                      @if ($errors->has('email'))
                                       <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                       </span>
                                     @endif
                                   </div>
                                
                                     <div class="form-group"><label>Mot de passe </label> <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                 @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                     </div>

                                    <div class="form-group"><label>Confirmer le mot de pass</label> <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>

                                    <div>
                                      <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit" name="submit"><strong>Suivant</strong></button>
                                    </div>
                                    
                                </form>
                                  
                            
                        </div>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>

 @extends('layouts.script')
</body>



</html>