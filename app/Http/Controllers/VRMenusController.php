<?php namespace App\Http\Controllers;

use App\Models\VRLanguages;
use App\Models\VRMenus;
use Illuminate\Routing\Controller;

class VRMenusController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /vrmenus
	 *
	 * @return Response
	 */
	public function adminIndex()
    {
         $configuration = $this->getRoutesData();
        $configuration ['listName'] = 'Meniu punktų';
        $configuration ['list'] =  VRmenus::get()->toArray();
        $configuration ['ignore'] = '';
        $configuration ['url'] = "url('admin/menus/create')";

        return view('admin.adminList', $configuration);
    }

    public function getRoutesData()
    {
         $configuration = [];
         $configuration ['showDelete'] = 'app.admin.menus.showDelete';
         $configuration ['edit'] = 'app.admin.menus.edit';
        return $configuration;
    }

	/**
	 * Show the form for creating a new resource.
	 * GET /vrmenus/create
	 *
	 * @return Response
	 */
	public function adminCreate()
	{
	    $data['routes'] = $this->getRoutesData();
        $data['languages'] = VRLanguages::pluck('name', 'id')->toArray();
        return view('admin.adminMenusCreate', $data);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /vrmenus
	 *
	 * @return Response
	 */
	public function adminStore()
	{
        $data = request()->all();
        $record = VRMenus::create(array(
            'sequence' => $data['sequence'],
        ));
        $record->ingredientsConnectionData()->sync($data['ingredients']);


        return view('admin.adminMenusCreate', $record->toArray());
	}

	/**
	 * Display the specified resource.
	 * GET /vrmenus/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function adminShow($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /vrmenus/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function adminEdit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /vrmenus/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function adminUpdate($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /vrmenus/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function adminDestroy($id)
	{
        VRMenus::destroy($id);

        return json_encode(["success" => true, "id" => $id]);
	}

}