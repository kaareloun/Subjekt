{{$request->session()->forget('key')}}
{{header("Location: http://localhost:8000/")}}
{{exit()}}
