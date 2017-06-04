<?php namespace App\Http\Controllers;

use App\Models\VRMenus;
use App\Models\VRMenusTranslations;
use Illuminate\Routing\Controller;

class VRWelcomePageController extends Controller {

	public function displayMenu() {
	    //$data['menu_lt'] = VRMenusTranslations::where('language_id', 'lt')->get()->toArray();
        //$data['menu_en'] = VRMenusTranslations::where('language_id', 'en')->get()->toArray();
        //$data['menu_ru'] = VRMenusTranslations::where('language_id', 'ru')->get()->toArray();

        $data['menu_lt'] = VRMenus::with('translations')->get()->toArray();

        return view('welcome', $data);
    }

}