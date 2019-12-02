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
        if($request->getMethod() == 'POST'){

            $this->validate($request, array(
                'artist' => 'required',
                'title' => 'required',
                'video' => 'required',
                'part' => 'required',
                'url' => 'required'
            ));

            // Get all company names. Create a new one if the song belongs to a new company, else insert the correct company_id into the request input
            $companies = Company::all()->pluck('name', 'company_id')->toArray();

            if(in_array($request->input('company'), $companies)){
                $companyKey =  array_search($request->input('company'), $companies);
            } else {
                $company = new Company;
                $company->name = $request->input('company');
                if($company->save()){
                    $companyKey = $company->company_id;
                }
            }

            // Get all video titles. Create a new one if the song belongs to a new video, else insert the correct video_id into the request input
            $videoTitles = Video::all()->pluck('name', 'video_id')->toArray();

            if(in_array($request->input('video'), $videoTitles)){
                $videoKey =  array_search($request->input('video'), $videoTitles);
            } else {
                $video = new Video;
                $video->name = $request->input('video');
                $video->company_id = $companyKey;
                if($video->save()){
                    $videoKey = $video->video_id;
                }
            }

            // Get all artist names. Create a new one if the song belongs to a new artist, else insert the correct artist_id into the request input
            $artistNames = Artist::all()->pluck('name', 'artist_id')->toArray();

            if(in_array($request->input('artist'), $artistNames)){
                $artistKey =  array_search($request->input('artist'), $artistNames);
            } else {
                $artist = new Artist;
                $artist->name = $request->input('artist');
                if($artist->save()) {
                    $artistKey = $artist->artist_id;
                }
            }

            // Save the new song
            $song = new Song;
            $song->artist_id = $artistKey;
            $song->title = $request->input('title');
            $song->video_id = $videoKey;
            $song->part = $request->input('part');
            $song->url = $request->input('url');
            $song->save();
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
