<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function index(){
        $name = 'Welcome to Home page';
        return view('pages.home')->with('title', $name);
    }

    public function about(){
        return view ('pages.about');
    }
    
    public function services()
    {
        $data = array(
            'title' => 'Service Page',
            'services' => ['Web', 'Java', 'C++']
        );
        return view ('pages.services')->with('data', $data);
    }
}
