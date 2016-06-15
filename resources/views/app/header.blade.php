@inject('cates','App\Category')
<div class="navbar" style="border-bottom:2px solid #BAAA76; ">
	<a class="navbar-brand" href="{{url('/show')}}">
        <img src="{{URL::asset('/images/logo.png')}}" alt="logo" style="width: 151px;height: 103px">
    </a>
	<ul class="nav navbar-nav navbar-header" style="left: 70px">
		<li class="active" id="show-drop-bar" style="height: 63px">
			<a href="{{url('/menus')}}">MENU</a>
		</li>
		<li>
			<a href="#">PROMOTION</a>
		</li>
        <li>
            <a href="/pointrelais">PIOINTS RELAIS</a>
        </li>
        <li>
            <a href="#">NEWS</a>
        </li>
	</ul>
    <ul class="nav navbar-nav navbar-right navbar-header">
        @if (Auth::guest())
            <li><a href="{{url('/connexion')}}"><img src="{{URL::asset('/images/compte-01.png')}}" alt="compte" style="width: 21px"></a></li>
        @else
            <li><a href="{{url('/compte')}}">{{ Auth::user()->nom }}</a></li>

        @endif
        <li>
            <a href="{{url('/panier')}}"><img src="{{URL::asset('/images/shopping-01.png')}}"  alt="shopping" style="width: 26px">
                <span class="label label-primary pull-right" id="panier-count" style="display: none"></span>

            </a>

        </li>

    </ul>

</div>
<div style="width: 100%;" id="drop-bar">
    <ul class="list-unstyled" style="position: relative;left: -110px">
        @foreach($cates->getMenu() as $key=>$cate)
        <li class="drop-bar-item" style="position: absolute;left: {{165*($key+1)}}px">
            <a href="{{url('/menus/'.str_slug($cate->cat_name))}}" style="text-decoration: none;color: #BAAA76">
        <img src="{{URL::asset('/storage/uploads/'.$cate->src)}}" alt="{{$cate->name}}" style="width: 119px;height: 68px;display: block;margin: 0px auto">
        <p>{{$cate->cat_name}}</p>
            </a>
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
        $('div#drop-bar').stop().slideDown(500);

    }, function () {
        $('div#drop-bar').stop().slideUp(500);
    });
    $('div#drop-bar').hover(function () {
        $('div#drop-bar').stop().slideDown(500);

    }, function () {
        $('div#drop-bar').stop().slideUp(500);
    });
//    $('.drop-bar-item').hover(function () {
////        var index = $(".drop-bar-item").index(this);
//        var left = (-110)+'px';
//        $('ul.list-unstyled').stop().animate({left:left},150);
//    })
</script>
