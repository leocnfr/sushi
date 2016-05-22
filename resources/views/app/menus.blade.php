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
            margin: 0px auto;
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
            margin: 0pt auto;
            background: #BAAA76;
            color: black;
            border: 0pt;
            box-shadow: none;
            border-radius: 5px
        }
        #btn_panier:focus
        {
            outline: none;
        }
    </style>
    <div class="container-fluid " style="padding:0;background: black ">
        <ul id="sidebar" class="col-md-2">
            <li class="sidebar-item list-unstyled">
                <p>MENU LUNCH</p>
                <img src="{{URL::asset('images/menu-saumon-xl.png')}}" alt="" style="width: 119px;height: 68px">
            </li>
            <li class="sidebar-item list-unstyled">
                <p>MENU LUNCH</p>
                <img src="{{URL::asset('images/menu-saumon-xl.png')}}" alt="" style="width: 119px;height: 68px">
            </li>
            <li class="sidebar-item list-unstyled">
                <p>MENU LUNCH</p>
                <img src="{{URL::asset('images/menu-saumon-xl.png')}}" alt="" style="width: 119px;height: 68px">
            </li>
            <li class="sidebar-item list-unstyled">
                <p>MENU LUNCH</p>
                <img src="{{URL::asset('images/menu-saumon-xl.png')}}" alt="" style="width: 119px;height: 68px">
            </li>
            <li class="sidebar-item list-unstyled">
                <p>MENU LUNCH</p>
                <img src="{{URL::asset('images/menu-saumon-xl.png')}}" alt="" style="width: 119px;height: 68px">
            </li>
            <li class="sidebar-item list-unstyled">
                <p>MENU LUNCH</p>
                <img src="{{URL::asset('images/menu-saumon-xl.png')}}" alt="" style="width: 119px;height: 68px">
            </li>
            <li class="sidebar-item list-unstyled">
                <p>MENU LUNCH</p>
                <img src="{{URL::asset('images/menu-saumon-xl.png')}}" alt="" style="width: 119px;height: 68px">
            </li>
        </ul>
        <div id="content" class="col-md-8" style="background: rgba(94,93,91,0.4);width: 788px">

            <div class="col-md-4 item">
                <img src="{{URL::asset('images/menu-saumon-xl.png')}}" alt="" style="width: 152px;height: 117px;">
                  <p>MENU LUNCH A</p>
                    <span>12 piece</span>
                    <span class="pull-right">15.90€</span>
                    <button class="button-ajouter">AJOUTER<span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
            </div>
            <div class="col-md-4 item">
                <img src="{{URL::asset('images/menu-saumon-xl.png')}}" alt="" style="width: 152px;height: 117px;">
                <p>MENU LUNCH A</p>
                <span>12 piece</span>
                <span class="pull-right">15.90€</span>
                <button class="button-ajouter">AJOUTER<span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
            </div>
            <div class="col-md-4 item">
                <img src="{{URL::asset('images/menu-saumon-xl.png')}}" alt="" style="width: 152px;height: 117px;">
                <p>MENU LUNCH A</p>
                <span>12 piece</span>
                <span class="pull-right">15.90€</span>
                <button class="button-ajouter">AJOUTER<span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
            </div>
        </div>
        <div class="col-md-2" style="background: rgba(94,93,91,0.4);margin-left: 18px;text-align: center;color: #BAAA76;width: 250px;padding: 0px">
            <aside>
                <p style="font-size: 19pt;font-weight: bold">MON PANIER</p>
                <span style="font-size: 12pt">MENU BOTAN</span>
                <div style="display: inline-block;background: black;padding: 0px 1px">
                    <i class="fa fa-minus" aria-hidden="true"></i>
                    <input type="number" style="width: 15px;height: 15px" min="1" value="1">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                </div>
                <span style="font-size: 16pt">15.90€</span>
            </aside>
            <aside style="text-align: justify">
                <span style="font-size: 11pt;position:relative;">Nombre de projduts</span> <span style="font-size: 13pt">1</span> <br>
                <span style="font-size: 11pt">Nombre de piece</span> <span style="font-size: 13pt">24</span>
            </aside>
            <aside style="color: white">
                <span>Total</span>
                <span>14.90€</span>
                <button  id="btn_panier">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    VOIR MON PANIER
                </button>
            </aside>
        </div>
    </div>
@endsection