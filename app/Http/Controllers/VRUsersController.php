<?php namespace App\Http\Controllers;




use App\Models\VRUsers;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;

class VRUsersController extends Controller {

    use ValidatesRequests;
	/**
	 * Display a listing of the resource.
	 * GET /vrusers
	 *
	 * @return Response
	 */
	public function adminIndex()
	{
        $configuration = $this->getRoutesData();
        $configuration ['list']=VRUsers::with(['rolesConnectionData'])->orderBy('updated_at', 'desc')->get()->toArray();
        return view('admin.adminUsersList', $configuration);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /vrusers/create
	 *
	 * @return Response
	 */
	public function adminCreate()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /vrusers
	 *
	 * @return Response
	 */
	public function adminStore()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /vrusers/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function adminShow($id)
	{
        $configuration = $this->getRoutesData();

        $configuration ['single'] = VRUsers::find($id)->toArray();

        return view('admin.adminUsersSingle', $configuration);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /vrusers/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function adminEdit($id)
	{
        $config = $this->getRoutesData();

        $config['item'] = VRUsers::find($id);

        $config['item']->pluck('id')->toArray();

        return view('admin.adminUsersEdit', $config);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /vrusers/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function adminUpdate($id)
	{
        $record = VRUsers::find($id);
        $data = request()->all($id);

        $config = $this->getRoutesData();
        $config['item'] = VRUsers::find($id);
        $config['item']->pluck('id')->toArray();

        $this->validate(request(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'digits:8',
        ]);

        $config['message'] = 'Vartotojas sėkmingai atnaujintas';

        $record->update($data);

        $config->session()->flash('message', 'User was successfully added!');

        return view('admin.adminUsersEdit');
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /vrusers/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function adminDestroy($id)
	{
        VRUsers::destroy($id);

        return json_encode(["success" => true, "id" => $id]);
	}
    /**
     * Get routes data
     *
     * @return array
     */
    public function getRoutesData()
    {
        $configuration = [];
        $configuration ['usersList'] = 'app.admin.users.index';
        $configuration ['usersShowDelete'] = 'app.admin.users.showDelete';
        $configuration ['usersEdit'] = 'app.admin.users.edit';
        return $configuration;
    }
}