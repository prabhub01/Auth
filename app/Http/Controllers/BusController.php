<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bus;

class BusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agent.createbus');
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
            'type' => 'required',
            'reg_num' => 'required',
            'seat_capacity' => 'required',
        ]);
        Bus::create($request->all());
        return redirect()->route('home')
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
        $details = Bus::findOrFail($id);
        return view('agent.editbus', compact('details'));
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
        return redirect()->route('home')
                        ->with('success','Bus deleted successfully');
    }
}
