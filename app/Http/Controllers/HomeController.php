<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FileUpload;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    public function handleAdmin()
    {
        $files = FileUpload::all();
        return view('handleAdmin', \compact('files'));
    }

    public function handleUser()
    {
        $files = FileUpload::all();
        return view('home', \compact('files'));
    }
}
