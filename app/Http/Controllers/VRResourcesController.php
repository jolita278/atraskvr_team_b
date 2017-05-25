<?php namespace App\Http\Controllers;

use App\Models\VRResources;
use Carbon\Carbon;
use Illuminate\Http\UploadedFile;
use Illuminate\Routing\Controller;

class VRResourcesController extends Controller {

    /**
     * Get routes data
     *
     * @return array
     */
    public function getRoutesData()
    {
        $configuration = [];
        $configuration ['adminList'] = 'app.admin.resources.index';
        $configuration ['adminShowDelete'] = 'app.admin.resources.showDelete';
        $configuration ['adminCreateUpload'] = 'app.admin.resources.createUpload';
        return $configuration;
    }
	/**
	 * Display a listing of the resource.
	 * GET /resources
	 *
	 * @return Response
	 */
	public function adminIndex()
	{
//        $configuration = $this->getRoutesData();
//        $configuration ['list'] = VRResources::orderBy('updated_at', 'desc')->get()->toArray();
//        return view('admin.adminUpload', $configuration);
        return view('admin.adminResourcesList');
	}
    /**
     * Show the form for creating a new resource.
     * GET /resources/create
     *
     * @return Response
     */
    public function adminCreate()
    {
        return view('admin.adminUpload');
    }
        /**
         * Uploads file data
         * Creates generates file path
         *
         * @param UploadedFile $file
         * @return mixed
         */
        public function adminUpload(UploadedFile $file)
    {
        $data = [
            "size" => $file->getSize(),
            "mime_type" => $file->getMimeType(),
        ];
        $path = __DIR__.'/storage/' . date("Y/m/d");
        $fileName = Carbon::now()->timestamp . '_' . $file->getClientOriginalName();
        $file->move($path, $fileName);
        $data["path"] = $path . $fileName;
        return VRResources::create($data);
    }

	/**
	 * Display the specified resource.
	 * GET /resources/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function adminShow($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /resources/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function adminDestroy($id)
	{
		//
	}

}