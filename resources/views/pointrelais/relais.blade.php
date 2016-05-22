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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCIbJ48RCsE-UPzW9y-3hmxWpNVKm6tYho" type="text/javascript"></script>
    <script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 10,
                center: {lat: -33.9, lng: 151.2}
            });

            setMarkers(map);
        }

        // Data for the markers consisting of a name, a LatLng and a zIndex for the
        // order in which these markers should display on top of each other.
        var beaches = [
            ['Bondi Beach', -33.890542, 151.274856, 4],
            ['Coogee Beach', -33.923036, 151.259052, 5],
            ['Cronulla Beach', -34.028249, 151.157507, 3],
            ['Manly Beach', -33.80010128657071, 151.28747820854187, 2],
            ['Maroubra Beach', -33.950198, 151.259302, 1]
        ];

        function setMarkers(map) {
            // Adds markers to the map.

            // Marker sizes are expressed as a Size of X,Y where the origin of the image
            // (0,0) is located in the top left of the image.

            // Origins, anchor positions and coordinates of the marker increase in the X
            // direction to the right and in the Y direction down.
            var image = {
                url: 'images/position-icon.png',
                // This marker is 20 pixels wide by 32 pixels high.
                size: new google.maps.Size(20, 32),
                // The origin for this image is (0, 0).
                origin: new google.maps.Point(0, 0),
                // The anchor for this image is the base of the flagpole at (0, 32).
                anchor: new google.maps.Point(0, 32)
            };
            // Shapes define the clickable region of the icon. The type defines an HTML
            // <area> element 'poly' which traces out a polygon as a series of X,Y points.
            // The final coordinate closes the poly by connecting to the first coordinate.
            var shape = {
                coords: [1, 1, 1, 20, 18, 20, 18, 1],
                type: 'poly'
            };
            for (var i = 0; i < beaches.length; i++) {
                var beach = beaches[i];
                var marker = new google.maps.Marker({
                    position: {lat: beach[1], lng: beach[2]},
                    map: map,
                    icon: image,
                    shape: shape,
                    title: beach[0],
                    zIndex: beach[3]
                });
            }
        }
        initMap();
    </script>
@endsection