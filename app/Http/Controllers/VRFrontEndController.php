<?php

namespace App\Http\Controllers;

use App\Models\VRMenus;
use Illuminate\Http\Request;

class VRFrontEndController extends Controller
{
    public function displayHomePage() {
        $data['menu_lt'] = VRMenus::with('translations')->get()->toArray();

        return view('front-end.front-endHome', $data);
    }
}
