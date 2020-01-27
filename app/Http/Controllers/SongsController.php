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
                        $company = Company::firstOrCreate(['name' => $request->input('company')]);

                        $video = Video::firstOrCreate([
                            'name' => $request->input('video'),
                            'company_id' => $company['company_id']
                        ]);

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
        $post = Song::find($song_id);
        $post->delete();

        return redirect('songs')->with('success', 'Nummer verwijderd');
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
