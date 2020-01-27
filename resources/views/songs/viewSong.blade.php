@extends('layouts.app')

@section('content')
    <div class="row" style="margin-bottom: 15px;">
        <div class="col-md-12">
            <h1 style="display:inline; line-height: 0.7">{{$song->title}}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-dark col-md-12">
                <tr>
                    <td>
                        <b>Artiest</b>
                    </td>
                    <td>
                        {{$song->artist->name}}
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Video</b>
                    </td>
                    <td>
                        {{$song->video->company->name}} - {{$song->video->name}}
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Part</b>
                    </td>
                    <td>
                        {{$song->part}}
                    </td>
                </tr>
            </table>
            <a href="{{action('SongRequestsController@createRequest', $song->song_id)}}" class="btn btn-primary text-white float-right"><i class="fas fa-microphone"></i> Zingen!</a>
        </div>
    </div>
@endsection
