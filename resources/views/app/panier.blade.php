@extends('app.app_template')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
            background: rgba(94,93,91,0.4)
        }
        .qty-info
        {
            background: black;
            border: 1px solid;
            margin: 0px 1px;
            width: 20px;
            height: 20px;
            display: inline-block;

        }
        .list-group-item{
            background: rgba(94,93,91,0.4);
            border: none;
            border-bottom: 2px solid #BAAA76;
        }
    </style>
    <div class="container-fluid" style="background: black;min-height: 500px;">
        <div id="content">
            <img  id="shop-img" src="/images/shopping-01.png" alt="shopping_log" >
            <span id="text">PANIER</span>
            <div id="panier-info">
                <p>RECAPITULATIF DE VOTRE PANNIER</p>
                <ul class="list-group">
                @foreach($carts as $cart)

                    <li class="list-group-item">
                        <span>{{$cart->name}}</span>
                        <span>{{$cart->piece}}</span>
                        <span class="qty-info"><i class="fa fa-minus" aria-hidden="true" id="minus"></i></span>
                        <span class="qty-info">{{$cart->qty}}</span>
                        <span class="qty-info"><i class="fa fa-plus" aria-hidden="true" id="plus"></i></span>
                        <span>{{$cart->price}}</span>
                        <span class="deletePanier" data-rawid="{{$cart->__raw_id}}" style="cursor: pointer;"><i class="fa fa-times"></i></span>
                    </li>
                @endforeach
                </ul>
            </div>
            <div id="livraison-info" >
                <p style="font-size: 33pt;font-weight: bold">Mode de livraison</p>
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
    <script>
        $('.deletePanier').click(function () {
            $.ajaxSetup(
                    {
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url:'/deletePanier',
                        type: "post"
                    });
            var rawId=$(this).data('rawid');
            console.log(rawId);
            $.ajax({ data: {rawId:rawId} }).done(function (response) {
            });
        })

    </script>
@endsection