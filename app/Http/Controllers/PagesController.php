<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = 'Strona Główna';

        //return view('pages.index', compact('title'));
        return view('pages.index') -> with('title', $title);
    }

    public function about() {
        $title = 'Praca Magisterska';
        //return view('pages.about', compact('title'));
        return view('pages.about') -> with('title', $title);
    }

    public function services() {
        $data = array(
            'title' => 'Serwis',
            'services' => ['Web Design','Programming','SEO']
        );
        return view('pages.services') -> with($data);
    }

    public function camera() {
        $title = 'Kamera';
        //return view('pages.about', compact('title'));
        return view('pages.cam') -> with('title', $title);
    }

}
