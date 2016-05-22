@extends('app.app_template')
@section('content')
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators" style="right: 40px">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="{{URL::asset('images/show1.jpg')}}" alt="...">
                <div class="carousel-caption">
                </div>
                
            </div>
            <div class="item">
                <img src="{{URL::asset('images/show1.jpg')}}" alt="...">
                <div class="carousel-caption">
                </div>
            </div>

        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        <div  id="commandBtn"></div>
        <div id="line">
        </div>
        <div id="livraison">
            <div style="left: 190px;float:left;" class="livraison-icon">
                <i class="fa fa-home" aria-hidden="true"></i> LIVRAISON A DOMICILE
            </div>
            <div style="right: 118px;float: right;" class="livraison-icon">
                <i class="fa fa-map-marker" aria-hidden="true"></i>LIVRAISON A POINT RELAIS
            </div>
        </div>
    </div>


@endsection