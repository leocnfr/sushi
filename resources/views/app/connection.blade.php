@extends('app.app_template')
@section('content')
    <style>
        #content
        {
            width: 80vw;
            margin: 0px auto;
            color: #BAAA76;
            background: black;
        }
        #register
        {
            width: 470px;
        }
        #register,#login
        {
            margin-top: 127px;
            float: left;
            font-size: 23px;
        }
        .title
        {
            font-size: 25pt;
            font-weight: bold;
        }
        .radio
        {
            display: inline-block;
        }
        #submmit
        {
            background: #BAAA76;
            color: black;
            border: none;
            -webkit-box-shadow: none ;
            -moz-box-shadow: none ;
            box-shadow: none ;
            font-size: 19px;
        }
        /*radio css*/
        .radio [type="radio"]{
            display: none;
        }
        .radio label{
            float: left;
            display: inline-block;
            position: relative;
            width: 20px;
            height: 20px;
            border: 1px #BAAA76 solid;
            background-color: #252524;

            margin-right: 10px;
            cursor: pointer;
            border-radius: 100%;
        }
        .radio label:after{
            content: '';
            position: absolute;
            top: 7px;
            left: 7px;
            width: 5px;
            height: 5px;
            background-color: #BAAA76;
            border-radius: 50%;
            transform: scale(0);
            transition:transform .2s ease-out;
        }
        .radio [type="radio"]:checked + label{
            background-color: #252524;
            transition:background-color .2s ease-in;
        }
        .radio [type="radio"]:checked + label:after{
            transform:scale(1);
            transition:transform .2s ease-in;
        }
        .radio > sapn{
            display: inline-block;
            height: 20px;
            line-height: 20px;
            float: left;
        }
        .form-group > label {
            width: 150px;
        }
        .conn-btn{
            background: #BAAA76;
            color: black;
            position: relative;
            margin-top: 50px;
        }
        .conn-btn:hover{
            color:black;
            opacity: 0.5;
        }
        .form-group{
            display: block;
        }
        input{
            width: 20vw;
        }
    </style>
    <div class="container-fluid" style="background: black;min-height: 580px;">
        <div id="content" style="margin-bottom: 108px;min-height: 600px;">
            <div id="register" style="width: 45%">
                <p class="title">NOUVEAU CLIENT?</p>
                <form action="{{url('/register')}}" method="post">
                    <div class="form-group">
                        <div class="radio ">
                            <span for="" style="float:left;display: inline-block;width: 140px">Genre</span>
                            <input type="radio" name="sex"  value="M" id="m"/>
                            <label for="m"></label> <span style="float:left;"> M</span>

                            <input type="radio" name="sex" id="mme"  value="Mme"/>
                            <label for="mme" style="margin-left: 10px"></label> <span style="float:left;">Mme</span>

                            <input type="radio" id="mlle" name="sex"  value="mlle"/>
                            <label for="mlle" style="margin-left: 10px"></label> <span style="float:left;">Mlle</span>
                        </div>

                    </div>
                    <div class="form-group">
                        @if ($errors->has('nom'))
                            <span class="help-block">
                         <strong>{{ $errors->first('nom') }}</strong>
                     </span>
                        @endif
                        <label for="">Nom*</label>
                        <input type="text" name="nom" required class="pull-right">
                    </div>
                    <div class="form-group">
                        @if ($errors->has('prenom'))
                            <span class="help-block">
                         <strong>{{ $errors->first('prenom') }}</strong>
                     </span>
                        @endif
                        <label for="">Prenom*</label>
                        <input type="text" name="prenom" required class="pull-right">
                    </div>
                    <div class="form-group">
                        @if ($errors->has('email'))
                            <span class="help-block">
                         <strong>{{ $errors->first('email') }}</strong>
                     </span>
                        @endif
                        <label for="">Email*</label>
                        <input type="email" name="email" required class="pull-right">
                    </div>
                    <div class="form-group">
                        <label for="">Password*</label>
                        @if ($errors->has('password'))
                            <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                        <input type="password" name="password" required class="pull-right">
                    </div>
                    <div class="form-group">
                        <label for="">Confirm passe*</label>
                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                         <strong>{{ $errors->first('password_confirmation') }}</strong>
                     </span>
                        @endif
                        <input type="password" name="password_confirmation" class="pull-right">

                    </div>
                    <button formaction="{{url('/register')}}" formmethod="post" class="conn-btn btn pull-right">Connexion</button>
                    {!! csrf_field() !!}
                </form>

            </div>
            <div id="login" style="width: 45%;float: right;">
                <p class="title">DEJA CLIENT?</p>
                <form action="{{url('/login')}}" method="post">
                    <div class="form-group">
                        <label for="">Identifant</label>
                        <input type="email" name="email" class="pull-right">
                    </div>
                   <div class="form-group">
                       <label for="">Mot de passe</label>
                       <input type="password" name="password" class="pull-right">
                   </div>

                    {!! csrf_field() !!}
                    <button formaction="{{url('/login')}}" formmethod="post" class="btn conn-btn pull-right">Connexion</button>
                </form>
            </div>
        </div>
    </div>

@endsection