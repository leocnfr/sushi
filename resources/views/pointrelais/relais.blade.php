@extends('admin.admin_template')
@section('page_title','Relais列表')
@section('relaisactive','active')
@section('content')
    <style>
        #map { height: 300px; }
    </style>

    <div id="map">

    </div>
    <table class="table table-hover">
    	<thead>
    		<tr>
    			<th>编号</th>
                <th>Relais名称</th>
                <th>地址</th>
                <th>介绍</th>
                <th>操作</th>
    		</tr>
    	</thead>
    	<tbody>
            @foreach($relais as $key=>$relai)
                <form action="{{url('/admin/relais/destroy')}}" method="post">
                    {!! csrf_field() !!}
                    <input type="hidden" value="{{$relai->id}}" name="id">
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$relai->name}}</td>
                    <td>{{$relai->address}}</td>
                    <td>{{$relai->intro}}</td>
                    <td>
                        <a class="btn btn-info" href="{{url('/admin/relais/'.$relai->id)}}">编辑</a>
                        <button class="btn btn-danger" onclick="return confirm('确定删除?')">删除</button>
                    </td>
                </tr>
                </form>
            @endforeach
    	</tbody>
    </table>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCIbJ48RCsE-UPzW9y-3hmxWpNVKm6tYho&language=fr" type="text/javascript"></script>
    <script>

        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 11,
                center: {lat: 48.8588377, lng: 2.2775171}
            });
            var geocoder = new google.maps.Geocoder();

            var markers = [];

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
                        addMarkerWithTimeout(results[0].geometry.location,400*(index+1))
                    } else {
                        alert('Geocode was not successful for the following reason: ' + status);
                    }
                });
            }
            $.get('/json', function (data) {
                $.each(data, function (key,val) {
                    geocodeAddress(val.address,geocoder, map,key);
                })
            });
            function addMarkerWithTimeout(position, timeout) {
                window.setTimeout(function() {
                    markers.push(new google.maps.Marker({
                        position: position,
                        map: map,
                        icon: image,
                        animation: google.maps.Animation.DROP
                    }));
                }, timeout);
            }

        }
        

        initMap();

    </script>
@endsection