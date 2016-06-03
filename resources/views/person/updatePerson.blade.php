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
                                        <td>{{ $address['address_type'] -> type_name}}</td>
                                        <td>{{ $address['country'] }}</td>
                                        <td>{{ $address['county'] }}</td>
                                        <td>{{ $address['town_village'] }}</td>
                                        <td>{{ $address['street_address'] }}</td>
                                        <td>{{ $address['zipcode'] }}</td>
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
            <div id="address{{$address->address}}" style="display: none" class="addressForm">
                <form action="/address/{{$address->address}}/update" method="post">
                    riik:<input value="{{ $address['country'] }}" type="text" name="country"><br>
                    maakond:<input value="{{ $address['county'] }}" type="text" name="county"><br>
                    linn:<input value="{{ $address['town_village'] }}" type="text" name="town_village"><br>
                    aadress:<input value="{{ $address['street_address'] }}" type="text" name="street_address"><br>
                    postiindeks:<input value="{{ $address['zipcode'] }}" type="text" name="zipcode"><br>
                    <input type="submit" value="Submit">
                </form>
            </div>
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
    </script>
</html>
