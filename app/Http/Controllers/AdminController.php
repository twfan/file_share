<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function __constrruct()
    {
        # code...
        $this->middleware('auth:admin');
    }

    public function index()
    {
        # code...
        $files = File::all();
        // return view('files.index', compact('files'));
        return view('admin', \compact('files'));
    }
}
