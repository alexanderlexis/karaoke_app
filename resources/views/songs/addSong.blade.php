@extends('layouts.app')

@section('content')
    <h1>Nieuw nummer</h1>
    {!! Form::open(array('action' => 'SongsController@addSong', 'method' => 'post')) !!}
        <div class="form-group">
            {{ Form::label('artist', 'Artiest') }}
            {{ Form::text('artist', '', array('class' => 'form-control', 'placeholder' => 'Artiest')) }}
        </div>
        <div class="form-group">
            {{ Form::label('title', 'Titel') }}
            {{ Form::text('title', '', array('class' => 'form-control', 'placeholder' => 'Titel')) }}
        </div>
        <div class="form-group">
            {{ Form::label('company', 'Company') }}
            {{ Form::text('company', '', array('class' => 'form-control', 'placeholder' => 'Company')) }}
        </div>
        <div class="form-group">
            {{ Form::label('video', 'Video') }}
            {{ Form::text('video', '', array('class' => 'form-control', 'placeholder' => 'Video')) }}
        </div>
        <div class="form-group">
            {{ Form::label('part', 'Part') }}
            {{ Form::text('part', '', array('class' => 'form-control', 'placeholder' => 'Part')) }}
        </div>
        <div class="form-group">
            {{ Form::label('url', 'YouTube link') }}
            {{ Form::text('url', '', array('class' => 'form-control', 'placeholder' => 'YouTube link')) }}
        </div>
    {!! Form::Submit('Verstuur >', array('class' => 'btn btn-success')) !!}
    {!! Form::close() !!}
@endsection
