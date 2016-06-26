@extends('app.app_template')
@section('content')
    <style>
        .label{
            color: #BAAA76;
            font-size: 14px;
            width: 100px;
        height: 40px !important;
        }

    </style>
    <div class="container-fluid" style="min-height: 600px;background: black;color: #BAAA76">
        <div id="content" style="width: 1000px;margin: 0px auto">
            <div id="infor" style="width: 25%;float:left;">
                <h3>MON COMPTE</h3>

            </div>
            <div style="width: 70%;float:left;">
                <section>
                    <h3>MES INFORMATIONS PERSONNELLES</h3>
                    <p>Prénom / Nom: <span style="margin-left: 20px;">{{Auth::user()->prenom}} {{Auth::user()->nom}}</span></p>
                    <p>E-mail: <span style="margin-left: 20px;">{{Auth::user()->email}}</span></p>
                </section>
                <section>
                    <form action="{{url('/saveInfo')}}" method="post">
                        {{csrf_field()}}
                    <div style="width: 500px; border-top:thin solid #baaa76; "><h3>Mon Adresse</h3></div>
                        <div class="form-group" style="width: 467px;">
                            <label for="">Nom de société</label>
                            <input class="pull-right" type="text" name="societe" value="{{Auth::user()->societe}}">
                        </div>
                        <div class="form-group" style="width: 467px;">
                            <label for="">Téléphone</label>
                            <input class="pull-right" type="text" name="tel" required value="{{Auth::user()->tel}}">
                        </div>
                        <div class="form-group" style="width: 467px;">
                            <label for="">Adresse</label>
                            <input id="autocomplete" class="pull-right" placeholder="Enter your address" onFocus="geolocate()" type="text" style="width: 300px" name="address" required value="{{Auth::user()->address}}">
                        </div>

                    <div style="padding: 15px; background-color: #292929; width: 500px; border-radius: 8px;">
                        <table id="address" style="width: 450px; height:200px;">
                        <tr>
                            <td class="label">Adresse</td>
                            <td class="slimField">
                                <input class="pull-right" class="field" id="street_number" disabled="true" style="width: 30px">
                            </td>

                            <td class="wideField" colspan="3">
                                 <input class="field pull-right" id="route" disabled="true" >
                            </td>
                        </tr>
                        <tr>
                            <td class="label">Ville</td>
                            <td class="wideField" colspan="3">
                                <input class="pull-right" class="field" id="locality" disabled="true">
                            </td>
                        </tr>
                        <tr>
                            <td  class="label">Province</td>
                            <td class="slimField" colspan="3">
                                <input  class="pull-right" class="field" id="administrative_area_level_1" disabled="true">
                            </td>
                        </tr>
                        <tr>
                            <td class="label">Pays</td>
                            <td class="wideField" colspan="3">
                                <input class="field pull-right"  class="pull-right id="country" disabled="true"></input>
                            </td>
                        </tr>
                        <tr>
                            <td class="label">Code postal</td>
                            <td class="wideField" colspan="3">
                                <input class="field pull-right"  id="postal_code" disabled="true" name="post"></input>
                            </td>
                        </tr>
                    </table>
                    </div>
                        <div class="form-group" style="width: 467px;">
                            <label for="">Intitulé de l'adresse *</label>
                            <input type="text" name="lib_address" class="pull-right" required value="{{Auth::user()->lib_address}}">
                        </div>
                        <button type="submit">ENREGISTRER</button>

                    </form>
                </section>
            </div>
        </div>

    </div>
    <script>
            var placeSearch, autocomplete;
            var componentForm = {
                street_number: 'short_name',
                route: 'long_name',
                locality: 'long_name',
                administrative_area_level_1: 'short_name',
                country: 'long_name',
                postal_code: 'short_name'
            };

            function initAutocomplete() {
                // Create the autocomplete object, restricting the search to geographical
                // location types.
                autocomplete = new google.maps.places.Autocomplete(
                        /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
                        {types: ['geocode']});

                // When the user selects an address from the dropdown, populate the address
                // fields in the form.
                autocomplete.addListener('place_changed', fillInAddress);
            }

            // [START region_fillform]
            function fillInAddress() {
                // Get the place details from the autocomplete object.
                var place = autocomplete.getPlace();

                for (var component in componentForm) {
                    document.getElementById(component).value = '';
                    document.getElementById(component).disabled = false;
                }

                // Get each component of the address from the place details
                // and fill the corresponding field on the form.
                for (var i = 0; i < place.address_components.length; i++) {
                    var addressType = place.address_components[i].types[0];
                    if (componentForm[addressType]) {
                        var val = place.address_components[i][componentForm[addressType]];
                        document.getElementById(addressType).value = val;
                    }
                }
            }
            // [END region_fillform]

            // [START region_geolocation]
            // Bias the autocomplete object to the user's geographical location,
            // as supplied by the browser's 'navigator.geolocation' object.
            function geolocate() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function(position) {
                        var geolocation = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude
                        };
                        var circle = new google.maps.Circle({
                            center: geolocation,
                            radius: position.coords.accuracy
                        });
                        autocomplete.setBounds(circle.getBounds());
                    });
                }
            }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCIbJ48RCsE-UPzW9y-3hmxWpNVKm6tYho&language=fr&libraries=places&callback=initAutocomplete" type="text/javascript"></script>

@endsection