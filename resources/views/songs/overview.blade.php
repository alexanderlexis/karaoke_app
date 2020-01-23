@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 style="display:inline;">Nummers</h1>
            <a href="{{action('SongsController@addSong')}}" class="btn btn-primary text-white float-right"><i class="fas fa-plus"></i> Nieuw</a>
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
{{--                    <th>--}}
{{--                        Video--}}
{{--                    </th>--}}
{{--                    <th>--}}
{{--                        Part--}}
{{--                    </th>--}}
                </tr>
            </thead>
            @foreach($songs as $song)
                <tr>
                    <td>{{$song->artist->name}}</td>
                    <td>{{$song->title}}</td>
{{--                    <td>{{$song->video->name}}</td>--}}
{{--                    <td>{{$song->part}}</td>--}}
                </tr>
            @endforeach
        </table>
    </div>
    </div>
    </div>
@endsection
