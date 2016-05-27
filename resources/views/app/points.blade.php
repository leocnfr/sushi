@extends('app.app_template')
@section('content')
    <style>
        #map {
            height: 400px;
            width: 1000px;
            margin: 0 auto;
            top: 20px;
        }
        #content
        {

            width: 100%;
            min-height: 700px;
            background: black;
        }
    </style>
    <div id="content">
        <div id="map">

        </div>
    </div>

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