<?php namespace App\Http\Controllers;

use App\Models\VROrders;
use App\Models\VROrdersReservations;
use App\Models\VRPages;
use Carbon\Carbon;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VROrdersController extends Controller
{

    /**
     * Display a listing of the resource.
     * GET /vrorders
     *
     * @return Response
     */
    public function adminIndex()
    {
        $configuration = $this->getRoutesData();
        $configuration ['listName'] = 'Orders list';
        $configuration ['list'] = VROrders::/*with(['orderReservations'])->*/get()->toArray();
        $configuration ['ignore'] = '';
        $configuration ['url'] = url('admin/orders/create');
        $configuration ['orderReservations'] = 'orderReservations';

        return view('admin.adminList', $configuration);
    }
    /**
     * Get routes data
     * @return array
     */
    public function getRoutesData()
    {
        $configuration = [];
        $configuration ['showDelete'] = 'app.admin.orders.index';
        $configuration ['edit'] = 'app.admin.orders.index';
        return $configuration;
    }

    /**
     * Show the form for creating a new resource.
     * GET /vrorders/create
     *
     * @return Response
     */
    public function adminCreate()
    {
        $configuration = [];
        $date = [];
        for($days = Carbon::createFromDate();
            $days->lte(Carbon::createFromDate()->addDays(14));
            $days->addDay()) {
            $date[] = $days->format('Y-m-d');
        }
        $configuration['date'] = array_combine($date,$date);

        $configuration['experiences'] = DB::table('vr_pages')
            ->join('vr_pages_translations', 'vr_pages.id', '=', 'vr_pages_translations.page_id')
            ->select('vr_pages.id', 'vr_pages_translations.title')
            ->where('vr_pages.category_id', '=','patirciu-kambariai' )
            ->where('vr_pages_translations.language_id', '=', 'en')->pluck('title', 'id')->toArray();

        $times = [];
        for($hours = Carbon::createFromTime(10, 00, 00, 'Europe/Vilnius');
            $hours->lte(Carbon::createFromTime(21, 50, 00, 'Europe/Vilnius'));
            $hours->addMinutes(10)) {
            $times[] = $hours->format('H:i');
        }

        $configuration['times'] = array_combine($times,$times);
//dd($configuration);
//        $dateAndTimeArray = [];
//        foreach ($date as $key => $day) {
//            $key = [];
//            foreach ($times as $hour) {
//                $key [] = $hour;
//            }
//            $dateAndTimeArray[$day] = $key;
//        }
//
//        $configuration['dateAndTimeArray'] = $dateAndTimeArray;

        return view('users.usersOrders', $configuration);
    }

    /**
     * Store a newly created resource in storage.
     * POST /vrorders
     *
     * @return Response
     */
    public function adminStore()
    {
        $data = request()->all();
       dd($data);
        $record = VROrders::create(array(
            'user_id' => Auth::user()->id,
        ));
//TODO: foreach
            VROrdersReservations::create(array(
                'order_id' => $record->id,
                'datetime' => $data['the_lab_datetime'],
                'page_experience_id' => $data['page_experience_id'],
            ));

        return redirect('/admin/orders/')->with('message', 'Successfully created!');
    }

    /**
     * Display the specified resource.
     * GET /vrorders/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * GET /vrorders/{id}/edit
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * PUT /vrorders/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /vrorders/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        VROrdersReservations::destroy(VROrdersReservations::where('order_id', $id)->pluck('id')->toArray());
        VROrders::destroy($id);

        return json_encode(["success" => true, "id" => $id]);
    }

}