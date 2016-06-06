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

            <h3>Lisa ettevõttele isikuid</h3>
            <form class="" action="index.html" method="post">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="First Name" value="{{old('first_name')}}">
                  {{$errors->first('first_name')}}
                </div>
                <div class="input-group">
                    <input type="submit" name="submit" value="Submit">
                </div>
            </form>
            <div class="result">

            </div>
        </div>
    </div>
</body>
<script type="text/javascript">
    function findPerson() {
        var url = "/person/" + id + "/update"; // the script where you handle the form input.
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
</script>
</html>
