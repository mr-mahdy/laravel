<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $title = 'Home';
        // $active = true;
        return view('index',  ['title' => $title]);
    }
}
