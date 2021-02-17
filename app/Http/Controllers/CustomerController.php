<?php

namespace App\Http\Controllers;
use App\Models\Route;
use App\Models\Bus;
use App\Models\Reservation;
use App\Models\ConfirmBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $details = Route::findOrFail($id);
        $bus = DB:: table('buses')
                        ->select('id','reg_num')
                        ->where('route_id', $id)
                        ->get();

        $noBus = DB::table('buses')
                        ->select('route_id')
                        ->where('route_id', $id)
                        ->get();
        // dd($noBus);
            
        return view('customer.reserve', ['bus'=>$bus, 'details'=>$details, 'regBus'=>$bus, 'nobus'=>$noBus]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $busid['bus_id']=$request->bus_id;
        $date['date']=$request->date;
        $routeid['route_id']=$request->route_id;

        $bus = Bus::where('id', $request->bus_id)->first();

        $booked_seats = ConfirmBooking::where('bus_id', $busid)
                        ->where('date', $date)
                        ->where('route_id', $routeid)
                        ->get();

        $totalSeat = 0; 
                    foreach ($booked_seats as $item) 
                    {
                        $totalSeat = $totalSeat + $item->seats;          
                    }

             if ($totalSeat + $request->seats <= $bus->seat_capacity ) {
                $request->validate([
                    'cus_name' => 'required',
                    'cus_phone' => 'required',
                    'seats' => 'required|numeric|min:1',
                    'price' => 'required',
                    'date' => 'required',
                    'bus_id' => 'required',
                    'route_id' => 'required',
                ]);
        
                ConfirmBooking::create($request->all());
                return redirect()->route('index')
                                           ->with('success','You Successfully Booked this Ticket.');
             }     
             else{
                return back()
                ->with('msg','All seats are booked. Please select another bus or another date');
             }    
                        

        // $request->validate([
        //     'cus_name' => 'required',
        //     'cus_phone' => 'required',
        //     'seats' => 'required',
        //     'price' => 'required',
        //     'date' => 'required',
        //     'bus_id' => 'required',
        //     'route_id' => 'required',

        // ]);

        // Reservation::create($request->all());
        // return redirect()->route('index')
        //                 ->with('success','You Successfully Booked this Ticket.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
