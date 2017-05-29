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
        $configuration ['listName'] = 'Kalbų';
        $configuration ['ignore'] = '';
        $configuration ['list'] = VRlanguages::get()->toArray();
        return view('admin.adminList', $configuration);
    }

    public function getRoutesData()
    {
        $configuration = [];
        $configuration ['showDelete'] = 'app.admin.languages.index';
        $configuration ['edit'] = 'app.admin.languages.index';
        return $configuration;
    }
}