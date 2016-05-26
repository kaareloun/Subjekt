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
                    -----<br>
                    riik:<input value="{{old('country')}}" type="text" name="country">{{$errors->first('country')}}<br>
                    maakond:<input value="{{old('county')}}" type="text" name="county">{{$errors->first('county')}}<br>
                    linn:<input value="{{old('town_village')}}" type="text" name="town_village">{{$errors->first('town_village')}}<br>
                    aadress:<input value="{{old('street_address')}}" type="text" name="street_address">{{$errors->first('street_address')}}<br>
                    postiindeks:<input value="{{old('zipcode')}}" type="text" name="zipcode">{{$errors->first('zipcode')}}<br>
                    -----<br>
                    Subjekt tüüp:<br>
                    <input type="submit" value="Submit">
                </form>
            </div>
        </div>
        
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
</html>
