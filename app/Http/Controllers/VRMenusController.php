<?php namespace App\Http\Controllers;

use App\Models\VRLanguages;
use App\Models\VRMenus;
use App\Models\VRMenusTranslations;
use App\Models\VRPages;
use App\Models\VRPagesTranslations;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;

class VRMenusController extends Controller
{
    use ValidatesRequests;

    /**
     * Display a listing of the resource.
     * GET /vrmenus
     *
     * @return Response
     */
    public function adminIndex()
    {
        $configuration = $this->getRoutesData();
        $configuration ['listName'] = 'Menus list';
        $configuration ['list'] = VRmenus::with(['translations'])->get()->toArray();
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
        $data['pages'] = VRPagesTranslations::pluck('title', 'title')->toArray();
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
        $record['pages'] = VRPagesTranslations::pluck('title', 'title')->toArray();

        $data = request()->all();

        $this->validate(request(), [
            'slug' => 'required|max:255|unique:vr_menus_translations',
            'sequence' => 'integer|required',
            'new_window' => 'required',

        ]);
        $menuRecord = VRMenus::create(array(
            'sequence' => $data['sequence'],
            'parent' => $data['parent'],
            'new_window' => $data['new_window'],
        ));
        VRMenusTranslations::create(array(
            'menu_id' => $menuRecord->id,
            'name' => $data['title'],
            'slug' => $data['slug'],
            'language_id' => $data['language'],
        ));

        return redirect('/admin/menus')->with('message', 'Meniu įrašas sėkmingai sukurtas');
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
        $configuration['array_key'] = 'pivot';
        $configuration['name'] = 'name';
        $configuration['language_id'] =
        $configuration['title'] = "Menu with translations data";
        $configuration ['single'] = VRMenus::with(['menusTranslationsData'])->find($id)->toArray();
        return view('admin.adminSingle', $configuration);
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
        $config['pages'] = VRPagesTranslations::pluck('title', 'title')->toArray();

        $config['item'] = VRMenus::find($id);
        $config['translationItem'] = VRMenusTranslations::where('menu_id', $id)->get()->toArray();
        $config['item']->pluck('id')->toArray();
        //$config['languageCode'] = request()-> segment(5);

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
        $record['routes'] = $this->getRoutesData();
        $record['languages'] = VRLanguages::pluck('name', 'id')->toArray();
        $record['pages'] = VRPagesTranslations::pluck('title', 'title')->toArray();

        $config = VRMenus::find($id);

        $data = request()->all($id);

        $this->validate(request(), [
            'slug' => 'required|max:255',
            'sequence' => 'integer|required',
        ]);

        $config->update($data);

        VRMenusTranslations::where('menu_id', $id)->update([
            'name' => $data['title'],
            'slug' => $data['slug'],
            'language_id' => $data['language'],
        ]);

        return redirect('/admin/menus')->with('message', 'Meniu įrašas sėkmingai atnaujintas');
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