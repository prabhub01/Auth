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
        
    }
   
    public function store(Request $request)
    {
       
    }

    public function show()
    {
        $data=Bus::all();
        $value=Route::all();
        $info=Reservation::all();
        return view('agent.home',['route'=>$value, 'data'=>$data, 'info'=>$info]);

    }

    public function booking($id)
    {
        $book = Reservation::findOrFail($id);
        return view('agent.viewreservation',['info'=>$book]);
    }

    public function edit($id)
    {
        
    }

    public function update(Request $request, $id)
    {
  
    }

    public function destroy($id)
    {
       
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
