<?php namespace App\Http\Controllers;

use App\Models\VRLanguages;
use Illuminate\Routing\Controller;

class VRLanguagesController extends Controller
{

    /**
     * Display a listing of the resource.
     * GET /vrlanguages
     *
     * @return mixed
     *
     */
    public function adminIndex()
    {
        $configuration = $this->getRoutesData();
        $configuration ['list'] = VRlanguages::get()->toArray();
        return view('admin.adminLanguagesList', $configuration);
    }

    public function getRoutesData()
    {
        $configuration = [];
        $configuration ['languagesList'] = 'app.admin.languages.index';
        return $configuration;
    }
}