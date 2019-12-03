<?php

namespace App\Http\Controllers;

use App\Company;
use App\Song;
use App\Video;
use App\Artist;

use Illuminate\Http\Request;

class SongsController extends Controller
{
    public function addSong(Request $request)
    {
        // If the form is submitted
        if($request->getMethod() == 'POST') {

            if (
            $this->validate($request, [
                'artist' => 'required',
                'title' => 'required',
                'video' => 'required',
                'company' => 'required',
                'part' => 'required',
                'url' => 'required'
            ])
            ) {

                // TODO: check firstorcreate();

                // Get all company names. Create a new one if the song belongs to a new company, else insert the correct company_id into the request input
                $company = Company::all()->where('name', '=', $request->input('company'));

                if ($company->isEmpty()) {
                    $company = new Company;
                    $company->name = $request->input('company');
                    $company->save();
                }

                // Get all video titles. Create a new one if the song belongs to a new video, else insert the correct video_id into the request input
                $video = Video::all()->where('name', '=', $request->input('video'));

                if ($video->isEmpty()) {
                    $video = new Video;
                    $video->name = $request->input('video');
                    $video->company()->associate($company);
                    $video->save();
                }

                // Get all artist names. Create a new one if the song belongs to a new artist, else insert the correct artist_id into the request input
                $artist = Artist::all()->where('name', '=', $request->input('artist'));

                if ($artist->isEmpty()) {
                    $artist = new Artist;
                    $artist->name = $request->input('artist');
                    $artist->save();
                }

                // Save the new song
                $song = new Song;
                $song->title = $request->input('title');
                $song->part = $request->input('part');
                $song->url = $request->input('url');
                $song->artist()->associate($artist);
                $song->video()->associate($video);
                $song->save();
            }
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
        $songs = Song::with(['video', 'artist'])->get()->toArray();

        foreach($songs as $song){
            dump($song);
        }
        die;

        return view('songs.overview')->with(array(
            'songs' => $songs
        ));
    }
}
