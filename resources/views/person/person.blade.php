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
                    
                    Subject:
                    <div>
                        <table border="1">
                            <tr>
                                <th>First name</th>
                                <td>{{ $person['first_name'] }}</td>
                            </tr>
                            <tr>
                                <th>Last name</th>
                                <td>{{ $person['last_name'] }}</td>
                                
                            </tr>
                            <tr>
                                <th>Identity code</th>
                                <td>{{ $person['identity_code'] }}</td>                 
                            </tr>
                            <tr>
                                <th>Birth date</th>
                                <td>{{ $person['birth_date'] }}</td>
                            </tr>
                        </table>
                    </div>
                    Addresses:
                        <div>
                            <table border="1">
                                <th>Address type</th>
                                <th>Country</th>
                                <th>County</th>
                                <th>Town/Village</th>
                                <th>Street Address</th>
                                <th>Zipcode</th>
                                @foreach ($addresses->get() as $address)
                                    <tr>
                                        <td></td>
                                        <td>{{ $address['country'] }}</td>
                                        <td>{{ $address['county'] }}</td>
                                        <td>{{ $address['town_village'] }}</td>
                                        <td>{{ $address['street_address'] }}</td>
                                        <td>{{ $address['zipcode'] }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    
                    <div style="padding-top:30px">
                        <a href="/person/update/{{$person['person']}}">Edit</a>
                    </div>
                    
                   


                </div>
            </div>
        </div>
    </body>
</html>
