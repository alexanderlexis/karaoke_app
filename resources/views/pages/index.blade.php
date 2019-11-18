@extends('layouts.app')

@section('content')
<div class="jumbotron text-center">
    <h1>Falus Karaoke</h1>
    <h2>Room code:</h2>
    {!! Form::open(['action' => 'PagesController@index', 'method' => 'POST']) !!}

    <div class="form-group col">
        {{Form::text('room-code', '', [
        'class' => 'form-control text-center',
        'placeholder' => 'Code'
        ])}}
    </div>

    {{Form::submit('Join!', ['class' => 'btn btn-success btn-lg'])}}
    {!! Form::close() !!}
</div>
@endsection
