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
                <form action="create" method="post">
                Create user account for employee:<br>
                <input type="text" name="subject_type_fk" value="3" hidden>
                <input type="text" name="subject_fk" value="{{$employee -> employee}}" hidden>
                Username: <input type="text" name="fname"><br>
                Password: <input type="text" name="fname"><br>
                <input type="submit" value="Submit">
                    
                
                    
                </form>    
                

                </div>
            </div>
        </div>
    </body>
</html>
