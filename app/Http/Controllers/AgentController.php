<?php

namespace App\Http\Controllers;
use App\Models\Route;
use App\Models\Bus;
use App\Models\Reservation;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('agent.index');
    }

    public function create()
    {
        return view('agent.createbus');
    }

    
    public function createroute()
    {
       //fetching all data from the table bus
        $data= Bus::get(); 

        return view('agent.createroute', compact('data'));
    }

   
    public function store(Request $request)
    {
        // print_r($request->input());
        $request->validate([
            'type' => 'required',
            'reg_num' => 'required',
            'seat_capacity' => 'required',
        ]);
        Bus::create($request->all());
        return redirect()->route('home')
                        ->with('success','New Bus Added successfully.');
    }

  
    public function addroute(Request $request)
    {
        // print_r($request->input());
        $request->validate([
            'name' => 'required',
            'start_from' => 'required',
            'final_destination' => 'required',
            'bus_id' => 'required',
            'price' => 'required',
        ]);

        Route::create($request->all());
        return redirect()->route('home')
                        ->with('success','New Route Added successfully.');
    }

   

    public function show(Bus $bus)
    {
        $data=Bus::all();
        $value=Route::all();
        $info=Reservation::all();
        return view('agent.home',['route'=>$value, 'data'=>$data, 'info'=>$info]);

    }

    public function showbooking($id)
    {
        $book = Reservation::findOrFail($id);
        return view('agent.viewreservation',['info'=>$book]);
    }

    public function displayroute()
    {
        $value=Route::all();
        return view('index',['data'=>$value]);

    }

    public function edit($id)
    {
        $details = Bus::findOrFail($id);
        return view('agent.editbus', compact('details'));
    }

    public function editroute($id)
    {
        $info = Route::findOrFail($id);
        //fetching all data from Bus Table 
        $data= Bus::get(); 
        return view('agent.editroute',['info'=>$info, 'data'=>$data]);
    }

    
    public function update(Request $request, $id)
    {
        // dd($request->all()); This is to debug the functions
        $request->validate([
            'type' => 'required',
            'reg_num' => 'required',
            'seat_capacity' => 'required',
        ]);

        // escape the token field while updating the record
        $data['type']=$request->type;
        $data['reg_num']=$request->reg_num;
        $data['seat_capacity']=$request->seat_capacity;

        Bus::whereId($id)->update($data);
        return redirect()->route('home')
        ->with('success','Bus Updated successfully.');
    }

    public function updateroute(Request $request, $id)
    {
        
        $request->validate([
            'name' => 'required',
            'start_from' => 'required',
            'final_destination' => 'required',
            'bus_id' => 'required',
            'price' => 'required',
        ]);

        // escape the token field while updating the record
        $data['name']=$request->name;
        $data['start_from']=$request->start_from;
        $data['final_destination']=$request->final_destination;
        $data['bus_id']=$request->bus_id;
        $data['price']=$request->price;

        Route::whereId($id)->update($data);
        return redirect()->route('home')
        ->with('success','Route Updated successfully.');
    }


    public function destroy(Bus $bus, $id)
    {
        $bus->destroy($id);
        return redirect()->route('home')
                        ->with('success','Bus deleted successfully');
    }

    public function destroyroute(Route $route, $id)
    {
        $route->destroy($id);
        return redirect()->route('home')
                        ->with('success','Route deleted successfully');
    }

    public function confirm(Reservation $reserve, $id)
    {

        $reserve->destroy($id);
        return redirect()->route('home')
                        ->with('success','Ticket Confirmed !!');
    }

    public function login()
    {
        return view('agent.login');
    }
}
