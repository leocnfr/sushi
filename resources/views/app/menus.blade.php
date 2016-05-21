@extends('app.app_template')
@section('content')
    <style>
        #sidebar
        {
            width: 142px;
            height: 445px;
            background: black;
            color: #BAAA76;
            padding-top: 54px;
            padding-left: 10px;
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
            background: grey;
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
    </style>
    <div class="container-fluid " style="padding:0 ">
        <ul id="sidebar" class="col-md-2">
            <li class="item list-unstyled">
                <p>MENU LUNCH</p>
                <img src="{{URL::asset('images/menu-saumon-xl.png')}}" alt="" style="width: 142px;height: 23px">
            </li>
            <li class="item list-unstyled">
                <p>MENU LUNCH</p>
                <img src="{{URL::asset('images/menu-saumon-xl.png')}}" alt="" style="height: 142px;height: 23px">
            </li>
            <li class="item list-unstyled">
                <p>MENU LUNCH</p>
                <img src="{{URL::asset('images/menu-saumon-xl.png')}}" alt="" style="height: 142px;height: 23px">
            </li>
            <li class="item list-unstyled">
                <p>MENU LUNCH</p>
                <img src="{{URL::asset('images/menu-saumon-xl.png')}}" alt="" style="height: 142px;height: 23px">
            </li>
            <li class="item list-unstyled">
                <p>MENU LUNCH</p>
                <img src="{{URL::asset('images/menu-saumon-xl.png')}}" alt="" style="height: 142px;height: 23px">
            </li>
            <li class="item list-unstyled">
                <p>MENU LUNCH</p>
                <img src="{{URL::asset('images/menu-saumon-xl.png')}}" alt="" style="height: 142px;height: 23px">
            </li>
            <li class="item list-unstyled">
                <p>MENU LUNCH</p>
                <img src="{{URL::asset('images/menu-saumon-xl.png')}}" alt="" style="height: 142px;height: 23px">
            </li>
        </ul>
        <div id="content" class="col-md-8" style="background: rgba(0,0,0,0.2);width: 788px">

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
        <div class="col-md-2" style="background: rgba(0,0,0,0.2);margin-left: 18px;text-align: center;color: #BAAA76;width: 223px">
            <p>MON PANIER</p>
            <p>Votre panier est vide</p>
        </div>
    </div>
@endsection