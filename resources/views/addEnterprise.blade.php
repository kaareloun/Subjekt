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
                    <input type="text" name="name" placeholder="Name">
                    <input type="text" name="full_name" placeholder="Full name">
                    <input type="submit" name="submit" value="Submit">
                </form>

            </div>
        </div>
    </body>
</html>
