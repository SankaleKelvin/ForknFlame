<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function store(Request $request){
        $validated=$request->validate([
            'name'=>'required | string',
            'slug'=>'required| string | unique:roles,slug'
        ]);

        $role = new Role();
        $role->name = $validated['name'];
        $role->slug = $validated['slug'];

        try{
            $role->save();
            return response()->json([
                'Role'=>$role,
            ], 200);
        }
        catch(\Exception $exception){
            return response()->json([
                'Error'=>"Failed to save Role",
            ], 500);
        }
    }

    public function index(){
        try{
            $roles = Role::all();
            return response()->json([
                'Roles'=>$roles,
            ], 200);
        }
        catch(\Exception $exception){
            return response()->json([
                'Error'=>"Failed to Fetch Roles",
            ], 500);
        }
    }
}
