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
            var geocoder = new google.maps.Geocoder();
            var myLatLng = [
                {lat: 50.6310465, lng: 2.9771208},
                {lat: 51.6310465, lng: 2.8771208}

            ];
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 9,
                center: {lat: 50.6310465, lng: 2.9771208}
            });
//            $.each(myLatLng, function (key,val) {
                new google.maps.Marker({
                    position:{lat: 50.6310465, lng: 2.9771208},
                    map: map,
                    title: 'Hello World!'
                });
                 new google.maps.Marker({
                    position:{lat: 41.6310465, lng: 4.8771208},
                    map: map,
                    title: 'Hello World!'
                });
//                console.log(val.lat,val.lng);
//            });

        }
        initMap();
    </script>
@endsection