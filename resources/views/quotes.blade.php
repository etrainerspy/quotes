@extends('layout2')

@section('content')
    <h1>{{$header}}</h1>
    @foreach ($aQuotes as $key => $aryQuote)
        <h2>{{$key+1}}: {{$aryQuote['text']}}</h2>
        <p>{{$aryQuote['author']}}</p>
    @endforeach
@endsection
