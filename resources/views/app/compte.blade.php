@extends('app.app_template')
@section('content')
    <style>
        .label{
            color: #BAAA76;
            font-size: 20px;
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
                    <p>{{Auth::user()->prenom}} {{Auth::user()->nom}}</p>
                    <p>{{Auth::user()->email}}</p>
                </section>
                <section>
                    <form action="{{url('/saveInfo')}}" method="post">
                        {{csrf_field()}}
                    <h3>MES ADDRESS</h3>
                        <div class="form-group">
                            <label for="">Nom de societe</label>
                            <input type="text" name="societe" value="{{Auth::user()->societe}}">
                        </div>
                        <div class="form-group">
                            <label for="">Telephone</label>
                            <input type="text" name="tel" required value="{{Auth::user()->tel}}">
                        </div>
                        
                    <input id="autocomplete" placeholder="Enter your address" onFocus="geolocate()" type="text" style="width: 300px" name="address" required value="{{Auth::user()->address}}">
                    <table id="address" >
                        <tr>
                            <td class="label">Street address</td>
                            <td class="slimField">
                                <input class="field" id="street_number" disabled="true">
                            </td>
                            <td class="wideField" colspan="2">
                                <input class="field" id="route" disabled="true">
                            </td>
                        </tr>
                        <tr>
                            <td class="label">City</td>
                            <td class="wideField" colspan="3">
                                <input class="field" id="locality" disabled="true">
                            </td>
                        </tr>
                        <tr>
                            <td class="label">State</td>
                            <td class="slimField"><input class="field" id="administrative_area_level_1" disabled="true">
                            </td>
                        </tr>
                        <tr>
                            <td class="label">Country</td>
                            <td class="wideField" colspan="3">
                                <input class="field" id="country" disabled="true"></input>
                            </td>
                        </tr>
                        <tr>
                            <td class="label">Zip code</td>
                            <td class="wideField">
                                <input class="field" id="postal_code" disabled="true" name="post"></input>
                            </td>
                        </tr>
                    </table>
                        <div class="form-group">
                            <label for="">Intitulé de l'adresse *</label>
                            <input type="text" name="lib_address" required value="{{Auth::user()->lib_address}}">
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