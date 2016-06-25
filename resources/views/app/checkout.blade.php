@extends('app.app_template')
@section('content')
    <style>
        #content{
            min-height: 85vh;
            background: #111111;
        }
        #main{
            width: 80vw;
            margin: 0 auto;
            padding-top: 9vh;
        }
        #main > p {
            font-size: 2.5rem;
            color: #BAAA76;
        }
        #checkout{
            width: 40vw;
            float: left;

        }
        #checkout,#livraison-info > p {
            font-size: 2rem;
            color: #BAAA76;

        }
        #livraison-info
        {
            width: 30vw;
            float: right;
        }
        #livraison-info > section
        {
            background: rgba(37,37,36,0.6);
            font-size: 1.5rem;
            padding: 1vw;
            color: #BAAA76;
        }
        #livraison-info > section >p:nth-of-type(2)
        {
            font-style: italic;
        }
        #menu-info
        {
            background: rgba(37,37,36,0.6);
            font-size: 1.5rem;
            color: #BAAA76;
            height: 40vmin;
        }
    </style>
<div id="content">
    <div id="main">
        <p>VALIDATION ET PAIEMENT</p>
        <div id="checkout">
            <p>RECAPITULATIF DE VOTRE COMMANDE ET PAIEMENT</p>
            <div id="menu-info">

            </div>
        </div>
        <div id="livraison-info">
            <p>LIVRAISON</p>
            <section>
                <p>User Name</p>
                <p>Vous devrez vous deplacer dans le point relais ci-dessous pour retirer votre commande</p>
                <p>Horaire:</p>
                <p>{{date('Y-m-d')}}</p>
                <p>Boutique</p>
            </section>
        </div>
    </div>
</div>
@endsection