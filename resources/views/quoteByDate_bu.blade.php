@extends('layout')

@section('content')
    <h1>{{$header}}</h1>
    <h2>{{$dayOfWeek}}</h2>
    <h2>{{$getVars}}</h2>
    <h2>{{$aQuotes['text']}}</h2>
    <p>{{$aQuotes['author']}}</p>
@endsection
