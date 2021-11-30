@extends('head')

@section('content')
    <div id="weather">
            @foreach($weather as $key => $val)
                <span>Город: </span><span>{{$key}}</span><br>
                <span>Температура: </span><span>{{$val['Temperature']}}</span><br>
                <span>Погода: </span><img src="/public/icon/{{$val['Description_Weather']}}.png"><br>
            @endforeach
    </div>
@endsection
