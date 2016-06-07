<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="">       
                    
                   
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
                    põhiaadress:<input type="checkbox" id="address_type{{$address['address']}}" name="address_type" @if ($address['address_type'] -> address_type === 1 || $address['address_type'] -> address_type === 3)hidden checked @endif > <span id="mainAddressBool{{$address['address']}}">@if ($address['address_type'] -> address_type === 1 || $address['address_type'] -> address_type === 3)TRUE @endif</span><br>
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
                    riik:<input value="{{old('country')}}" type="text" name="country">{{$errors->first('country')}}<span class="jsonErrorUUS" id="riikUUS"></span><br>
                    maakond:<input value="{{old('county')}}" type="text" name="county">{{$errors->first('county')}}<span class="jsonErrorUUS" id="maakondUUS"></span><br>
                    linn:<input value="{{old('town_village')}}" type="text" name="town_village">{{$errors->first('town_village')}}<span class="jsonErrorUUS" id="linnUUS"></span><br>
                    aadress:<input value="{{old('street_address')}}" type="text" name="street_address">{{$errors->first('street_address')}}<span class="jsonErrorUUS" id="aadressUUS"></span><br>
                    postiindeks:<input value="{{old('zipcode')}}" type="text" name="zipcode">{{$errors->first('zipcode')}}<span class="jsonErrorUUS" id="postiindeksUUS"></span><br>
                    <input type="submit" value="Submit">
                </form>
                </div>
            </div>
        </div>
    </body>

    <script>
        function funkts(id){
            $(".addressForm").hide();

            

            $( "#address" + id ).show();
        }
        
        function addNewAddress(){
            $("#riikUUS").html("");
            $("#maakondUUS").html("");
            $("#linnUUS").html("");
            $("#aadressUUS").html("");
            $("#postiindeksUUS").html("");
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
                    $("#riikUUS").html(errors.country);
                    $("#maakondUUS").html(errors.county);
                    $("#linnUUS").html(errors.town_village);
                    $("#aadressUUS").html(errors.street_address);
                    $("#postiindeksUUS").html(errors.zipcode);
                    $(".jsonErrorUUS").show();
                    
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
