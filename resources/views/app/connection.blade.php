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
    </style>
    <div class="container-fluid" style="background: black;min-height: 500px;">
        <div id="content">
            <div id="register">
                <p class="title">NOUVEAU CLIENT?</p>

                <form action="" method="post" role="form" >
                    <div class="form-group">
                		<label for="">Genre</label>
                        <div class="radio ">
                            <label>
                                <input type="radio" name="name" id="inputID" value="" checked="checked">
                                M
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="name" id="inputID" value="" checked="checked">
                                Mme
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="name" id="inputID" value="" checked="checked">
                                Mlle
                            </label>
                        </div>
                	</div>
                    <div class="form-group">
                        <label for="">Nom</label>
                        <input type="text">
                    </div>
                    <div class="form-group">
                        <label for="">Prenom</label>
                        <input type="text">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email">
                    </div>
                    <div class="form-group">
                        <label for="">Mot de passe</label>
                        <input type="password">
                    </div>
                    <div class="form-group">
                        <label for="">Confirmer le mot de passe</label>
                        <input type="text">
                    </div>
                    <div class="form-group">
                        <button id="submmit">CONNEXION</button>
                    </div>
                </form>


            </div>
            <div id="login">
                <p class="title">DEJA CLIENT</p>
            </div>
        </div>
    </div>

@endsection