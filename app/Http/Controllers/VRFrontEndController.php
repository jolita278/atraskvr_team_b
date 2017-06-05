<?php

namespace App\Http\Controllers;

use App\Models\VRMenus;
use Illuminate\Http\Request;

class VRFrontEndController extends Controller
{
    public function displayHomePage() {

        $data['menus'] = VRMenus::with(['translations', 'children'])->where('parent', "")->get()->toArray();
        
        return view('front-end.front-endHome', $data);
    }
}
