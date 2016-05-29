@inject('cates','App\Category')
@extends('app.app_template')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        #sidebar
        {
            width: 142px;
            height: 514px;
            background: black;
            color: #BAAA76;
            padding-top: 54px;
            padding-left: 10px;
            margin: 0px 0 60px 0px;
            max-height: 514px;
            overflow: hidden;
        }
        .item
        {
            font-weight: bold;
            font-size: 16px;

        }
        .item>img{
            display: block;
            margin: 0px auto;
            cursor: pointer;
        }
        .item>a{
            cursor: pointer;
            display: block;
            width: 152px;
            height: 117px;
            margin: 0px auto;
        }
        #content
        {
            color: #BAAA76;
            margin-top: 21.5px;
            margin-bottom: 83px;
        }
        .button-ajouter
        {
            background: #151515;
            border-radius: 10px;
            color: white;
            display: block;
            margin: 10px auto ;
            border: none;
            box-shadow: 1px 1px 6px 1px #000000;
        }
        .button-ajouter:focus{
            outline: none;
        }
        #sidebar>li:not(:last-child)
        {
            border-bottom: 1px solid #BAAA76;
        }
        .col-md-4.item:nth-of-type(2n)
        {
            border-left: 2px solid rgba(186,170,118,0.4);
        }
        .col-md-4.item:nth-of-type(3n)
        {
            border-left: 2px solid rgba(186,170,118,0.4);

        }
        .sidebar-item
        {
            top: 24px;
            text-align: center;
            cursor: pointer;
            position: relative;
            padding: 10px 0;
        }
        .sidebar-item > a
        {
            color: #BAAA76;
            text-decoration: none;
        }
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
        }
        input[type="number"]{
            -moz-appearance: textfield;
            background: black;
            border: black;
            text-align: center;
        }
        #btn_panier{
            display: block;
            margin: 15px auto 0 auto;
            background: #BAAA76;
            color: black;
            border: 0pt;
            box-shadow: none;
            border-radius: 5px;
        }
        #btn_panier:focus
        {
            outline: none;
        }
        #panier_inro{
            height: 61px;
        }
        #panier_inro>span:nth-of-type(n)
        {
            position: relative;
            font-size: 11pt;
        }
        #panier_inro>span:nth-of-type(2n)
        {
            position: relative;
            font-size: 13pt;
        }
        #triangle-left {
            width: 0;
            height: 0;
            position: absolute;
            right: 0px;
            top: 135px;
            border-top: 15px solid transparent;
            border-right: 15px solid rgba(94,93,91,0.4);
            border-bottom: 15px solid transparent;
        }
        .fa-plus-circle{
            margin-left: 5px;
        }

        .item-list{
            padding: 10px;
        }
        .pagination > li:first-child > span
        {
            border-radius: 50%;
            background: none;
            color: #BAAA76;
        }
        .pagination > li:last-child > span
        {
            border-radius: 50%;
            background: none;
            color: #BAAA76;
        }
        .pagination > .active > span
        {
            border-radius: 50%;
            background: #BAAA76;
            color: black;
        }
        .pagination > li > a, .pagination > li > span
        {
            color: #BAAA76;
            background: none;
            border: none;
            border-radius: 50%;
            margin: 0px 1px;
        }
        .pagination > .disabled > span, .pagination > .disabled > span:hover, .pagination > .disabled > span:focus, .pagination > .disabled > a, .pagination > .disabled > a:hover, .pagination > .disabled > a:focus
        {
            border-radius: 50%;
            background: #BAAA76;
            color: black;
        }
        .pagination > li > a:hover
        {
            border-radius: 50%;
            background: #BAAA76;
            color: black;
        }
        .pagination > .active > span,.pagination > .active > span:hover
        {
            border-radius: 50%;
            background: #BAAA76;
            color: black;
        }
        .result_price_list{
            padding: 0px;
        }
        .result_price_list>li
        {
            border-bottom: 1px dashed grey
        }
        .result_name{
            font-size: 12pt;
            float: left;
            width: 33%;
        }
        .result_number_info
        {
            width: 33%;
            display: inline-block;
            background: black;
            padding: 0px 1px
        }
        .result_price{
            font-size: 16pt;
            width: 33%;
        }
        .ajouter-disabled{
            cursor: not-allowed;
        }
    </style>
    <div class="container-fluid " style="padding:0;background: black ">
        @if(!isset($cate))
        <ul id="sidebar" class="col-md-2">
            @foreach($cates->getMenu() as $key=>$value)
                <li class="sidebar-item list-unstyled">
                    <a href="{{url('/menus/'.str_slug($value->cat_name))}}">
                        <p>{{$value->cat_name}}</p>
                        <img src="{{URL::asset('/storage/uploads/'.$value->src)}}" alt="{{$value->cat_name}}" style="width: 119px;height: 68px">
                    </a>

                </li>
            @endforeach

        </ul>
        @else
            <ul id="sidebar" class="col-md-2">
                <li class="sidebar-item list-unstyled">
                    <a href="{{url('/menus/'.str_slug($cates->getSideMenu($cate->id)->cat_name))}}">
                    <p>{{$cates->getSideMenu($cate->id)->cat_name}}</p>
                    <img src="{{URL::asset('/storage/uploads/'.$cates->getSideMenu($cate->id)->src)}}" alt="{{$cates->getSideMenu($cate->id)->cat_name}}" style="width: 119px;height: 68px">
                    </a>
                </li>
                @foreach($cates->getOther($cate->id) as $key=>$value)
                    <li class="sidebar-item list-unstyled">
                        <a href="{{url('/menus/'.str_slug($value->cat_name))}}">
                        <p>{{$value->cat_name}}</p>
                        <img src="{{URL::asset('/storage/uploads/'.$value->src)}}" alt="{{$value->cat_name}}" style="width: 119px;height: 68px">
                        </a>
                    </li>
                @endforeach
                <div id="triangle-left"></div>

            </ul>
        @endif

        <div id="content" class="col-md-8" style="background: rgba(94,93,91,0.4);width: 788px">
            @if(isset($cate))
                @foreach($cate->product->chunk(3)  as $chunk)
                    <div class="row item-list">
                        @foreach($chunk as $item)
                            <div class="col-md-4 item" >
                                <a  data-toggle="modal" data-target="#exampleModal" data-name="{{$item->name}}" data-count="{{$item->count}}" data-price="{{$item->price}}" data-content="{{$item->content}}" data-src="{{$item->productImage}}">
                                    <img src="{{URL::asset('/storage/uploads/'.$item->productImage)}}" alt="" style="width: 152px;height: 117px;">
                                </a>

                                <p>{{$item->name}}</p>
                                <span>{{$item->count}} pièce</span>
                                <span class="pull-right">{{$item->price}}€</span>
                                @if(date('G',time())<12&&str_contains($item->send_time,'1'))
                                <button class="button-ajouter" data-productid="{{$item->id}}" data-toggle="modal" data-target="#autre">AJOUTER<i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                                 @else
                                    <small>Indisponible</small>
                                @endif

                            </div>
                        @endforeach

                    </div>
                @endforeach
                @else
                    @foreach($products->chunk(3) as $chunk)
                    <div class="row item-list">
                        @foreach($chunk as $item)
                            <div class="col-md-4 item" >
                                <a  data-toggle="modal" data-target="#exampleModal" data-name="{{$item->name}}" data-count="{{$item->count}}" data-price="{{$item->price}}" data-content="{{$item->content}}" data-src="{{$item->productImage}}">
                                    <img src="{{URL::asset('/storage/uploads/'.$item->productImage)}}" alt="" style="width: 152px;height: 117px;">
                                </a>

                                <p>{{$item->name}}</p>
                                <span>{{$item->count}} pièce</span>
                                <span class="pull-right">{{$item->price}}€</span>
                                @if(date('G',time())<12&&str_contains($item->send_time,'1'))
                                    <button class="button-ajouter" data-productid="{{$item->id}}" data-toggle="modal" data-target="#autre">AJOUTER<i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                                    @elseif(date('G',time())<18&&12<=date('G',time())&&str_contains($item->send_time,'2'))
                                    <button class="button-ajouter" data-productid="{{$item->id}}" data-toggle="modal" data-target="#autre">AJOUTER<i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                                @else
                                    @if(date('G',time())<=12&&str_contains($item->send_time,'2'))
                                    <small style="display: block;color: red">MENU MIDI NOUS VOUS OFFRONS QUE DU MIDI</small>
                                    @elseif(date('G',time())<18&&12<=date('G',time())&&str_contains($item->send_time,'1'))
                                        <small style="display: block;color: red">Indisponible only soire</small>
                                    @endif
                                    @endif

                            </div>
                        @endforeach
                    </div>
                @endforeach
                {!! $products->render() !!}
            @endif


        </div>
        <div id="cart-info" class="col-md-2" style="background: rgba(94,93,91,0.4);margin-left: 18px;text-align: center;color: #BAAA76;width: 250px;padding: 0px;margin-top: 21.5px;">
            <aside id="result" style="min-height: 123px">
                <p style="font-size: 19pt;font-weight: bold;margin-bottom: 30px">MON PANIER</p>
                <ul class="result_price_list">
                    <p>Votre panier est vide</p>
                   {{--<li class="list-unstyled">--}}
                       {{--<span class="result_name">MENU BOTAN</span>--}}
                       {{--<div class="result_number_info" >--}}
                           {{--<i class="fa fa-minus" aria-hidden="true" id="minus"></i>--}}
                           {{--<input type="number" style="width: 15px;height: 15px" min="1" value="1" id="product_number">--}}
                           {{--<i class="fa fa-plus" aria-hidden="true" id="plus"></i>--}}
                       {{--</div>--}}
                       {{--<span  class="result_price">15.90€</span>--}}
                   {{--</li>--}}
                </ul>
            </aside>
            <aside id="panier_inro" >
                <span style="margin-right: 70px">Nombre de projduts</span> <span id="product-total-count">0</span> <br>
                <span style="margin-right: 80px">Nombre de piece</span> <span id="product-total-piece">0</span>
            </aside>
            <aside style="color: white;padding-bottom: 38px;margin-top: 10px">
                <span style="margin-right:120px">Total</span>
                <span id="total_price">0€</span>
                <button  id="btn_panier">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    VOIR MON PANIER
                </button>
            </aside>
        </div>
    </div>
    @include('app.modal')
    @include('app.autre_modal')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.16/vue.js"></script>
    <script>
        $('.button-ajouter').click(function () {
            $.ajaxSetup(
                    {
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url:'/cart',
                        type: "post"
                    });

            var productId=$(this).data('productid');
            $.ajax({ data: {productId:productId,type:'menu'} }).done(function (response) {
                 rawId=response;
            });

        })
        $('li.sidebar-item').hover(function () {
            var index = $(".sidebar-item").index(this);
           if (index=='1'){
               $('li.sidebar-item').stop().animate({top:'-97px'},500)
           }else if(index=='2'){
                $('li.sidebar-item').stop().animate({top:'-230px'},500)
           }else if(index =='0'){
               $('li.sidebar-item').stop().animate({top:'20px'},500)

           }
        });

        $('.ajouter-disabled').click(function () {

        });
        $.get('/cartJson', function (response) {
            var html='';
            var total=0;
            var count=0;
            var piece=0;
            $.each(response, function (key,value) {
                total+=parseFloat(value.total);
                piece+=parseInt(value.piece);
                count+=parseInt(value.qty);
                html+='<li class="list-unstyled">';
                html+='<span class="result_name">'+value.name+'</span>';
                html+='<div class="result_number_info">';
                html+='<i class="fa fa-minus" aria-hidden="true" id="minus"></i>';
                html+='<span>'+value.qty+'</span> ';
                html+='<i class="fa fa-plus" aria-hidden="true" id="plus"></i>';
                html+='</div>';
                html+='<span class="result_price ">'+value.price+'</span>';
                html+='<p>'+value.boission+'</p>';
                html+='</li>';

            });
            $('.result_price_list').html(html);
            $('#total_price').html(total);
            $('#product-total-count').html(count);
            $('#product-total-piece').html(piece);
        })
    </script>
@endsection