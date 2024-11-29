<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HubungiController extends Controller
{
    public function index()
    {
        return view('user.hubungi-kami');
    }
}
