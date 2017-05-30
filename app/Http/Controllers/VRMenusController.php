<?php namespace App\Http\Controllers;

use App\Models\VRLanguages;
use App\Models\VRMenus;
use App\Models\VRMenusTranslations;
use App\Models\VRPages;
use App\Models\VRPagesTranslations;
use Illuminate\Routing\Controller;

class VRMenusController extends Controller
{

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
        $configuration ['list'] = VRmenus::with(['menusTranslationsData'])->get()->toArray();
        $configuration ['ignore'] = '';
        $configuration ['url'] = url('admin/menus/create');

        return view('admin.adminList', $configuration);
    }

    public function getRoutesData()
    {
        $configuration = [];
        $configuration ['list'] = 'app.admin.menus.index';
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
        $data['pages'] = VRPagesTranslations::pluck('title', 'id')->toArray();
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
        $record['routes'] = $this->getRoutesData();
        $record['languages'] = VRLanguages::pluck('name', 'id')->toArray();
        $record['pages'] = VRPagesTranslations::pluck('title', 'id')->toArray();

        $data = request()->all();

        VRMenus::create(array(
            'sequence' => $data['sequence'],
            'parent' => $data['parent'],
        ));
        VRMenusTranslations::create(array(
            'name' => $data['title'],
            'slug' => $data['slug'],
            'language_id' => $data['language'],
        ));

        //$record->menusTranslationsData()->sync($data['id']);

        return view('admin.adminMenusCreate', $record->toArray());
    }

    /**
     * Display the specified resource.
     * GET /vrmenus/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function adminShow($id)
    {
        $configuration = $this->getRoutesData();

        $configuration ['single'] = VRMenus::find($id)->toArray();

        return view('admin.adminMenuSingle', $configuration);
    }

    /**
     * Show the form for editing the specified resource.
     * GET /vrmenus/{id}/edit
     *
     * @param  int $id
     * @return Response
     */
    public function adminEdit($id)
    {
        $config = $this->getRoutesData();
        $config['languages'] = VRLanguages::pluck('name', 'id')->toArray();
        $config['pages'] = VRPagesTranslations::pluck('title', 'id')->toArray();

        $config['item'] = VRMenus::find($id);
        $config['item']->pluck('id')->toArray();

        //$config['menuInfo'] = VRMenus::with('menusTranslationsData')->find($id)->toArray();

        return view('admin.adminMenusEdit', $config);
    }

    /**
     * Update the specified resource in storage.
     * PUT /vrmenus/{id}
     *
     * @param  int $id
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
     * @param  int $id
     * @return Response
     */
    public function adminDestroy($id)
    {
        VRMenus::destroy($id);

        return json_encode(["success" => true, "id" => $id]);
    }

}