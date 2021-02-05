<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use\App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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
        $permi=Permission::get();

        return view('admin.role',['userinfo'=>$data, 'roleinfo'=>$info,'per'=>$permi,]);


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
        return view('admin.createrole');
        
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
        $request->validate([
            'name' => 'required',
        ]);

        // dd($request);
        Role::create($request->all());
        return redirect()->route('role')
                        ->with('success','New Role Created.');
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
       
    }

    public function update(Request $request, $id)
    {
    
    }

    public function editrole($id)
    {
        //getting permissions related to this role
        $permissions = Permission::get();
        
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
        ->pluck('role_has_permissions.permission_id')
        ->all();

        $details = Role::findOrFail($id);
        return view('admin.editrole', ['details'=>$details,'permissions'=>$permissions, 'rolePermissions'=>$rolePermissions]);
    }

    public function updaterole(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'rolePermission' => 'required',
        ]);
        
        // escape the token field while updating the record
        $data['name']=$request->name;
        $data['rolePermission']=$request->rolePermission;
        
         // Role::whereId($id)->update($data);
        $role = Role::find($id);
        $role->update($data);
       
        DB::table('role_has_permissions')->where('role_id',$id)->delete();
        $role->givePermissionTo($request->input('rolePermission'));

        return redirect()->route('role')
        ->with('success','Role Updated successfully.');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    

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
