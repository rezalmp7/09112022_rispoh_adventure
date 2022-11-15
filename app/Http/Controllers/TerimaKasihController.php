<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TerimaKasihController extends Controller
{
    public function index()
    {
        return view('terima_kasih');
    }
}
