<html>

<!-- Mirrored from webapplayers.com/inspinia_admin-v2.7.1/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 04 Oct 2017 15:36:08 GMT -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Connexion Users</title>
    @extends('layouts.css')
    <!-- END HEAD -->

</head>

<body>

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">eBA</h1>

            </div>
            <h3> Bienvenue à E-BA<br> Authentifiers vous</h3>
            
            <p>---------</p>
            @isset($url)
            <form class="m-t" role="form" method="POST" action="{{ route('adminLogin') }}">
            @else
            <form class="m-t" role="form" method="POST" action="{{ route('login') }}">
            @endisset
                @csrf

                <div class="form-group">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Entrer votre adresse mail" name="email" value="{{ old('email') }}" required autofocus>
                        <!--Message d'erreur a afficher si l'email n'est pas validé selon les regles de validation definits dans le LoginController -->
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                </div>
                <div class="form-group"> 
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Entrer votre mot de passe " required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                </div>
                <button type="submit" name="submit" class="btn btn-primary block full-width m-b">Se Connecter</button>

                <a href="#"><small>Mot de passe oublié?</small></a>
                <p class="text-muted text-center"><small>Pas encore de compte?</small></p>
                <a class="btn btn-success block full-width m-b" href="{{ route('create_user') }}">Create un compte</a>
            </form>
            <p class="m-t"> <small>E-BA &copy; 2019 - 2020</small> </p>
        </div>
    </div>

    @extends('layouts.script')

</body>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.7.1/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 04 Oct 2017 15:36:08 GMT -->
</html>