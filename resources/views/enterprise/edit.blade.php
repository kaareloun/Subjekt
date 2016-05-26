<!DOCTYPE html>
<html>
<head>
    <title>Laravel</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

</head>
<body>
    <div class="container">
        <div class="content">
            <form class="" action="/enterprise/{{$enterprise->enterprise}}" method="POST">
                <input type="hidden" name="_method" value="PUT" />
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Name" name="name"
                        value="{{ (old('name')) ? old('name') : $enterprise->name }}">
                    {{$errors->first('name')}}
                </div>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Full Name" name="full_name"
                        value="{{ (old('full_name')) ? old('full_name') : $enterprise->full_name }}">
                    {{$errors->first('full_name')}}
                </div>

                @foreach($enterprise->addresses() as $address)
                    <div class="input-group">
                        riik:<input value="{{ (old('country')) ? old('country') : $address->country }}" type="text" name="country">
                        {{$errors->first('country')}}
                    </div>
                    <div class="input-group">
                        maakond:<input value="{{ (old('county')) ? old('county') : $address->county }}" type="text" name="county">
                        {{$errors->first('county')}}
                    </div>
                    <div class="input-group">
                        linn:<input value="{{ (old('town_village')) ? old('town_village') : $address->town_village }}" type="text" name="town_village">
                        {{$errors->first('town_village')}}
                    </div>
                    <div class="input-group">
                        aadress:<input value="{{ (old('street_address')) ? old('street_address') : $address->street_address }}" type="text" name="street_address">
                        {{$errors->first('street_address')}}
                    </div>
                    <div class="input-group">
                        postiindeks:<input value="{{ (old('zipcode')) ? old('zipcode') : $address->zipcode }}" type="text" name="zipcode">
                        {{$errors->first('zipcode')}}
                    </div>
                @endforeach

                <div class="input-group">
                    <input type="submit" name="submit" value="Submit">
                </div>
            </form>
        </div>
    </div>
</body>
</html>
