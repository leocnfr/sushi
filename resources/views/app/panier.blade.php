@extends('app.app_template')
@section('content')
    <style>
        #content
        {
            width: 1010px;
            margin: 0px auto;
            color: #BAAA76;
        }
        #shop-img
        {
            height: 33.5px;
            width: 35px
        }
        #text
        {
            font-size: 38pt;
            font-weight: bold;
            color: #BAAA76;
            font-family: Corbel;
        }
        .radio
        {
            display: inline;
        }
    </style>
    <div class="container-fluid" style="background: black;min-height: 500px;">
        <div id="content">
            <img  id="shop-img" src="/images/shopping-01.png" alt="shopping_log" >
            <span id="text">PANIER</span>
            <div id="panier-info">
                <p>RECAPITULATIF DE VOTRE PANNIER</p>
                @foreach($cart as $row)

                @endforeach
            </div>
            <div id="livraison-info">
                <div class="radio">
                	<label>
                		<input type="radio" name="name" id="inputID" value="" checked="checked">
                		A EMPORTER
                	</label>
                </div>

                <div class="radio">
                	<label>
                		<input type="radio" name="name" id="inputID" value="" checked="checked">
                		LIVRAISON
                	</label>
                </div>
                <select name="name" id="inputID" >
                	<option value="">Selectionnez votre boutique</option>
                </select>
                <select name="name" id="inputID" >
                    <option value="">DATE</option>
                    <option value="">Aujourdui</option>
                    <option value="">Autre</option>
                </select>
                <select name="name" id="inputID" >
                    <option value="">Heure</option>

                </select>
            </div>
        </div>
    </div>
@endsection