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
                <ol>
                    @foreach($orders as $order)
                        <li>
                            {{$order->name}}
                            {{$order->total}}
                        </li>
                    @endforeach
                </ol>
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
    {!! Form::open(['url' => '/payment', 'data-parsley-validate', 'id' => 'payment-form']) !!}
    <div class="form-group" id="cc-group">
        {!! Form::label(null, 'Credit card number:') !!}
        {!! Form::text(null, null, [
            'class'                         => 'form-control',
            'required'                      => 'required',
            'data-stripe'                   => 'number',
            'data-parsley-type'             => 'number',
            'maxlength'                     => '16',
            'data-parsley-trigger'          => 'change focusout',
            'data-parsley-class-handler'    => '#cc-group'
            ]) !!}
    </div>

    <div class="form-group" id="ccv-group">
        {!! Form::label(null, 'Card Validation Code (3 or 4 digit number):') !!}
        {!! Form::text(null, null, [
            'class'                         => 'form-control',
            'required'                      => 'required',
            'data-stripe'                   => 'cvc',
            'data-parsley-type'             => 'number',
            'data-parsley-trigger'          => 'change focusout',
            'maxlength'                     => '4',
            'data-parsley-class-handler'    => '#ccv-group'
            ]) !!}
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="form-group" id="exp-m-group">
                {!! Form::label(null, 'Ex. Month') !!}
                {!! Form::selectMonth(null, null, [
                    'class'                 => 'form-control',
                    'required'              => 'required',
                    'data-stripe'           => 'exp-month'
                ], '%m') !!}
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group" id="exp-y-group">
                {!! Form::label(null, 'Ex. Year') !!}
                {!! Form::selectYear(null, date('Y'), date('Y') + 10, null, [
                    'class'             => 'form-control',
                    'required'          => 'required',
                    'data-stripe'       => 'exp-year'
                    ]) !!}
            </div>
        </div>
    </div>

    <div class="form-group">
        {!! Form::submit('Place order!', ['class' => 'btn btn-primary btn-order', 'id' => 'submitBtn', 'style' => 'margin-bottom: 10px;']) !!}
    </div>

    <div class="row">
        <div class="col-md-12">
            <span class="payment-errors" style="color: red;margin-top:10px;"></span>
        </div>
    </div>

    {!! Form::close() !!}
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