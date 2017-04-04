<?php

namespace App\Http\Controllers;

/**
 * Serve pages
 */
class PagesController extends Controller
{
    public function getAbout()
    {
        $age = 17;
        $hobby = 'Watching TV';
        $data = [];
        $data['age'] = $age;
        $data['hobby'] = $hobby;
        return view('pages/about')->with('data', $data);
    }
    public function getContact()
    {
        $data = [];
        $data['name'] = 'Tom Jackson';
        $data['description'] = 'I am a hardworking and positive dog!';
        return view('pages/contact')->with('data', $data);
    }
    public function getIndex()
    {
        return view('pages/welcome');
    }
}