@extends('app.app_template')
@section('content')
    <style>
        #content{
            min-height: 85vh;
            background: #111111;
        }
        #main{
            width: 80vw;
            height:80vh;
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
        #btn-submit{
            display: block;
            width: 80px;
            background: #BAAA76;
            color: black;
            border: 0pt;
            box-shadow: none;
            border-radius: 5px;
        }
    </style>
<div id="content">
    <div id="main">
        <p>VALIDATION ET PAIEMENT</p>
        <div id="checkout">
            <p>RECAPITULATIF DE VOTRE COMMANDE ET PAIEMENT</p>
            <div id="menu-info">
                <ol>
                    @foreach($orders as $order)
                        <li>
                            {{$order->name}}
                            {{$order->total}}
                        </li>
                    @endforeach
                </ol>
            </div>
            <button id="btn-submit" class="btn" style="margin-top: 30px;display: block" >VALIDER</button>

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
    <script src="http://parsleyjs.org/dist/parsley.js"></script>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script>
        // This identifies your website in the createToken call below
        Stripe.setPublishableKey('{!! env('STRIPE_PK') !!}');

        jQuery(function($) {
            $('#payment-form').submit(function(event) {
                var $form = $(this);

                // Before passing data to Stripe, trigger Parsley Client side validation
                $form.parsley().subscribe('parsley:form:validate', function(formInstance) {
                    formInstance.submitEvent.preventDefault();
                    return false;
                });

                // Disable the submit button to prevent repeated clicks
                $form.find('#submitBtn').prop('disabled', true);

                Stripe.card.createToken($form, stripeResponseHandler);

                // Prevent the form from submitting with the default action
                return false;
            });
        });

        function stripeResponseHandler(status, response) {
            var $form = $('#payment-form');

            if (response.error) {
                // Show the errors on the form
                $form.find('.payment-errors').text(response.error.message);
                $form.find('.payment-errors').addClass('alert alert-danger');
                $form.find('#submitBtn').prop('disabled', false);
                $('#submitBtn').button('reset');
            } else {
                // response contains id and card, which contains additional card details
                var token = response.id;
                console.log(token);
                // Insert the token into the form so it gets submitted to the server
                $form.append($('<input type="hidden" name="stripeToken" />').val(token));
                // and submit
                $form.get(0).submit();
            }
        };
    </script>
@endsection