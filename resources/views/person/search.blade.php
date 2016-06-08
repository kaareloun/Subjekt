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
                    <form class="" action="/api/search" method="get">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <div class="input-group">
                            Eesnimi:<input type="text" name="eesnimi" value="">
                        </div>
                        <div class="input-group">
                            Nimi:<input type="text" name="nimi" value="">
                        </div>
                        <div id="lisavaljad">

                        </div>
                        <div class="input-group">
                            Subjekti tüüp:
                            <select id="subjektSelect" class="" name="subjekt">
                                @foreach($subjectTypes as $subjectType)
                                    <option value="{{$subjectType->subject_type}}">{{$subjectType->type_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group">
                            <input type="submit" value="Otsi">
                        </div>
                    </form>

                    @if(session()->has('result'))
                        @if(session('type') == 1)
                            @foreach(session('result') as $item)
                                <div>
                                    <div><b>{{$item->first_name}} {{$item->last_name}}</b></div>
                                    <div>Isikukood:{{$item->identity_code}}</div>
                                    <div>Sündinud:{{$item->birth_date}}</div>
                                    <a href="/person/{{$item->person}}">Vaata</a>
                                </div>
                            @endforeach
                        @elseif(session('type') == 2)
                            @foreach(session('result') as $item)
                                <div>
                                    <div><b>{{$item->name}}</b></div>
                                    <div>Nimi:{{$item->full_name}}</div>
                                    <a href="/enterprise/{{$item->enterprise}}">Vaata</a>
                                </div>
                            @endforeach
                        @elseif(session('type') == 3)
                            @foreach(session('result') as $item)
                                @foreach($item as $item2)
                                    <div>
                                        <div>Nimi: <b>{{$item2->first_name}} {{$item2->last_name}}</b></div>
                                        <a href="/person/{{$item2->person}}">Vaata</a>
                                        <div>Töötab: <b>{{$item2->full_name}}</b></div>
                                        <a href="/enterprise/{{$item2->enterprise}}">Vaata</a>
                                    </div>
                                @endforeach
                            @endforeach
                        @elseif(session('type') == 4)
                            @foreach(session('result') as $item)
                                @foreach(session('result') as $item2)
                                    @if(isset($item2->first()->first_name))
                                        <div>
                                            <div><b>{{$item2->first()->first_name}} {{$item2->first()->last_name}}</b></div>
                                            <div>Isikukood:{{$item2->first()->identity_code}}</div>
                                            <div>Sündinud:{{$item2->first()->birth_date}}</div>
                                            <a href="/person/{{$item2->first()->person}}">Vaata</a>
                                        </div>
                                    @else
                                        <div>
                                            <div><b>{{$item2->first()->name}}</b></div>
                                            <div>Nimi:{{$item2->first()->full_name}}</div>
                                            <a href="/enterprise/{{$item2->first()->enterprise}}">Vaata</a>
                                        </div>
                                    @endif

                                @endforeach
                            @endforeach
                        @endif
                    @endif

                </div>
            </div>
        </div>
    </body>
    <script>
        $(function() {
            var url = "/api/search/attributes"; // the script where you handle the form input.
            $.ajax({
                type: "GET",
                url: url,
                data: 'subjectType=' + 1, // serializes the form's elements.
                success: function(data) {
                    console.log(data);
                    var result = "";
                    $.each( data, function( key, value ) {
                        result += "<div class='input-group'>";
                        result += value['type_name'] + "<input name='" + value['type_name'] + "' type='text'>";
                        result += "</div>";
                    });
                    result += "</div>";
                    $('#lisavaljad').html(result);
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });

        $( "#subjektSelect" ).change(function() {
            var url = "/api/search/attributes"; // the script where you handle the form input.
            $.ajax({
                type: "GET",
                url: url,
                data: 'subjectType=' + $("#subjektSelect option:selected").val(), // serializes the form's elements.
                success: function(data) {
                    console.log(data);
                    var result = "";
                    $.each( data, function( key, value ) {
                        result += "<div class='input-group'>";
                        result += value['type_name'] + "<input name='" + value['type_name'] + "' type='text'>";
                        result += "</div>";
                    });
                    result += "</div>";
                    $('#lisavaljad').html(result);
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });
    </script>
</html>
