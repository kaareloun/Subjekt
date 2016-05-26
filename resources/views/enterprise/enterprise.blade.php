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
                    Name: {{ $enterprise['name'] }}
                </div>
                <div class="">
                    Full name: {{ $enterprise['full_name'] }}
                </div>
                <h5>Addresses</h5>
                <ul>
                @foreach($enterprise->addresses()->get() as $address)
                    <li>{{$address->country}}</li>
                    <ul>
                        <li>Country: {{$address->county}}</li>
                        <li>Town/village: {{$address->town_village}}</li>
                        <li>Street address: {{$address->street_address}}</li>
                        <li>Zipcode: {{$address->zipcode}}</li>
                    </ul>
                @endforeach
                </ul>
            </div>
        </div>
    </body>
</html>
