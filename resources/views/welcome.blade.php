<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:300" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 300;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">Subjektid</div>
                <div class="">
                    <a href="/person">Isikud</a>
                    <a href="/person/create">Lisa isik</a>
                    <a href="/enterprise">Ettevõtted</a>
                    <a href="/enterprise/create">Lisa Ettevõte</a>
                </div>
            </div>
        </div>
    </body>
</html>
