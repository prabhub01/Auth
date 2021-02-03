<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\Route;
use App\Models\Bus;
use App\Models\State;
use App\Models\District;


class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $value=Route::with('bus')->get();
        return view('admin.route',['route'=>$value]);
        
        // if (Gate::allows('admin-only', auth()->user())) { 
        // }
        // return 'You are not an authorized to view this Page!!!!';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         
         $data= Bus::get(); 
         $states = State::all();
         return view('admin.createroute', compact('data','states'));

        //  if (Gate::allows('admin-only', auth()->user())) {
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
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'start_from' => 'required',
            'state_id' => 'required',
            'district' => 'required',
            'bus_id' => 'required',
            'price' => 'required',
        ]);

        Route::create($request->all());
        return redirect()->route('route')
                        ->with('success','New Route Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $value = Route::with('bus')->get();
        return view('index', compact('value'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $info = Route::findOrFail($id);
        $data = Bus::get(); 
        $states = State::get();
        $dist = District::get();
        return view('admin.editroute',['info'=>$info, 'data'=>$data, 'state'=>$states, 'district'=>$dist]);
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
        $request->validate([
            'name' => 'required',
            'start_from' => 'required',
            'state_id' => 'required',
            'district' => 'required',
            'bus_id' => 'required',
            'price' => 'required',
        ]);

        // escape the token field while updating the record
        $data['name']=$request->name;
        $data['start_from']=$request->start_from;
        $data['state_id']=$request->state_id;
        $data['district']=$request->district;
        $data['bus_id']=$request->bus_id;
        $data['price']=$request->price;

        Route::whereId($id)->update($data);
        return redirect()->route('route')
        ->with('success','Route Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Route $route, $id)
    {
        $route->destroy($id);
        return redirect()->route('home')
                        ->with('success','Route deleted successfully');
    }
    
    public function findDisWithStateID($id)
    {
        $district = District::where('state_id',$id)->get();
        return response()->json($district);
    }
}
