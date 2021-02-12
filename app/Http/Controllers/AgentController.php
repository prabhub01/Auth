<?php

namespace App\Http\Controllers;
use App\Models\Route;
use App\Models\Bus;
use App\Models\Reservation;
use App\Models\ConfirmBooking;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class AgentController extends Controller
{
    public function index()
    {
        return view('agent.index');
    }

    public function create()
    {
        
    }
   
    public function store(Request $request)
    {
        
    }

    public function show()
    {
        $data=Bus::with('bus_type')->get();
        $route=Route::with('bus','district')->get();
        $info=ConfirmBooking::with('route')->paginate(3);
        return view('agent.home',['route'=>$route, 'data'=>$data, 'info'=>$info]);
        // return view('agent.home', compact('data','route','info'));
    }

    public function booking($id)
    {
        $book = ConfirmBooking::findOrFail($id);
        return view('agent.viewreservation',['info'=>$book]);
    }

    public function edit($id)
    {
        
    }

    public function update(Request $request, $id)
    {
  
    }

    public function destroy(Reservation $reserve, $id)
    {
        $reserve->destroy($id);
        return redirect()->route('home')
                        ->with('success','Ticket cancelled !!');
    }

    public function confirm(Reservation $reserve, $id)
    {
        // Storing data to Confirm Booking Table before deleting it 
        $confirm = Reservation::find($id);
        $data = array(
            'cus_name' => $confirm->cus_name,
            'cus_phone' => $confirm->cus_phone,
            'seats' => $confirm->seats,
            'price' => $confirm->price,
            'date' => $confirm->date,
            'route_id' => $confirm->route_id,  
            'bus_id' => $confirm->bus_id,  

       );
       ConfirmBooking::create($data);

        $reserve->destroy($id);
        return redirect()->route('home')
                        ->with('success','Ticket Confirmed !!');
    }

    public function login()
    {
        return view('agent.login');
    }
}
