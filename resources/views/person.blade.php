<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="">
                    <div class="">
                        {{ $person['person'] }}
                    </div>
                    <div class="">
                        {{ $person['first_name'] }}
                    </div>
                    <div class="">
                        {{ $person['last_name'] }}
                    </div>
                    <div class="">
                        {{ $person['identity_code'] }}
                    </div>
                    <div class="">
                        {{ $person['birth_date'] }}
                    </div>
                    <div class="">
                        {{ $person['created_by'] }}
                    </div>
                    <div class="">
                        {{ $person['updated_by'] }}
                    </div>
                    <div class="">
                        {{ $person['created'] }}
                    </div>
                    <div class="">
                        {{ $person['updated'] }}
                    </div>

                </div>
            </div>
        </div>
    </body>
</html>
