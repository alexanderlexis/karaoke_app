<?php

namespace App\Http\Controllers;

use App\Company;
use App\Song;
use App\Video;
use App\Artist;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
                //TODO: flash message in exception

                try {
                    DB::transaction(function () use ($request) {
                        // Get all company names. Create a new one if the song belongs to a new company, else insert the correct company_id into the request input
                        $company = Company::firstOrCreate(['name' => $request->input('company')]);

                        // Get all video titles. Create a new one if the song belongs to a new video, else insert the correct video_id into the request input
                        $video = Video::firstOrCreate([
                            'name' => $request->input('video'),
                            'company_id' => $company['company_id']
                        ]);

                        // Get all artist names. Create a new one if the song belongs to a new artist, else insert the correct artist_id into the request input
                        $artist = Artist::firstOrCreate([
                            'name' => $request->input('artist')
                        ]);

                        // Save the new song
                        $song = new Song;
                        $song->title = $request->input('title');
                        $song->part = $request->input('part');
                        $song->url = $request->input('url');
                        $song->artist()->associate($artist);
                        $song->video()->associate($video);
                        if ($song->save()) {
                            return redirect('songs');
                        }
                    });
                } catch (\Exception $e){

                    return redirect('songs/add');

                }

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
        $songs = Song::with(['video', 'artist'])->get();

        return view('songs.overview')->with(array(
            'songs' => $songs
        ));
    }
}
