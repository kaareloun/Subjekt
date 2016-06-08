@if(!session('username'))
    {{ header("Location: http://localhost:8000/") }}
    {{ exit() }}
@endif

<a href="/person/create">Create person</a>
<a href="/enterprise/create">Create Enterprise</a>
<a href="/search">Search</a>
<a href="/logout">Log out</a>
