<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <style>
        td:empty {
            visibility: hidden;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <form class="" method="post">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <table>
                        <tr>
                            <th>first name:</th>
                            <td><input value="{{old('first_name') ? old('first_name'):$person['first_name']}}" type="text" name="first_name"></td>
                            <td>{{$errors->first('first_name')}}</td>
                        </tr>
                        <tr>
                            <th>last name:</th>
                            <td><input value="{{old('last_name') ? old('last_name'):$person['last_name']}}" type="text" name="last_name"></td>
                            <td>{{$errors->first('last_name')}}</td>
                        </tr>
                        <tr>
                            <th>identity_code:</th>
                            <td><input value="{{old('identity_code') ? old('identity_code'):$person['identity_code']}}" type="text" name="identity_code"></td>
                            <td>{{$errors->first('identity_code')}}</td>
                        </tr>
                        <tr>
                            <th>birth_date:</th>
                            <td><input value="{{old('birth_date') ? old('birth_date'):$person['birth_date']}}" type="date" name="birth_date"></td>
                            <td>{{$errors->first('birth_date')}}</td>
                        </tr>
                    </table>
                    <input type="submit" value="Submit">

                    <br><br><br><br>
                    Addresses:
                        <div>
                            <table border="1">
                                <th>Address type</th>
                                <th>Country</th>
                                <th>County</th>
                                <th>Town/Village</th>
                                <th>Street Address</th>
                                <th>Zipcode</th>
                                <th>Update</th>
                                @foreach ($addresses->get() as $address)
                                    <tr>
                                        <td id="1address_type{{$address->address}}">{{ $address['address_type'] -> type_name}}</td>
                                        <td id="1country{{$address->address}}">{{ $address['country'] }}</td>
                                        <td id="1county{{$address->address}}">{{ $address['county'] }}</td>
                                        <td id="1town_village{{$address->address}}">{{ $address['town_village'] }}</td>
                                        <td id="1street_address{{$address->address}}">{{ $address['street_address'] }}</td>
                                        <td id="1zipcode{{$address->address}}">{{ $address['zipcode'] }}</td>
                                        <td><a id="nupp{{$address->address}}" href="#" onClick="funkts({{$address->address}})">EDIT</a></td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    
                </form>
            </div>
        </div>


        @foreach ($addresses->get() as $address)

                <form id="address{{$address->address}}" action="/address/{{$address->address}}/update" method="post" style="display: none" class="addressForm">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    riik:<input value="{{ $address['country'] }}" type="text" name="country"><span class="jsonError" style="display: none" id="riik{{$address->address}}"></span><br>
                    maakond:<input value="{{ $address['county'] }}" type="text" name="county"><span class="jsonError" style="display: none" id="maakond{{$address->address}}"></span><br>
                    linn:<input value="{{ $address['town_village'] }}" type="text" name="town_village"><span class="jsonError" style="display: none" id="linn{{$address->address}}"></span><br>
                    aadress:<input value="{{ $address['street_address'] }}" type="text" name="street_address"><span class="jsonError" style="display: none" id="aadress{{$address->address}}"></span><br>
                    postiindeks:<input value="{{ $address['zipcode'] }}" type="text" name="zipcode"><span class="jsonError" style="display: none" id="postiindeks{{$address->address}}"></span><br>
                    põhiaadress:<input type="checkbox" id="address_type{{$address['address']}}" name="address_type" @if ($address['address_type'] -> address_type === 1)hidden checked @endif > <span id="mainAddressBool{{$address['address']}}">@if ($address['address_type'] -> address_type === 1)TRUE @endif</span><br>
                    <input type="submit" value="Submit">
                </form>

        @endforeach

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

                <br><br><br>Add New Address: <br>
                <form id="AddNewAddressForm" action="/address/create" method="post">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <input type="hidden" name="subject_fk" value="{{$person['person']}}">
                    <input type="hidden" name="subject_type_fk" value="1">
                    riik:<input value="{{old('country')}}" type="text" name="country">{{$errors->first('country')}}<br>
                    maakond:<input value="{{old('county')}}" type="text" name="county">{{$errors->first('county')}}<br>
                    linn:<input value="{{old('town_village')}}" type="text" name="town_village">{{$errors->first('town_village')}}<br>
                    aadress:<input value="{{old('street_address')}}" type="text" name="street_address">{{$errors->first('street_address')}}<br>
                    postiindeks:<input value="{{old('zipcode')}}" type="text" name="zipcode">{{$errors->first('zipcode')}}<br>
                    <input type="submit" value="Submit">
                </form>
    </body>
    <script>
        function funkts(id){
            $(".addressForm").hide();

            

            $( "#address" + id ).show();
        }
        
        function addNewAddress(){
            var url = "/address/create"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                //data: $("#address" + id).serialize(), // serializes the form's elements.
                data: $("#AddNewAddressForm").serialize(), // serializes the form's elements.
                success: function(data) {
                    window.location.reload();
                },
                error: function(data) {
                    var errors = data.responseJSON;
                    console.log(errors);
                    
                }
            });
        }

        function updateAddress(id) {
            var url = "/address/" + id + "/update"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                data: $("#address" + id).serialize(), // serializes the form's elements.
                success: function(data) {
                            console.log(data.country);
                            console.log(id);
                            console.log("address_type " + data.address_type_fk);
                            console.log(data);
                    $(".addressForm").hide();
                    $("#1address_type" + id).html(data.address_type.type_name);
                    $("#1country" + id).html(data.country);
                    $("#1county" + id).html(data.county);
                    $("#1town_village" + id).html(data.town_village);
                    $("#1street_address" + id).html(data.street_address);
                    $("#1zipcode" + id).html(data.zipcode);
                    
                    if($("#address_type" + id).prop( "checked", true ) && $("#mainAddressBool"+id).is(':empty')){
                        console.log("KLJAJNAJADJK");
                        if(data.address_type_fk == 1 || data.address_type_fk == 3){
                            $("#address_type" + id).prop( "checked", true );
                            $("#address_type" + id).prop( "hidden", true );
                            $(".addressForm").html('');
                            window.location.reload();
                        }else{
                            $("#address_type" + id).prop( "checked", false );
                            $("#address_type" + id).prop( "hidden", false );
                        }
                    }
                    
                    if(data.address_type_fk == 2){
                        $("#address_type" + id).prop( "checked", false );
                    }
                },
                error: function(data) {
                    var errors = data.responseJSON;
                    $("#riik" + id).html(errors.country);
                    $("#maakond" + id).html(errors.county);
                    $("#linn" + id).html(errors.town_village);
                    $("#aadress" + id).html(errors.street_address);
                    $("#postiindeks" + id).html(errors.zipcode);
                    $(".jsonError").show();
                }
            });
        }
        
        $("#AddNewAddressForm").submit(function(e) {
            e.preventDefault();
            addNewAddress();
        });

        $(".addressForm").submit(function(e) {
            e.preventDefault();
            $(".jsonError").hide();
            $(".jsonError").html("");
            var id = $(this).attr('id');
            var id2 = id.replace(/\D/g,'');
            updateAddress(id2);
        });



    </script>
</html>
