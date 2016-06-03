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
                                        <td><a id="nupp{{$address->address}}" nr=href="#" onClick="funkts({{$address->address}})">EDIT</a></td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    <input type="submit" value="Submit">
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

    </body>
    <script>
        function funkts(id){
            $(".addressForm").hide();

            

            $( "#address" + id ).show();
        }

        function updateAddress(id) {
            var url = "/address/" + id + "/update"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                data: $("#address" + id).serialize(), // serializes the form's elements.
                success: function(data) {
                    $(".addressForm").hide();
                    console.log(data.country);
                    console.log(id);
                    $("#1address_type" + id).html(data.address_type);
                    $("#1country" + id).html(data.country);
                    $("#1county" + id).html(data.county);
                    $("#1town_village" + id).html(data.town_village);
                    $("#1street_address" + id).html(data.street_address);
                    $("#1zipcode" + id).html(data.zipcode);
                    
                    

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
