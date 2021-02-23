<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\Bus;
use App\Models\Route;
use App\Models\BusType;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class BusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Bus::with('bus_type')->get();
        $restore = Bus::onlyTrashed()->get();
        return view('admin.bus',['businfo'=>$data, 'trashed'=>$restore]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bustype = BusType::all();
        $route = Route::all();
        return view('admin.createbus', compact('bustype','route'));

        // if (Gate::allows('admin-only', auth()->user())) {
        // }
        // return 'You are not an authorized to view this Page!!!!';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // print_r($request->input());
         $request->validate([
            'bus_type_id' => 'required',
            'route_id' => 'required',
            'reg_num' => 'required',
            'seat_capacity' => 'required',
        ]);

        $count = Bus::where('reg_num', '=' ,$request->reg_num)->count();
        if($count == 1) {
            return redirect()->route('bus')
                        ->with('success','ERROR!! Bus Already Exists.');
        }


        Bus::create($request->all());
        return redirect()->route('bus')
                        ->with('success','New Bus Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $details = Bus::findOrFail($id);
        $data = Bus::all();
        $type = BusType::all();
        $routes = Route::all();
        return view('admin.editbus', ['details'=>$details, 'data'=>$data, 'type'=>$type, 'route'=>$routes]);
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
          // dd($request->all()); This is to debug the functions
          $request->validate([
            'bus_type_id' => 'required',
            'route_id' => 'required',
            'reg_num' => 'required',
            'seat_capacity' => 'required',
        ]);

        // escape the token field while updating the record
        $data['bus_type_id']=$request->bus_type_id;
        $data['route_id']=$request->route_id;
        $data['reg_num']=$request->reg_num;
        $data['seat_capacity']=$request->seat_capacity;

        Bus::whereId($id)->update($data);
        return redirect()->route('bus')
        ->with('success','Bus Updated successfully.');
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    }

    public function destroy(Bus $bus, $id)
    {
        $bus->destroy($id);
        return redirect()->route('bus')
                        ->with('success','Bus deleted successfully');
    }

    public function restore($id)
    {
        $bus = Bus::onlyTrashed()->find($id);
        // dd($bus);
        if (!is_null($bus)) {

            $bus->restore();
            return redirect()->route('bus')
                              ->with('success','Bus restored successfully');
        } else {

            return redirect()->route('bus')
            ->with('success',' Something went wrong !! Unable to restore Bus !');
        }
    }
}
