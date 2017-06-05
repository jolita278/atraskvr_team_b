<?php

namespace App\Http\Controllers;

use App\Models\VRMenus;
use Illuminate\Http\Request;

class VRFrontEndController extends Controller
{
    /**
     * Gets data from menu and menu translations
     * and sends it to home blade
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     */
    public function displayMenu() {

        $data['menus'] = VRMenus::with(['translations', 'children'])->where('parent', "")->get()->toArray();

        return view('front-end.front-endHome', $data);
    }
}
