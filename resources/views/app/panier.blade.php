@extends('app.app_template')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
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
            background: black;
            border: 1px solid;
            margin: 0px 1px;
            width: 40px;
            height: 20px;
            display: inline-block;

        }
        .list-group-item{
            padding: 10px 0px;
            background: none;
            border: none;
            border-bottom: 2px solid #BAAA76;
        }
        #livraison-info
        {
            background: rgba(94,93,91,0.4);
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
            background: #BAAA76;
            color: black;
            border: 0pt;
            box-shadow: none;
            border-radius: 5px;
        }
    </style>
    <div class="container-fluid" style="background: black;min-height: 500px;">
        <div id="content">
            <img  id="shop-img" src="/images/shopping-01.png" alt="shopping_log" >
            <span id="text">PANIER</span>
            <div id="panier-info" style="background:#252524;margin-top: 26px;padding: 40px  34px ">
                <p style="font-size: 20px;font-weight: bold;">RECAPITULATIF DE VOTRE PANNIER</p>
                <ul class="list-group" style="border: none">
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
                        <p style="opacity:0.6;">Nombre de produits</p>
                        <p style="opacity:0.6;">Nombre de pieces</p>
                    </li>
                    <li class="list-group-item" style="font-size: 33px">
                        <span>Total</span>
                        <span>1€</span>
                    </li>
                </ul>
            </div>
            <p style="font-size: 33pt;font-weight: bold;margin-top: 102px">Mode de livraison <i class="fa fa-question-circle" aria-hidden="true" data-toggle="tooltip" data-placement="right"></i> </p>
            <div id="livraison-info" >
                <div class="radio ">
                    <input type="radio" name="radio-1" id="emporter"  />
                    <label for="emporter"></label> <span style="float:left;">A EMPORTEM</span>

                    <input type="radio" name="radio-1" id="livrison" checked="checked"/>
                    <label for="livrison" style="margin-left: 10px"></label> <span style="float:left;">LIVRISON</span>
                </div>
                <div id="show-livrison">
                <div class="content">
                    <div class="select" id="select-place">
                        <p>Selectionnez un point relais</p>
                        <ul style="z-index: 1">
                            @inject('points','App\Relais')
                            <li data-value="Tout de boutique" data-place="all">Tout de boutique</li>
                            @foreach($points::all() as $key=>$point)
                                <li data-place="{{$point->address}}" data-index="{{$key+1}}" data-value="{{$point->name}}" >{{$point->name}}</li>

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
                            <li data-value="10:30-11:00">10:30-11:00</li>
                            <li data-value="11:30-12:00">11:30-12:00</li>
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
                <button id="btn-submit" style="position: relative;top: 30px;display: block">VALIDER</button>
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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCIbJ48RCsE-UPzW9y-3hmxWpNVKm6tYho&language=fr" type="text/javascript"></script>

    <script>
        $("[data-toggle='tooltip']").tooltip();
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
                zoom: 9,
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
                    infowindow.close(marker.get('map'), marker);
                    map.setZoom(10);
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

            function clearMarkers() {
                setMapOnAll(null);
            }

            $.get('/json', function (data) {
                $.each(data, function (key,val) {
                    geocodeAddress(val.address,geocoder, map,key);
                })
            });
            $('#select-place ul li').on('click', function(e){

                var _this = $(this);
                var place=_this.attr('data-place');
                var index=_this.attr('data-index');
                if (place=='all'){
                    $.get('/json', function (data) {
                        $.each(data, function (key,val) {
                            geocodeAddress(val.address,geocoder, map,key);
                        })
                    });
                }else {
                    geocodeAddress(place,geocoder,map,index);
                }
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