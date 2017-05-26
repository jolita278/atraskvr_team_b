<?php namespace App\Http\Controllers;

use App\Models\VRCategories;
use Illuminate\Routing\Controller;

class VRCategoriesController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /vrcategories
	 *
	 * @return Response
	 */

    public function adminIndex()
    {
       // $configuration = $this->getRoutesData();
        $configuration ['list'] =  VRCategories::with( ['categoryTranslations'])->get()->toArray();
        //$configuration ['list'] = $data->toArray();
        //$configuration = $this->configuration()->toArray();
       //dd($configuration);
        return view('admin.adminCategoriesList', $configuration);
    }

    public function getRoutesData()
    {
        $configuration = [];
        $configuration ['categoriesList'] = 'app.admin.categories.index';
        return $configuration;
    }
}