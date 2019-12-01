<?php

namespace App\Http\Controllers;

use App\Song;
use Illuminate\Http\Request;

class SongsController extends Controller
{
    public function addSong(Request $request)
    {
        if($request->getMethod() == 'POST'){
            $this->validate($request, array(

            ));
        } else {

        }

        return view('songs.addSong')->with(array(

        ));
    }

    public function deleteSong($song_id)
    {

    }

    public function editSong($song_id)
    {

    }

    public function overview()
    {
        $songs = Song::with(['video', 'artist'])->get();

        return view('songs.overview')->with(array(
            'songs' => $songs
        ));
    }
}
