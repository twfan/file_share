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
        $files = FileUpload::orderBy('created_at','desc')->get();
        // dd($files);
        return view('handleAdmin', \compact('files'));
    }

    public function handleUser()
    {
        $files = FileUpload::orderBy('created_at','desc')->get();
        return view('home', \compact('files'));
    }
}
