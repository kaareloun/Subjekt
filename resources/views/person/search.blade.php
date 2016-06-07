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
                    <form class="" action="" method="get">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <div class="input-group">
                            Eesnimi:<input type="text" name="eesnimi" value="">
                        </div>

                        <div class="input-group">
                            Nimi:<input type="text" name="nimi" value="">
                        </div>
                        <div class="input-group">
                            Subjekti tüüp:
                            <select class="" name="subjekt">
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
</html>
