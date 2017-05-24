<?php namespace App\Http\Controllers;

use App\Models\VRUsers;
use Illuminate\Routing\Controller;

class VRUsersController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /vrusers
	 *
	 * @return Response
	 */
	public function adminIndex()
	{
        $configuration = $this->getRoutesData();
        $configuration ['list']=VRUsers::orderBy('updated_at', 'desc')->get()->toArray();
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
        $first_name = $data['first_name'];
        $last_name = $data['last_name'];
        $email = $data['email'];
        $config = $this->getRoutesData();
        $config['item'] = VRUsers::find($id);
        $config['item']->pluck('id')->toArray();

        if ($first_name == null) {
            $config['error'] = ['id' => 'Klaida 00002', 'message' => 'Neužpildytas laukas "Vardas" !'];
            return view('admin.adminUsersEdit', $config);
        } elseif ($last_name == null) {
            $config['error'] = ['id' => 'Klaida 00002', 'message' => 'Neužpildytas laukas "Pavardė"!'];
            return view('admin.adminUsersEdit', $config);
        } elseif ($email == null) {
            $config['error'] = ['id' => 'Klaida 00002', 'message' => 'Neužpildytas laukas "Email"!'];
            return view('admin.adminUsersEdit', $config);
        }
            $record->update($data);
        $config['success_message'] = ['id' => 'Įrašas sėkmingai atnaujintas! ', 'message' => 'Atnaujintas įrašas -  ' . $data['first_name']];
        return view('admin.adminUsersEdit', $config);
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
		//
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