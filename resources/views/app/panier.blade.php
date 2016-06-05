@extends('app.app_template')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        select {
            border: solid 1px #000;

            appearance:none;
            -moz-appearance:none;
            -webkit-appearance:none;

            padding-right: 14px;

            background: url("http://ourjs.github.io/static/2015/arrow.png") no-repeat scroll right center transparent;

        }


        select::-ms-expand { display: none; }
        #content
        {
            width: 1010px;
            margin: 0px auto;
            color: #BAAA76;
            top:34px;
            position: relative;
        }
        #shop-img
        {
            height: 46px;
            width: 46px;
            float: left;
        }
        #text
        {
            font-size: 38px;
            font-weight: bold;
            color: #BAAA76;
            font-family: Corbel;
            line-height: 54px;
        }
        .radio
        {
            position: relative;
            display: inline;
            margin-bottom: 20px;
        }
        .qty-info
        {
            width: 50px;
            display: inline-block;
            background: black;
            padding: 0px 1px;
            margin-right: 150px;

        }
        .list-group-item{
            padding: 35px 0px;
            background: none;
            border: none;
            border-bottom: 2px solid #BAAA76;
            height: 100px;
        }
        #livraison-info
        {
            background:rgba(37,37,36,0.6);
            position: relative;
            height: 335px;
            padding: 20px 34px;
            margin-bottom: 82px;

        }
        select{
            margin: 10px 0;
            position: relative;
            top:20px;
        }
        #map {
            height: 265px;
            width: 345px;
            margin: 0 auto;
            top: 20px;
            position: absolute;
            right: 20px;
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
        /*下拉菜单*/
        .content{
            padding-top: 5%;
        }
        .content .select{
            width: 300px;
            height: 30px;
            font-family: "Microsoft Yahei";
            font-size: 16px;
            background-color: #ccc;
            position: relative;
            border-radius: 10px;
        }
        .content .select:after{
            content: '';
            display: block;
            position: absolute;
            top:10px;
            right: 12px;
            transition:transform .3s ease-out, top .3s ease-out;
            width: 0;
            height: 0;
              border-left: 10px solid transparent;
             border-right: 10px solid transparent;
            border-top: 10px solid #636363;
        }
        .content .select p{
            padding:0 15px;
            line-height: 20px;
            cursor: pointer;
            height: 20px;
            width: 260px;
            top: 5px;
            position: relative;
            font-family: Corbel;
            border-right: 1px solid #636363;
            color: #636363;
        }
        .content .select ul{
            list-style-type: none;
            background-color: #fff;
            width: 100%;
            overflow-y:auto;
            position: absolute;
            top:30px;
            left: 0;
            max-height: 0;
            transition: max-height .3s ease-out;
            padding: 0px;
            text-align: center;
        }
        .content .select ul li{
            padding: 0 15px;
            line-height: 40px;
            cursor: pointer;
        }
        .content .select ul li:hover{
            background-color: #e0e0e0;
        }
        .content .select ul li.selected{
            background-color: #ccc;

        }

        @-webkit-keyframes slide-down{
            0%{transform: scale(1, 0);}
            25%{transform: scale(1, 1.2);}
            50%{transform: scale(1, 0.85);}
            75%{transform: scale(1, 1.05);}
            100%{transform: scale(1, 1);}
        }
        .content .select.open ul{
            max-height: 250px;
            transform-origin:50% 0;
            -webkit-animation:slide-down .5s ease-in;
            transition: max-height .2s ease-out;
            padding: 0px;
            text-align: center;
        }
        .content .select.open:after{
            transform:rotate(-180deg);
            transform-origin:10px 0px;
            top: 18px;
            transition:all .3s ease-in;
        }
        #btn-submit{
            display: block;
            width: 80px;
            background: #BAAA76;
            color: black;
            border: 0pt;
            box-shadow: none;
            border-radius: 5px;
        }
        #btn-submit:hover{
            opacity: 0.5;
        }
        .fa{
            cursor: pointer;
        }
        /*loading动画*/
        .spinner {
            margin: 100px auto;
            width: 40px;
            height: 40px;
            position: relative;
        }

        .container1 > div, .container2 > div, .container3 > div {
            width: 6px;
            height: 6px;
            background-color: #333;

            border-radius: 100%;
            position: absolute;
            -webkit-animation: bouncedelay 1.2s infinite ease-in-out;
            animation: bouncedelay 1.2s infinite ease-in-out;
            -webkit-animation-fill-mode: both;
            animation-fill-mode: both;
        }

        .spinner .spinner-container {
            position: absolute;
            width: 100%;
            height: 100%;
        }

        .container2 {
            -webkit-transform: rotateZ(45deg);
            transform: rotateZ(45deg);
        }

        .container3 {
            -webkit-transform: rotateZ(90deg);
            transform: rotateZ(90deg);
        }

        .circle1 { top: 0; left: 0; }
        .circle2 { top: 0; right: 0; }
        .circle3 { right: 0; bottom: 0; }
        .circle4 { left: 0; bottom: 0; }

        .container2 .circle1 {
            -webkit-animation-delay: -1.1s;
            animation-delay: -1.1s;
        }

        .container3 .circle1 {
            -webkit-animation-delay: -1.0s;
            animation-delay: -1.0s;
        }

        .container1 .circle2 {
            -webkit-animation-delay: -0.9s;
            animation-delay: -0.9s;
        }

        .container2 .circle2 {
            -webkit-animation-delay: -0.8s;
            animation-delay: -0.8s;
        }

        .container3 .circle2 {
            -webkit-animation-delay: -0.7s;
            animation-delay: -0.7s;
        }

        .container1 .circle3 {
            -webkit-animation-delay: -0.6s;
            animation-delay: -0.6s;
        }

        .container2 .circle3 {
            -webkit-animation-delay: -0.5s;
            animation-delay: -0.5s;
        }

        .container3 .circle3 {
            -webkit-animation-delay: -0.4s;
            animation-delay: -0.4s;
        }

        .container1 .circle4 {
            -webkit-animation-delay: -0.3s;
            animation-delay: -0.3s;
        }

        .container2 .circle4 {
            -webkit-animation-delay: -0.2s;
            animation-delay: -0.2s;
        }

        .container3 .circle4 {
            -webkit-animation-delay: -0.1s;
            animation-delay: -0.1s;
        }

        @-webkit-keyframes bouncedelay {
            0%, 80%, 100% { -webkit-transform: scale(0.0) }
            40% { -webkit-transform: scale(1.0) }
        }

        @keyframes bouncedelay {
            0%, 80%, 100% {
                transform: scale(0.0);
                -webkit-transform: scale(0.0);
            } 40% {
                  transform: scale(1.0);
                  -webkit-transform: scale(1.0);
              }
        }

    </style>
    <div class="container-fluid" style="background: black;min-height: 500px;">
        <div id="content">
            <img  id="shop-img" src="/images/shopping-01.png" alt="shopping_log" >
            <span id="text">PANIER</span>
            <div id="panier-info" style="background:rgba(37,37,36,0.6);margin-top: 26px;padding: 40px  34px ">
                <p style="font-size: 18px;font-weight: bold;">RECAPITULATIF DE VOTRE PANNIER</p>
                <ul class="list-group" style="border: none" id="result">
                    <div id="loading" style="display: block;position:absolute;left: 40%; ">
                        <div class="spinner">
                            <div class="spinner-container container1">
                                <div class="circle1"></div>
                                <div class="circle2"></div>
                                <div class="circle3"></div>
                                <div class="circle4"></div>
                            </div>
                            <div class="spinner-container container2">
                                <div class="circle1"></div>
                                <div class="circle2"></div>
                                <div class="circle3"></div>
                                <div class="circle4"></div>
                            </div>
                            <div class="spinner-container container3">
                                <div class="circle1"></div>
                                <div class="circle2"></div>
                                <div class="circle3"></div>
                                <div class="circle4"></div>
                            </div>
                        </div>
                    </div>
                    </ul>
                <ul class="list-group" style="border: none">
                    <li class="list-group-item" style="height: 147px;font-size: 14px;">
                        <div class="row" style="margin: 0px">
                            <p style="opacity:0.6;width: 742.5px;display: inline-block;float:left;">Nombre de produits</p>
                            <span id="product-total-count"></span>
                        </div>
                        <div class="row" style="margin: 0px;">
                            <p style="opacity:0.6;display: inline-block;float:left;width: 742.5px">Nombre de pieces</p>
                            <span id="product-total-piece" style="float:left;display: inline-block;"></span>
                        </div>
                    </li>
                    <li class="list-group-item" style="font-size: 14px">

                        <div class="row" style="margin: 0px">
                            <p style="opacity:0.6;width: 742.5px;display: inline-block;float:left;">Total</p>
                            <span id="total_price">0€</span>
                        </div>
                    </li>
                </ul>
            </div>
            <p style="font-size: 33px;font-weight: bold;margin-top: 102px">Mode de livraison <i class="fa fa-question-circle" aria-hidden="true" data-toggle="tooltip" data-placement="right"></i> </p>
            <div id="livraison-info" >
                <div class="radio ">
                    <input type="radio" name="radio-1" id="emporter"  />
                    <label for="emporter"></label> <span style="float:left;"> LIVRISON</span>

                    <input type="radio" name="radio-1" id="livrison" checked="checked"/>
                    <label for="livrison" style="margin-left: 10px"></label> <span style="float:left;">A EMPORTEM</span>
                </div>
                <br>
                <input type="text" id="start_place" placeholder="entre votre place" style="display: block;width: 300px">
                <p id="distance"></p>
                <div id="show-livrison">
                <div class="content">
                    <div class="select" id="select-place">
                        <p id="end_place" data-place="" >Selectionnez un point relais</p>
                        <ul style="z-index: 1">
                            @inject('points','App\Relais')
                            <li data-value="Tout de boutique" data-place="all">Tout de boutique</li>
                            @foreach($points::all() as $key=>$point)
                                <li data-place="{{$point->address}}" data-index="{{$key+1}}" data-value="{{$point->name}}" data-id="{{$point->id}}">{{$point->name}}</li>

                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="content" style="padding-top: 30px">
                    <div class="select" style="width: 150px" id="select-date">
                        <p style="width: 110px">DATE</p>
                        <ul style="z-index: 1">
                                <li data-value="Aujour'dui" >Aujour'dui</li>
                                <li data-value="Autre">Autre</li>
                        </ul>
                    </div>
                </div>
                <div class="content" style="padding-top: 30px;display: none" id="today-time">
                    <div class="select" style="width: 150px" id="select-time">
                        <p style="width: 110px">Heure</p>
                        <ul style="z-index: 1">
                        </ul>
                    </div>
                </div>
                <div class="content" style="padding-top: 25px;display: none" id="autre-date" >
                    <div class="select" style="width: 150px" id="select-autre-date">
                        <p style="width: 110px;font-size: 12px">Date souhaitee</p>
                        <ul style="z-index: 1">
                            <li data-value="{{date('d-m-Y',strtotime('+1 day'))}}">{{date('d-m-Y',strtotime('+1 day'))}}</li>
                            <li data-value="{{date('d-m-Y',strtotime('+2 day'))}}">{{date('d-m-Y',strtotime('+2 day'))}}</li>

                        </ul>
                    </div>
                </div>
                <div class="content" style="padding-top: 25px;display: none" id="autre-time">
                    <div class="select" style="width: 150px" id="select-autre-time">
                        <p style="width: 110px">Heure</p>
                        <ul style="z-index: 1">
                            <li data-value="10:30-11:00">10:30-11:00</li>
                            <li data-value="11:30-12:00">11:30-12:00</li>
                        </ul>
                    </div>
                </div>
                </div>
                {{--没登录--}}
                @inject('cart','Overtrue\LaravelShoppingCart\Cart')
                @if (Auth::guest())
                    <a id="btn-submit" class="btn" style="position: relative;top: 30px;display: block" href="{{url('/connexion')}}">VALIDER</a>
                @elseif(cart::total()>0)
                    <a id="btn-submit" class="btn" style="position: relative;top: 30px;display: block" href="{{url('/validation')}}">VALIDER</a>
                    @esle
                    <button id="btn-submit" class="btn" style="position: relative;top: 30px;display: block">VALIDER</button>

                @endif
                <div id="map">
                </div>
            </div>
        </div>
    </div>
    <script src="/js/cart.js"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCIbJ48RCsE-UPzW9y-3hmxWpNVKm6tYho&language=fr&libraries=places" type="text/javascript"></script>
    <script src="/js/panier.js"></script>
    <script>
        getCart();
        $("[data-toggle='tooltip']").tooltip();
        function initMap() {
            //获取用户地址
            var input =document.getElementById('start_place');
            var directionsService = new google.maps.DirectionsService();
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
                zoom: 9,
                center: {lat: 48.8588377, lng: 2.2775171},
                mapTypeControlOptions: {
                    mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
                }
            });
            map.mapTypes.set('map_style', styledMap);
            map.setMapTypeId('map_style');
            var geocoder = new google.maps.Geocoder();

            var markers = [];
            var autocomplete = new google.maps.places.Autocomplete(input);

//            var image = '/images/position-icon.png';
            var image = {
                url: '/images/position-icon.png',
                size: new google.maps.Size(71, 71),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(17, 34),
                scaledSize: new google.maps.Size(25, 25)
            };


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
                        addMarker(results[0].geometry.location,index,content)
                    } else {
                        alert('Geocode was not successful for the following reason: ' + status);
                    }
                });
            }
            var infowindow = new google.maps.InfoWindow();

            function attachSecretMessage(marker, secretMessage) {
               infowindow.close();
                infowindow.setContent(secretMessage);
                marker.addListener('click', function() {
                    infowindow.close(marker.get('map'), marker);
                    map.setZoom(10);
                    infowindow.open(map, marker);
                });
            }
            var marker1 = new google.maps.Marker({
                map: map,
                anchorPoint: new google.maps.Point(0, -29)
            });
            autocomplete.addListener('place_changed', function() {
                calcRoute();
                infowindow.close();
                marker1.setVisible(false);
                var place = autocomplete.getPlace();
                if (!place.geometry) {
                    window.alert("Autocomplete's returned place contains no geometry");
                    return;
                }

                // If the place has a geometry, then present it on a map.
                if (place.geometry.viewport) {
                    map.fitBounds(place.geometry.viewport);
                } else {
                    map.setCenter(place.geometry.location);
                    map.setZoom(17);  // Why 17? Because it looks good.
                }
                marker1.setIcon(/** @type {google.maps.Icon} */({
                    url: place.icon,
                    size: new google.maps.Size(71, 71),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(17, 34),
                    scaledSize: new google.maps.Size(35, 35)
                }));
                marker1.setPosition(place.geometry.location);
                marker1.setVisible(true);

                var address = '';
                if (place.address_components) {
                    address = [
                        (place.address_components[0] && place.address_components[0].short_name || ''),
                        (place.address_components[1] && place.address_components[1].short_name || ''),
                        (place.address_components[2] && place.address_components[2].short_name || '')
                    ].join(' ');
                }

                infowindow.setContent('<div>Votre place<strong>' + place.name + '</strong><br>' + address);
                infowindow.open(map, marker1);
            });

            function addMarker(position,index,content){
                var marker =new google.maps.Marker({
                    position: position,
                    map: map,
//                        icon: image,
                    animation: google.maps.Animation.DROP,
                    label:(index+1)+''
                });
                attachSecretMessage(marker, content);
                markers.push(marker)
            }

            function calcRoute() {
                var start = input;
                var end = $('#end_place').attr('data-place');
                var request = {
                    origin: start,
                    destination: end,
                    travelMode: google.maps.TravelMode.DRIVING
                };
                directionsService.route(request, function (response, status) {
                    if (status == google.maps.DirectionsStatus.OK) {
                        directionsDisplay.setDirections(response);
                        var route = response.routes[0];
                        var distance;
                        var summaryPanel = document.getElementById('distance');
                        summaryPanel.innerHTML = '';
                        distance=route.legs[0].distance.text;
                        summaryPanel.innerHTML += distance;
                    } else {
//                        alert('请输入出发地和到达地');
                    }
                });
            }

            function setMapOnAll(map) {
                for (var i = 0; i < markers.length; i++) {
                    markers[i].setMap(map);
                }
            }

            function clearMarkers() {
                setMapOnAll(null);
            }
            function deleteMarkers() {
                clearMarkers();
                markers = [];
            }
            $.get('/json', function (data) {
                $.each(data, function (key,val) {
                    geocodeAddress(val.address,geocoder, map,key);
                })
            });
            //获得该地点营业时间
            function getTime(id){
                $.get('/timeJson',{id:id}, function (response) {
                    $('#select-time > p').text(response);
                })
            }
            $('#select-place ul li').on('click', function(e){
                deleteMarkers();
                var _this = $(this);
                var place=_this.attr('data-place');
                var index=_this.attr('data-index');
                var id=_this.attr('data-id');
                if (place=='all'){
                    $.get('/json', function (data) {
                        $.each(data, function (key,val) {
                            geocodeAddress(val.address,geocoder, map,key);
                        })
                    });
                }else {
                    getTime(id);
                    geocodeAddress(place,geocoder,map,index);
                }
                $('#end_place').attr('data-place',place);
                $('#select-place > p').text(_this.attr('data-value'));
                _this.addClass('selected').siblings().removeClass('selected');
                $('.select').removeClass('open');
                e.stopPropagation();
            });
        }
        initMap();

        $('.select').on('click', function(e){
            $(this).toggleClass('open');
            e.stopPropagation();
        });

        $('#select-date ul li').on('click', function(e){
            var _this = $(this);
            var date=_this.attr('data-value');
            if ( date =="Aujour'dui"){
                $('#today-time').slideDown();
                $('#autre-date').slideUp();
                $('#autre-time').slideUp();
            }else {
                $('#today-time').slideUp();

                $('#autre-date').slideDown();
                $('#autre-time').slideDown();
            }
            $('#select-date > p').text(_this.attr('data-value'));
            _this.addClass('selected').siblings().removeClass('selected');
            $('.select').removeClass('open');
            e.stopPropagation();
        });
        $('#select-time ul li').on('click', function(e){
            var _this = $(this);
            $('#select-time > p').text(_this.attr('data-value'));
            _this.addClass('selected').siblings().removeClass('selected');
            $('.select').removeClass('open');
            e.stopPropagation();
        });
        $('#select-autre-time ul li').on('click', function(e){
            var _this = $(this);
            $('#select-autre-time > p').text(_this.attr('data-value'));
            _this.addClass('selected').siblings().removeClass('selected');
            $('.select').removeClass('open');
            e.stopPropagation();
        });
        $('#select-autre-date ul li').on('click', function(e){
            var _this = $(this);
            $('#select-autre-date > p').text(_this.attr('data-value'));
            _this.addClass('selected').siblings().removeClass('selected');
            $('.select').removeClass('open');
            e.stopPropagation();
        });
        $(document).on('click', function(){
            $('.select').removeClass('open');
        });

        $('#emporter').click(function () {
            $('#show-livrison').hide();
        });
        $('#livrison').click(function () {
            $('#show-livrison').show();
        });


    </script>
@endsection