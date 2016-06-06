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
                    <li>{{$address->address_type->type_name}}</li>
                    <ul>
                        <li>{{$address->country}}</li>
                        <li>Country: {{$address->county}}</li>
                        <li>Town/village: {{$address->town_village}}</li>
                        <li>Street address: {{$address->street_address}}</li>
                        <li>Zipcode: {{$address->zipcode}}</li>
                    </ul>
                @endforeach
                </ul>
                <h3>Ettevõttega seotud isikud</h3>
                @foreach($enterprise->persons()->get() as $person)
                    <div class="">
                        <b>{{$relations->find($person->pivot->ent_per_relation_type_fk)->type_name}}</b> {{$person->first_name}} {{$person->last_name}}  {{$person->identity_code}} {{$person->birth_date}}
                    </div>
                @endforeach
            </div>
        </div>
    </body>
</html>
