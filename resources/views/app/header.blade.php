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
<ul class="list-unstyled" id="drop-bar">
    @foreach($products as $product)
        <li class="drop-bar-item">
            <img src="{{URL::asset('/storage/uploads/'.$product->productImage)}}" alt="{{$product->name}}" style="width: 119px;height: 68px;display: block;margin: 0px auto">
            <p>{{$product->name}}</p>
        </li>
    @endforeach
</ul>
<script>
    $('#show-drop-bar').hover(function () {
        $('ul#drop-bar').stop().fadeIn(500);

    }, function () {
        $('ul#drop-bar').stop().fadeOut(500);
    });
    $('ul#drop-bar').hover(function () {
        $('ul#drop-bar').stop().fadeIn(500);

    }, function () {
        $('ul#drop-bar').stop().fadeOut(500);
    });
    $('.drop-bar-item').hover(function () {
        var index = $(".drop-bar-item").index(this);
        var left=(170-60*index)+'px';
        $('.drop-bar-item').stop().animate({left:left},10);
    })
</script>
