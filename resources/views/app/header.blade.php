<div class="navbar">
	<a class="navbar-brand" href="#">
        <img src="{{URL::asset('/images/logo.png')}}" alt="logo" style="width: 151px;height: 103px">
    </a>
	<ul class="nav navbar-nav" style="left: 70px">
		<li class="active" id="show-drop-bar">
			<a href="{{url('/menus')}}">MENU</a>
		</li>
		<li>
			<a href="#">PROMOTION</a>
		</li>
        <li>
            <a href="#">PIOINTS RELIAS</a>
        </li>
        <li>
            <a href="#">NEWS</a>
        </li>
	</ul>
    <ul class="nav navbar-nav navbar-right">
        <li><a href=""><img src="{{URL::asset('/images/compte-01.png')}}" alt="compte" style="width: 21px"></a></li>
        <li><a href=""><img src="{{URL::asset('/images/shopping-01.png')}}"  alt="shopping" style="width: 26px"></a></li>
    </ul>

</div>
<div style="width: 100%;" id="drop-bar">
    <ul class="list-unstyled" style="position: relative;">
        @foreach($products as $key=>$product)
        <li class="drop-bar-item" style="position: absolute;left: {{165*($key+1)}}px">
        <img src="{{URL::asset('/storage/uploads/'.$product->productImage)}}" alt="{{$product->name}}" style="width: 119px;height: 68px;display: block;margin: 0px auto">
        <p>{{$product->category->cat_name}}</p>
        </li>
        @endforeach
        {{--@for($i=0;$i<13;$i++)--}}
            {{--<li class="drop-bar-item" style="position: absolute;left:{{165*($i+1)}}px">--}}
                {{--<img src="/images/menu-saumon-xl.png"  style="width: 119px;height: 68px;display: block;margin: 0px auto">--}}
                {{--<p>MENU LUNCH {{$i}}</p>--}}
            {{--</li>--}}
        {{--@endfor--}}

    </ul>

</div>
<script>
    $('#show-drop-bar').hover(function () {
        $('div#drop-bar').stop().fadeIn(500);

    }, function () {
        $('div#drop-bar').stop().fadeOut(500);
    });
    $('div#drop-bar').hover(function () {
        $('div#drop-bar').stop().fadeIn(500);

    }, function () {
        $('div#drop-bar').stop().fadeOut(500);
    });
    $('.drop-bar-item').hover(function () {
        var index = $(".drop-bar-item").index(this);
        var left = (-110*index)+'px';
        $('ul.list-unstyled').stop().animate({left:left},150);
    })
</script>
