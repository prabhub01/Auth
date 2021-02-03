<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;
use\App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=User::get();
        $info=Role::get();
        return view('admin.role',['userinfo'=>$data, 'roleinfo'=>$info]);


        // if (Gate::allows('admin-only', auth()->user())) {
        //  }
        // return 'Unauthorized Access !!!! Login as Admin to get access';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('admin.createrole');
        
        // if (Gate::allows('admin-only', auth()->user())) { 
        // }
        // return 'Unauthorized Access !!!! Login as Admin to get access';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'role' => 'required',
        // ]);
        // Role::create($request->all());
        // return redirect()->route('role')
        //                 ->with('success','New Role Created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $details = User::findOrFail($id);
        $data= Role::get();
        return view('admin.edituser', ['details'=>$details, 'data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role_id' => 'required',
        ]);

        // escape the token field while updating the record
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['role_id']=$request->role_id;

        User::whereId($id)->update($data);
        return redirect()->route('role')
        ->with('success','Users Details Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role, $id)
    {
        $role->destroy($id);
        return redirect()->route('role')
                        ->with('success','Role deleted successfully');
    }
}
