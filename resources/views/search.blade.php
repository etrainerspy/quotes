@extends('layout2')

@section('content')
    <h1>{{$header}}</h1>
    <?php $searchCounter = 1 ?>
    @foreach ($aQuotes as $aryQuote)
        <h2>{{$searchCounter}}: {{$aryQuote['text']}}</h2>
        <p>{{$aryQuote['author']}}</p>
        <?php $searchCounter++ ?>
    @endforeach
@endsection
