<?php namespace App\Http\Controllers;

use App\Models\VRCategories;
use App\Models\VRLanguages;
use App\Models\VRPages;
use App\Models\VRPagesTranslations;
use App\Models\VRResources;
use Illuminate\Routing\Controller;

class VRPagesController extends Controller
{

    /**
     * Display a listing of the resource.
     * GET /vrpages
     *
     * @return Response
     */
    public function adminIndex()
    {
        $config = [];
        $config = $this->getRoutesData();
        $config['routeShowDelete'] = 'app.admin.pages.showDelete';
        $config['routeEdit'] = 'app.admin.pages.edit';
        $config['list'] = VRPages::with(['translationsData'])->get()->toArray();
        $config['listName'] = 'Pages list';
        $config['ignore'] = 'translations_data';
        $config['url'] = url('admin/pages/create');
        //$config['list']= VRPages::get()->toArray();

        //dd($config);
        return view('admin.adminPagesList', $config);
    }

    /**
     * Show the form for creating a new resource.
     * GET /vrpages/create
     *
     * @return Response
     */
    public function adminCreate()
    {
        $config = [];
        $config['category'] = VRCategories::pluck('id', 'id')->toArray();
        $config['resource'] = VRResources::pluck('path', 'id')->toArray();
        $config['language'] = VRLanguages::pluck('name', 'id')->toArray();
//dd($config);
        return view('admin.adminPagesCreate', $config);
    }

    /**
     * Store a newly created resource in storage.
     * POST /vrpages
     *
     * @return Response
     */
    public function adminStore()
    {
        //dd($_POST);
        $data = request()->all();
        $record = VRPages::create(array(
            'category_id' => $data['category_id'],
            //'resource_id' => $data['resource_id'],
        ));

        //dd($record->toArray());


        VRPagesTranslations::create(array(
            'page_id' => $record->id,
            'language_id' => $data['language_id'],
            'title' => $data['title'],
            'description_short' => $data['description_short'],
            'description_long' => $data['description_long'],
            'slug' => $data['slug']
        ));
        return redirect('/admin/pages/')->with('message', 'Puslapis sėkmingai sukurtas!');
    }

    /**
     * Display the specified resource.
     * GET /vrpages/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function adminShow($id)
    {
        $config = $this->getRoutesData();
        $config ['single'] = VRPages::with(['translationsData'])->find($id)->toArray();
        return view('admin.adminPagesSingle', $config);
    }

    /**
     * Show the form for editing the specified resource.
     * GET /vrpages/{id}/edit
     *
     * @param  int $id
     * @return Response
     */
    public function adminEdit($id)
    {
        $config = [];
        $config ['single'] = VRPages::with(['translationsData'])->find($id)->toArray();
        $config['category'] = VRCategories::pluck('id', 'id')->toArray();
        $config['resource'] = VRResources::pluck('path', 'id')->toArray();
        $config['language'] = VRLanguages::pluck('name', 'id')->toArray();
        $config['languageCode'] = request()->segment(5);
        $config['sing'] = VRPages::find($id)->toArray();


        //dd($config);
        return view('admin.adminPagesEdit', $config);
    }

    /**
     * Update the specified resource in storage.
     * PUT /vrpages/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function adminUpdate($id)
    {
        $data = request()->all();

        $record = VRPages::find($id);
        $record->update($data);

        $translation = VRPagesTranslations::where('page_id', $id)->get()
            ->where('language_id', $data['language_id'])
            ->first();
        //dd($translation->toArray());
        //       dd($translation);


        if ($translation) {
            $translation->update($data);
        } else {
            $data['page_id'] = $record->id;
            VRPagesTranslations::create($data);
        }


        return redirect('/admin/pages');
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /vrpages/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function adminDestroy($id)
    {
        //
    }

    public function getRoutesData()
    {
        $config = [];
        $config ['usersList'] = 'app.admin.pages.index';
        $config ['showDelete'] = 'app.admin.pages.showDelete';
        $config ['edit'] = 'app.admin.pages.edit';
        return $config;
    }


}

