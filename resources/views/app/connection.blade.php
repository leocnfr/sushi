@extends('app.app_template')
@section('content')
    <style>
        #content
        {
            width: 1000px;
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
            font-weight: blod;
        }
        .radio
        {
            display: inline;
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
    </style>
    <div class="container-fluid" style="background: black;min-height: 500px;">
        <div id="content">
            <div id="register">
                <p class="title">NOUVEAU CLIENT?</p>

                {{--<form action="{{url('/register') }}" method="post" role="form" >--}}
                    {{--<div class="row form-group">--}}
                		{{--<label for="" style="float:left;">Genre</label>--}}
                        {{--<div class="radio ">--}}
                            {{--<input type="radio" name="sex" id="m"  required/>--}}
                            {{--<label for="m"></label> <span style="float:left;"> M</span>--}}
                        {{--</div>--}}
                        {{--<div class="radio">--}}
                            {{--<input type="radio" name="radio-1" id="mme"  required/>--}}
                            {{--<label for="mme"></label> <span style="float:left;"> Mme</span>--}}
                        {{--</div>--}}
                        {{--<div class="radio">--}}
                            {{--<input type="radio" name="radio-1" id="mlle"  required/>--}}
                            {{--<label for="mlle"></label> <span style="float:left;"> Mlle</span>--}}
                        {{--</div>--}}
                	{{--</div>--}}
                    {{--<div class="form-group">--}}
                        {{--<label for="">Nom</label>--}}
                        {{--<input type="text" name="nom" required>--}}
                    {{--</div>--}}
                    {{--<div class="form-group">--}}
                        {{--<label for="">Prenom</label>--}}
                        {{--<input type="text" name="prenom" required>--}}
                    {{--</div>--}}
                    {{--<div class="form-group">--}}
                        {{--<label for="">Email</label>--}}
                        {{--<input type="email" name="email" required>--}}
                    {{--</div>--}}
                    {{--<div class="form-group">--}}
                        {{--<label for="">Mot de passe</label>--}}
                        {{--<input type="password" name="password" required>--}}
                    {{--</div>--}}
                    {{--<div class="form-group">--}}
                        {{--<label for="">Confirmer le mot de passe</label>--}}
                        {{--<input type="text" name="password_confirmation" required>--}}
                    {{--</div>--}}
                    {{--<div class="form-group">--}}
                        {{--<button id="submmit" type="submit" formaction="{{url('/register')}}">CONNEXION</button>--}}
                    {{--</div>--}}
                    {{--{!! csrf_field() !!}--}}
                {{--</form>--}}


            </div>
            <div id="login">
                <p class="title">DEJA CLIENT</p>
            </div>
        </div>
    </div>
    <form action="{{url('/register')}}" method="post">
        @if ($errors->has('password_confirmation'))
            <span class="help-block">
                <strong>{{ $errors->first('password_confirmation') }}</strong>
            </span>
        @endif
            @if ($errors->has('password'))
                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
            <input type="text" name="nom" required>
        <input type="text" name="prenom" required>
        <input type="email" name="email" required>
        <input type="password" name="password" required>
        <input type="password" name="password_confirmation">
        <button formaction="{{url('/register')}}" formmethod="post">submit</button>
        {!! csrf_field() !!}
    </form>

    <form action="{{url('/login')}}" method="post">
        <input type="email" name="email">
        <input type="password" name="email">
        {!! csrf_field() !!}
        <button formaction="{{url('/login')}}" formmethod="post">Submit</button>
    </form>
@endsection