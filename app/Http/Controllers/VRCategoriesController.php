<?php namespace App\Http\Controllers;

use App\Models\VRCategoriesTranslations;
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
        $configuration ['list'] =  VRCategoriesTranslations::get()->toArray();
        return view('admin.adminCategoriesList', $configuration);
    }

    public function getRoutesData()
    {
        $configuration = [];
        $configuration ['categoriesList'] = 'app.admin.categories.index';
        return $configuration;
    }
}