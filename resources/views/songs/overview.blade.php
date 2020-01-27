@extends('layouts.app')

@section('content')
    <div class="row" style="margin-bottom: 15px;">
        <div class="col-md-12">
            <h1 style="display:inline; line-height: 0.7">Nummers</h1>
            @if ( Auth::user())
            <a href="{{action('SongsController@addSong')}}" class="btn btn-primary text-white float-right"><i class="fas fa-plus"></i> Nieuw</a>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-dark col-md-12">
                    <thead>
                        <tr>
                            <th>
                                Artiest
                            </th>
                            <th>
                                Titel
                            </th>
                        </tr>
                    </thead>
                    @foreach($songs as $song)
                        <tr>
                            <td style="vertical-align: middle">{{$song->artist->name}}</td>
                            <td style="vertical-align: middle">{{$song->title}}</td>
                            <td>
                                @if ( Auth::user())
                                {!! Form::open(array('action' => array('SongsController@deleteSong', $song->song_id), 'method' => 'POST', 'class' => 'deleteSongForm float-right', 'onSubmit' => 'return confirm("Wil je \"' . $song->title . '\" verwijderen?")')) !!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{ Form::button('<i class="fa fa-trash" aria-hidden="true"></i>', ['class' => 'btn btn-danger', 'type' => 'submit']) }}
                                {!! Form::close() !!}
                                @endif
                                <a href="{{action('SongsController@viewSong', $song->song_id)}}" class="btn btn-primary text-white float-right"><i class="fas fa-search"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
