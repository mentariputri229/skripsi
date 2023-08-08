<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PemohonController extends Controller
{
    public function index()
    {
        return view('pemohon.index');
    }
}
