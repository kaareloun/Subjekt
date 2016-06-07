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
                <div class="">
                    <form class="" action="/api/search" method="get">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <div class="input-group">
                            Eesnimi:<input type="text" name="eesnimi" value="">
                        </div>
                        <div class="input-group">
                            Nimi:<input type="text" name="nimi" value="">
                        </div>
                        <div id="lisavaljad">

                        </div>
                        @foreach($subjectTypes as $subjectType)
                            @foreach($subjectType->subject_attribute_type()->get() as $c)
                                <div class="input-group">
                                    {{$c->type_name}}:<input type="text" name="{{$c->type_name}}">
                                </div>
                            @endforeach
                        @endforeach
                        <div class="input-group">
                            Subjekti tüüp:
                            <select id="subjektSelect" class="" name="subjekt">
                                @foreach($subjectTypes as $subjectType)
                                    <option value="{{$subjectType->subject_type}}">{{$subjectType->type_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group">
                            <input type="submit" value="Otsi">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
    <script>
        $( "#subjektSelect" ).change(function() {
            var url = "/api/search/attributes"; // the script where you handle the form input.
            $.ajax({
                type: "GET",
                url: url,
                data: 'subjectType=' + $("#subjektSelect option:selected").val(), // serializes the form's elements.
                success: function(data) {
                    console.log(data);
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });
    </script>
</html>
