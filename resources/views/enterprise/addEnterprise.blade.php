<!DOCTYPE html>
<html>
<head>
    <title>Laravel</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

</head>
<body>
    <div class="container">
        <div class="content">
            <form class="" action="/enterprise" method="post">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Name" name="name" value="{{old('name')}}">
                    {{$errors->first('name')}}
                </div>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Full Name" name="full_name" value="{{old('full_name')}}">
                    {{$errors->first('full_name')}}
                </div>

                <div class="input-group">
                    riik:<input value="{{old('country')}}" type="text" name="country">
                    {{$errors->first('country')}}<br>
                </div>
                <div class="input-group">
                    maakond:<input value="{{old('county')}}" type="text" name="county">
                    {{$errors->first('county')}}<br>
                </div>
                <div class="input-group">
                    linn:<input value="{{old('town_village')}}" type="text" name="town_village">
                    {{$errors->first('town_village')}}<br>
                </div>
                <div class="input-group">
                    aadress:<input value="{{old('street_address')}}" type="text" name="street_address">
                    {{$errors->first('street_address')}}<br>
                </div>
                <div class="input-group">
                    postiindeks:<input value="{{old('zipcode')}}" type="text" name="zipcode">
                    {{$errors->first('zipcode')}}
                </div>
                
                <div class="input-group">
                    <input type="submit" name="submit" value="Submit">
                </div>
            </form>
        </div>
    </div>
</body>
</html>
