<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $title = 'Falus Karaoke';
        return view('pages.index')->with(
            'title', $title
        );
    }

    public function admin()
    {
        return view('pages.admin');
    }

}
