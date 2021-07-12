<!DOCTYPE html>
<html>
<head>
    <title>@yield('title','Quotes')</title>
</head>
<body>
    <ul>
        <li><a href="/quotes">Get Quotes</a></li>

        <li><a href="/quotes/quotd">Get Quote by Date</a></li>

        <li><a href="/quotes/random">Get Random</a></li>

        <li><a href="/quotes/search">Search</a></li>

        <li><a href="/">Home</a></li>
    </li>

    @yield('content')
</body>


</html>
