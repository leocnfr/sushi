@inject('cates','App\Category')
@extends('app.app_template')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>

        #sidebar
        {
            width: 180px;
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
            font-size: 16px;

        }
        .item-content
        {
            box-shadow: -1px 2px 10px 3px rgba(0, 0, 0, 0.3);

        }
        .item-content>img{
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
            margin-left: 15px;
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
        .button-ajouter:hover {
            opacity: 0.5;
        }
        #sidebar>li:not(:last-child)
        {
            border-bottom: 1px solid #BAAA76;
        }
        /*.col-md-4.item:nth-of-type(2n)*/
        /*{*/
            /*border-left: 2px solid rgba(186,170,118,0.4);*/
        /*}*/
        /*.col-md-4.item:nth-of-type(3n)*/
        /*{*/
            /*border-left: 2px solid rgba(186,170,118,0.4);*/

        /*}*/
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
            margin: 15px auto 15px auto;
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
        #btn_panier:hover{
            opacity: 0.5;
        }
        #panier_inro{
            height: 61px;
            padding: 0px 10px;
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
            border-right: 15px solid rgba(37,37,36,0.6);
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
            margin-top: 15px;
            border-bottom: 1px dashed grey
        }
        .result_name{
            font-size: 12pt;
            float: left;
            width: 33%;
            text-align: left;
        }
        .result_number_info
        {
            width: 22%;
            display: inline-block;
            background: black;
            padding: 0px 1px;
            margin: 0px 20px;
            float: left;
        }
        .result_price{
            font-size: 16pt;
            width: 33%;
            height: 22px;
            line-height: 22px;
            bottom: 2px;
            position: relative;
            text-align: right;
        }
        .ajouter-disabled{
            cursor: not-allowed;
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

        #content img
        {
                display: block; margin: 0 auto;
            }

        .item-content
        {
            padding: 10px;
        }
        .pull-left{
            color:#8c8c8c !important;
        }
        .pull-right{
            color:#8c8c8c !important;
        }
    </style>
    <div class="container-fluid " style="padding:0;background: #111111 ">
        {{--@if(!isset($cate))--}}
        {{--<ul id="sidebar" class="col-md-2">--}}
            {{--@foreach($cates->getMenu() as $key=>$value)--}}
                {{--<li class="sidebar-item list-unstyled">--}}
                    {{--<a href="{{url('/menus/'.str_slug($value->cat_name))}}">--}}
                        {{--<p>{{$value->cat_name}}</p>--}}
                        {{--<img src="{{URL::asset('/storage/uploads/'.$value->src)}}" alt="{{$value->cat_name}}" style="width: 119px;height: 68px">--}}
                    {{--</a>--}}

                {{--</li>--}}
            {{--@endforeach--}}

        {{--</ul>--}}
        {{--@else--}}
            {{--<ul id="sidebar" class="col-md-2">--}}
                {{--<li class="sidebar-item list-unstyled">--}}
                    {{--<a href="{{url('/menus/'.str_slug($cates->getSideMenu($cate->id)->cat_name))}}">--}}
                    {{--<p>{{$cates->getSideMenu($cate->id)->cat_name}}</p>--}}
                    {{--<img src="{{URL::asset('/storage/uploads/'.$cates->getSideMenu($cate->id)->src)}}" alt="{{$cates->getSideMenu($cate->id)->cat_name}}" style="width: 119px;height: 68px">--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--@foreach($cates->getOther($cate->id) as $key=>$value)--}}
                    {{--<li class="sidebar-item list-unstyled">--}}
                        {{--<a href="{{url('/menus/'.str_slug($value->cat_name))}}">--}}
                        {{--<p>{{$value->cat_name}}</p>--}}
                        {{--<img src="{{URL::asset('/storage/uploads/'.$value->src)}}" alt="{{$value->cat_name}}" style="width: 119px;height: 68px">--}}
                        {{--</a>--}}
                    {{--</li>--}}
                {{--@endforeach--}}
                {{--<div id="triangle-left"></div>--}}

            {{--</ul>--}}
        {{--@endif--}}

        <div id="content" class="col-md-9" style="background: rgba(37,37,36,0.6);">
            {{--@if(isset($cate))--}}
                {{--@foreach($products->chunk(4)  as $chunk)--}}
                    {{--<div class="row item-list">--}}
                        {{--@foreach($chunk as $item)--}}
                            {{--<div class="col-md-3 item" >--}}
                                {{--<div class="item-content">--}}
                                    {{--<a  data-toggle="modal" data-target="#exampleModal" data-name="{{$item->name}}" data-count="{{$item->count}}" data-price="{{$item->price}}" data-content="{{$item->content}}" data-src="{{$item->productImage}}">--}}
                                        {{--<img src="{{URL::asset('/storage/uploads/'.$item->productImage)}}" alt="" style="width: 152px;height: 117px; ">--}}
                                    {{--</a>--}}

                                    {{--<p>{{$item->name}}</p>--}}

                                    {{--<span>{{$item->count}} pièce</span>--}}
                                    {{--<span class="pull-right" >{{$item->price}}€</span>--}}
                                    {{--@if(date('G',time())<12&&str_contains($item->send_time,'1'))--}}
                                    {{--<button class="button-ajouter" data-productid="{{$item->id}}" data-toggle="modal" data-target="#autre">AJOUTER<i class="fa fa-plus-circle" aria-hidden="true"></i></button>--}}
                                    {{--                                @elseif(date('G',time())<24&&12<=date('G',time())&&str_contains($item->send_time,'2'))--}}
                                    {{--                                    <button class="button-ajouter" data-productid="{{$item->id}}" data-toggle="modal" data-target="#autre">AJOUTER<i class="fa fa-plus-circle" aria-hidden="true"></i></button>--}}
                                    {{--@else--}}
                                    {{--@if(date('G',time())<=12&&str_contains($item->send_time,'1'))--}}
                                    {{--<small  style="color: red;display: block">MENU MIDI NOUS VOUS OFFRONS QUE DU SOIR</small>--}}
                                    {{--@elseif(date('G',time())<18&&12<=date('G',time())&&str_contains($item->send_time,'1'))--}}
                                    {{--<small  style="color: red;display: block">MENU MIDI NOUS VOUS OFFRONS QUE DU MIDI</small>--}}
                                    {{--@endif--}}
                                    {{--@endif--}}
                                {{--</div>--}}


                            {{--</div>--}}
                        {{--@endforeach--}}

                    {{--</div>--}}
                {{--@endforeach--}}
                {{--@else--}}
                    @foreach($products->chunk(4) as $chunk)
                    <div class="row item-list">
                        @foreach($chunk as $item)
                            <div class="col-md-3 item" >
                                <div class="item-content">
                                    <a  data-toggle="modal" data-target="#exampleModal" data-name="{{$item->name}}" data-count="{{$item->count}}" data-price="{{$item->price}}" data-content="{{$item->content}}" data-src="{{$item->productImage}}">
                                        <img src="{{URL::asset('/storage/uploads/'.$item->productImage)}}" alt="" style="width: 152px;height: 117px;">
                                    </a>

                                    <p>{{$item->name}}</p>
                                    <span>{{$item->count}} pièce</span>
                                    <span class="pull-right">{{$item->price}}€</span>
                                    <button class="button-ajouter" data-productid="{{$item->id}}" data-toggle="modal" data-target="#autre">AJOUTER<i class="fa fa-plus-circle" aria-hidden="true"></i></button>

                                    {{--@if(date('G',time())<12&&str_contains($item->send_time,'1'))--}}
                                    {{--<button class="button-ajouter" data-productid="{{$item->id}}" data-toggle="modal" data-target="#autre">AJOUTER<i class="fa fa-plus-circle" aria-hidden="true"></i></button>--}}
                                    {{--@elseif(date('G',time())<24&&12<=date('G',time())&&str_contains($item->send_time,'2'))--}}
                                    {{--<button class="button-ajouter" data-productid="{{$item->id}}" data-toggle="modal" data-target="#autre">AJOUTER<i class="fa fa-plus-circle" aria-hidden="true"></i></button>--}}
                                    {{--@else--}}
                                    {{--@if(date('G',time())<=12&&str_contains($item->send_time,'2'))--}}
                                    {{--<small  style="color: red;display: block">MENU MIDI NOUS VOUS OFFRONS QUE DU SOIR</small>--}}
                                    {{--@elseif(date('G',time())<18&&12<=date('G',time())&&str_contains($item->send_time,'1'))--}}
                                    {{--<small  style="color: red;display: block">MENU MIDI NOUS VOUS OFFRONS QUE DU MIDI</small>--}}
                                    {{--@endif--}}
                                    {{--@endif--}}
                                </div>


                            </div>
                        @endforeach
                    </div>
                @endforeach
                {!! $products->render() !!}
            {{--@endif--}}


        </div>
        <div id="cart-info" class="col-md-2" style="background: rgba(37,37,36,0.6);margin-right: 18px;text-align: center;color: #BAAA76;width: 20%;padding: 0px;margin-top: 21.5px;float: right">

            <aside id="result" style="min-height: 123px;padding: 0px 10px">
                <p style="font-size: 19pt;margin-bottom: 30px">MON PANIER</p>
                <div id="loading" style="display: block;position:absolute;left: 40%;top: -5% ">
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
                <p id="non-painer"></p>
                <ul class="result_price_list">
                </ul>
            </aside>
            <aside id="panier_inro" >
                <div class="row" style="margin: 0px">
                    <span style="float:left;margin-right: 70px">Nombre de projduts</span> <span id="product-total-count" >0</span> <br>

                </div>
                <div class="row" style="margin: 0px">
                    <span style="float: left;margin-right: 85px">Nombre de piece</span> <span id="product-total-piece" >0</span>

                </div>
            </aside>
            <aside style="color: white;padding: 0px 10px;margin-top: 10px">
                <span style="margin-right:150px;float:left;">Total</span>
                <span id="total_price">0€</span>
                <button  id="btn_panier" onclick="window.location='/panier'">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    VOIR MON PANIER
                </button>
            </aside>
        </div>
    </div>
    @include('app.modal')
    @include('app.autre_modal')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.16/vue.js"></script>
    <script src="/js/cart.js"></script>
    <script>
        getCart();
        $('.button-ajouter').click(function () {
            productId=$(this).data('productid');
        });
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

        $(document).ajaxStart(function(){
            $('#loading').show();
        }).ajaxStop(function () {
            $('#loading').hide();

        });

    </script>
@endsection