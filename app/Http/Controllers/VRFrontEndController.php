<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VRFrontEndController extends Controller
{
    public function displayHomePage() {
        return view('front-end.front-endHome');
    }
}
