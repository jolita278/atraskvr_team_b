<?php

namespace App\Http\Controllers;

use App\Models\VRMenus;
use Illuminate\Http\Request;

class VRFrontEndController extends Controller
{
    public function displayHomePage() {

        $data['menu'] = VRMenus::with(['translations', 'children'])->where('parent', "")->get()->toArray();

        dd($data);

        return view('front-end.front-endHome', $data);
    }
}
