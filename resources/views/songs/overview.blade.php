@extends('layouts.app')

@section('content')
    <h1>Nummers</h1>
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
@endsection
