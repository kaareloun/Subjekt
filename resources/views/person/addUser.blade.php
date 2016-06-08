@include('auth')
<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    </head>
    <body>
        <div class="container">
            <div class="content">
<<<<<<< HEAD
                <div class="">
                <form method="post">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                Create user account for employee:<br>
                <input type="text" name="subject_type_fk" value="3" hidden>
                <input type="text" name="subject_fk" value="{{$employee -> employee}}" hidden>
                Username: <input type="text" name="fname"><br>
                Password: <input type="text" name="fname"><br>
                <input type="submit" value="Submit">



                </form>

=======
                
                @if($userExists == false)
                    <div class="">                           
                        <form method="post">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        Create user account for employee:<br>
                        <input type="text" name="subject_type_fk" value="3" hidden>
                        <input type="text" name="subject_fk" value="{{$employee -> employee}}" hidden>
                        Username: <input type="text" name="username"><br>
                        Password: <input type="text" name="password"><br>
                        <input type="submit" value="Submit">
                        </form>    
                    </div>
                @else
                    <p>Antud töötaja kasutaja juba eksisteerib!</p>
                    <a href="/person/{{$person}}">Tagasi kasutaja juurde</a>
                @endif    
                
>>>>>>> origin/master

                
                
                
            </div>
        </div>
    </body>
</html>
