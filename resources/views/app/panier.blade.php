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
            position: relative;
            display: inline;
            margin-bottom: 20px;
        }
        .qty-info
        {
            background: black;
            border: 1px solid;
            margin: 0px 1px;
            width: 40px;
            height: 20px;
            display: inline-block;

        }
        .list-group-item{
            background: rgba(94,93,91,0.4);
            border: none;
            border-bottom: 2px solid #BAAA76;
        }
        #livraison-info
        {
            background: rgba(94,93,91,0.4);
            position: relative;
            height: 240px;
            padding: 20px 10px;
            margin-bottom: 82px;

        }
        select{
            margin: 10px 0;
            position: relative;
            top:20px;
        }
        #map {
            height: 160px;
            width: 345px;
            margin: 0 auto;
            top: 20px;
            position: absolute;
            right: 20px;
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
                        <span style="font-size: 20px;font-weight: bold">{{$cart->name}}</span>
                        <span style="font-size: 20px;font-weight: bold">{{$cart->piece}}piece</span>
                        <div class="qty-info">
                            <i class="fa fa-minus" aria-hidden="true" id="minus"></i>
                            <span>{{$cart->qty}}</span>
                            <i class="fa fa-plus" aria-hidden="true" id="plus"></i>
                        </div>

                        <span>{{$cart->price}}€</span>
                        <span class="deletePanier" data-rawid="{{$cart->__raw_id}}" style="cursor: pointer;"><i class="fa fa-times"></i></span>
                    </li>
                @endforeach
                    <li class="list-group-item">
                        <p>Nombre de produits</p>
                        <p>Nombre de pieces</p>
                    </li>
                    <li class="list-group-item">Total</li>
                </ul>
            </div>
            <p style="font-size: 33pt;font-weight: bold">Mode de livraison</p>
            <div id="livraison-info" >
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
                @inject('points','App\Relais')
                <select name="name" id="point-place" style="display: block" >
                	<option value="">Selectionnez votre boutique</option>
                    @foreach($points::all() as $point)
                        <option value="">{{$point->name}}</option>

                    @endforeach
                </select>
                <select name="name" id="inputID" style="display: block">
                    <option value="">DATE</option>
                    <option value="">Aujourdui</option>
                    <option value="">Autre</option>
                </select>
                <select name="name" id="inputID" >
                    <option value="">Heure</option>
                    <option value=""></option>
                </select>
                <button id="submit" style="position: relative;top: 25px;display: block">VALIDER</button>
                <div id="map">

                </div>
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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCIbJ48RCsE-UPzW9y-3hmxWpNVKm6tYho" type="text/javascript"></script>

    <script>
        function initMap() {
            //map style
            var styles = [
                {
                    stylers: [
                        { hue: 340 },
                        { saturation: 5.6 },
                        { lightness: 21.2 },
                        { gamma: 1.51 }
                    ]
                },{
                    featureType: "road",
                    elementType: "geometry",
                    stylers: [
                        { hue: "#00ffee" },
                        { lightness: 100 },
                        { visibility: "simplified" }
                    ]
                },{
                    featureType: "road",
                    elementType: "labels",
                    stylers: [
                        { visibility: "off" }
                    ]
                }
            ];
            var styledMap = new google.maps.StyledMapType(styles,
                    {name: "Styled Map"});
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 11,
                center: {lat: 48.8588377, lng: 2.2775171},
                mapTypeControlOptions: {
                    mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
                }
            });
            map.mapTypes.set('map_style', styledMap);
            map.setMapTypeId('map_style');
            var geocoder = new google.maps.Geocoder();

//            var markers = [];

//            var image = '/images/position-icon.png';
            var image = {
                url: '/images/position-icon.png',
                size: new google.maps.Size(71, 71),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(17, 34),
                scaledSize: new google.maps.Size(25, 25)
            };
            var beachMarker = new google.maps.Marker({
                position: {lat: -33.890, lng: 151.274},
                map: map,
                icon: image
            });

            function geocodeAddress(address,geocoder, resultsMap,index) {
                var address = address;
                geocoder.geocode({'address': address}, function(results, status) {
                    if (status === google.maps.GeocoderStatus.OK) {
                        resultsMap.setCenter(results[0].geometry.location);
//                        var marker = new google.maps.Marker({
//                            map: resultsMap,
//                            icon: image,
//                            position: results[0].geometry.location
//                        });
                        var content="<div style='color: #BAAA76'>"+address+"</div>";
                        addMarkerWithTimeout(results[0].geometry.location,400*(index+1),index,content)
                    } else {
                        alert('Geocode was not successful for the following reason: ' + status);
                    }
                });
            }
            function attachSecretMessage(marker, secretMessage) {
                var infowindow = new google.maps.InfoWindow({
                    content: secretMessage
                });
                marker.addListener('click', function() {

                    infowindow.open(marker.get('map'), marker);
                });
            }
            function addMarkerWithTimeout(position, timeout,index,content) {
                window.setTimeout(function () {
                    var markers =new google.maps.Marker({
                        position: position,
                        map: map,
//                        icon: image,
                        animation: google.maps.Animation.DROP,
                        label:(index+1)+''
                    });
                    attachSecretMessage(markers, content);

                },timeout);
            }



            $.get('/json', function (data) {
                $.each(data, function (key,val) {
                    geocodeAddress(val.address,geocoder, map,key);
                })
            });

        }
        initMap();
    </script>
@endsection