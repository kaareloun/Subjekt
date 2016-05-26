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
                <h5>Nimi</h5>
                <div class="input-group">
                    nimi:<input type="text" class="form-control" placeholder="Name" name="name"
                        value="{{ (old('name')) ? old('name') : $enterprise->name }}">
                    {{$errors->first('name')}}
                </div>
                <div class="input-group">
                    täis nimi:<input type="text" class="form-control" placeholder="Full Name" name="full_name"
                        value="{{ (old('full_name')) ? old('full_name') : $enterprise->full_name }}">
                    {{$errors->first('full_name')}}
                </div>
                <div class="input-group">
                    <input type="submit" name="submit" value="Submit">
                </div>
            </form>
        </div>
    </div>
</body>
</html>
