<!DOCTYPE html>
<html>
<head>
    <title>Laravel</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
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
            <h3>Ettevõttega seotud isikud</h3>
            @foreach($enterprise->persons()->get() as $person)
                <div class="">
                    <b>{{$relations->find($person->pivot->ent_per_relation_type_fk)->type_name}}</b> {{$person->first_name}} {{$person->last_name}}  {{$person->identity_code}} {{$person->birth_date}}
                </div>
            @endforeach

            <h3>Lisa ettevõttele isikuid</h3>
            <form id="findPerson" class="" action="index.html" method="post">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <div class="input-group">
                  <input type="text" name="first_name" class="form-control" placeholder="First Name" value="{{old('first_name')}}">
                  {{$errors->first('first_name')}}
                </div>
                <div class="input-group">
                    <input type="submit" name="submit" value="Submit">
                </div>
            </form>

            <div id="result">

            </div>
        </div>
    </div>
</body>
<script type="text/javascript">
    $("#findPerson").submit(function(e) {
        e.preventDefault();
        var url = "/api/person";
        $.ajax({
            type: "GET",
            url: url,
            data: $("#findPerson").serialize(),
            success: function(data) {
                var output = "<form id='addPerson' action='/api/person/link' method='POST'><input type='hidden' name='enterprise' value='" + {{$enterprise->enterprise}} + "'><input type='hidden' name='_token' value='<?php echo csrf_token(); ?>'><input type='hidden' name='person' value='" + data.person + "'><b>Eesnimi: </b> " + data.first_name + ", <b>perenimi: </b> " + data.last_name + ", <b>isikukood:</b> " + data.identity_code;
                output += "<select name='relation'>";
                    @foreach($relations as $relation)
                        output += "<option value='{{$relation->ent_per_relation_type}}'>{{$relation->type_name}}</option>";
                    @endforeach
                output += "</select>";
                output += "<input type='submit' name='submit' value='Lisa'></form>";
                $('#result').html(output);
                console.log(data);
            },
            error: function(data) {
                console.log("ERROR:" + data);
            }
        });
    });
</script>
</html>
