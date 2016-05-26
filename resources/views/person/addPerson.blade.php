<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    </head>
    <body>
        <div class="container">
            <div class="content">
                <form class="" action="create" method="post">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    first name: <input value="{{old('first_name')}}" type="text" name="first_name">{{$errors->first('first_name')}}<br>
                    last name: <input value="{{old('last_name')}}" type="text" name="last_name">{{$errors->first('last_name')}}<br>
                    identity_code: <input value="{{old('identity_code')}}" type="text" name="identity_code">{{$errors->first('identity_code')}}<br>
                    birth_date: <input value="{{old('birth_date')}}" type="date" name="birth_date">{{$errors->first('birth_date')}}<br>
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
