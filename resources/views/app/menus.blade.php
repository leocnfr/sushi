@extends('app.app_template')
@section('content')
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
        #content
        {
            color: #BAAA76;
        }
        .button-ajouter
        {
            background: #5E5D5B;
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
            border-left: 1px solid #BAAA76;
            border-right: 1px solid #BAAA76;
        }
        .sidebar-item
        {
            margin-top: 54px;
            text-align: center;
            cursor: pointer;
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
    </style>
    <div class="container-fluid " style="padding:0;background: black ">
        <ul id="sidebar" class="col-md-2">
            @foreach($products as $key=>$product)
                <li class="sidebar-item list-unstyled">
                    <p>{{$product->category->cat_name}}</p>
                    <img src="{{URL::asset('/storage/uploads/'.$product->productImage)}}" alt="{{$product->category->cat_name}}" style="width: 119px;height: 68px">
                </li>
            @endforeach
                <div id="triangle-left"></div>

        </ul>

        <div id="content" class="col-md-8" style="background: rgba(94,93,91,0.4);width: 788px">
            @foreach($product_menu->chunk(3)  as $chunk)
                <div class="row">
                    @foreach($chunk as $item)
                    <div class="col-md-4 item" >
                        <img src="{{URL::asset('/storage/uploads/'.$item->productImage)}}" alt="" style="width: 152px;height: 117px;">
                        <p>{{$item->name}}</p>
                        <span>{{$item->count}} piece</span>
                        <span class="pull-right">{{$item->price}}€</span>
                        <button class="button-ajouter">AJOUTER<i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                    </div>
                    @endforeach
                        <hr>
                </div>

            @endforeach
        </div>
        <div class="col-md-2" style="background: rgba(94,93,91,0.4);margin-left: 18px;text-align: center;color: #BAAA76;width: 250px;padding: 0px">
            <aside style="height: 123px">
                <p style="font-size: 19pt;font-weight: bold;margin-bottom: 30px">MON PANIER</p>
                <span style="font-size: 12pt">MENU BOTAN</span>
                <div style="display: inline-block;background: black;padding: 0px 1px">
                    <i class="fa fa-minus" aria-hidden="true"></i>
                    <input type="number" style="width: 15px;height: 15px" min="1" value="1">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                </div>
                <span style="font-size: 16pt">15.90€</span>
            </aside>
            <aside id="panier_inro">
                <span style="margin-right: 70px">Nombre de projduts</span> <span >1</span> <br>
                <span style="margin-right: 80px">Nombre de piece</span> <span >24</span>
            </aside>
            <aside style="color: white;padding-bottom: 38px;margin-top: 10px">
                <span style="margin-right:120px">Total</span>
                <span>14.90€</span>
                <button  id="btn_panier">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    VOIR MON PANIER
                </button>
            </aside>
        </div>
    </div>
@endsection