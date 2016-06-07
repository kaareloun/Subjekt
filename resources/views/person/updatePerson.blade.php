<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <style>
        td:empty {
            visibility: hidden;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script>
        
        
        function populateAttributes(){
            console.log("populate");
                    @foreach ($person -> subject_attributes() as $attribute)
                        @for ($i = 0; $i < count($attribute); $i++)
                            //{{ $attribute[$i]['type_name'] }}</b> :<input value="@if($attribute[$i]['data_type'] == 1) {{$attribute[$i]['value_text']}} @elseif($attribute[$i]['data_type'] == 3) {{$attribute[$i]['value_date']}} @elseif($attribute[$i]['data_type'] == 2) {{$attribute[$i]['value_number']}} @endif" type="text" name="{{ $attribute[$i]['subject_attribute_type'] }}">
                        
                            document.getElementById("{{$attribute[$i]['subject_attribute_type']}}").value = "@if($attribute[$i]['data_type'] == 1) {{$attribute[$i]['value_text']}} @elseif($attribute[$i]['data_type'] == 3) {{$attribute[$i]['value_date']}} @elseif($attribute[$i]['data_type'] == 2) {{$attribute[$i]['value_number']}} @endif";
                        @endfor
                    @endforeach
        }
            
    </script>
    </head>
    <body onload="populateAttributes()">
        <div class="container">
            <div class="content">
                <form class="" method="post">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <table>
                        <tr>
                            <th>first name:</th>
                            <td><input value="{{old('first_name') ? old('first_name'):$person['first_name']}}" type="text" name="first_name"></td>
                            <td>{{$errors->first('first_name')}}</td>
                        </tr>
                        <tr>
                            <th>last name:</th>
                            <td><input value="{{old('last_name') ? old('last_name'):$person['last_name']}}" type="text" name="last_name"></td>
                            <td>{{$errors->first('last_name')}}</td>
                        </tr>
                        <tr>
                            <th>identity_code:</th>
                            <td><input value="{{old('identity_code') ? old('identity_code'):$person['identity_code']}}" type="text" name="identity_code"></td>
                            <td>{{$errors->first('identity_code')}}</td>
                        </tr>
                        <tr>
                            <th>birth_date:</th>
                            <td><input value="{{old('birth_date') ? old('birth_date'):$person['birth_date']}}" type="date" name="birth_date"></td>
                            <td>{{$errors->first('birth_date')}}</td>
                        </tr>
                    </table>
                    Customer <input type="checkbox" name="customer" @if ($person['customer']) checked @endif><br>
                    @foreach ($person -> attributes() as $attribute)
                        @for ($i = 0; $i < count($attribute); $i++)
                            <p>atribuut <b>{{ $attribute[$i]['type_name'] }}</b> :<input type="text" id="{{ $attribute[$i]['subject_attribute_type'] }}" name="{{ $attribute[$i]['subject_attribute_type'] }}"> </p>
                        @endfor
                    @endforeach
                    <br><input type="submit" value="Submit">

                    
                    


@include('person.addAddress')




    </body>

</html>
