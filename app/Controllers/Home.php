<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $title = 'Contoh Dashboard';
        return view('dash_example',compact('title'));
    }

    public function starter()
    {
        $title = 'Halaman starter';
        return view('starter', compact('title'));
    }
}
