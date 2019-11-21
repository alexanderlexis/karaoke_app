@extends('layouts.app')

@section('content')
    <h1>Dashboard</h1>
    <div class="container">
        <div class="row spaced-row">
            <a href="#" class="col-12 btn btn-primary text-white dashboard-btn">Nieuwe room code</a>
        </div>
        <div class="row spaced-row">
            <a href="/songs" class="col-12  btn btn-primary text-white dashboard-btn">Nummers</a>
        </div>
        <div class="row spaced-row">
            <a href="#" class="col-12  btn btn-primary text-white dashboard-btn">Playlist</a>
        </div>
        <div class="row spaced-row">
            <a href="#" class="col-12  btn btn-primary text-white dashboard-btn">Nieuwe admin</a>
        </div>
    </div>
@endsection
