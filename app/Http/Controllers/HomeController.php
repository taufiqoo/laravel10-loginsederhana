<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index()
    {
        return view("home/index");
    }
    function about()
    {
        return view("home/about");
    }
    function contact()
    {
        $judul = 'Ini adalah halaman contact';
        return view("home/contact")->with('halaman_judul', $judul);
    }
}
