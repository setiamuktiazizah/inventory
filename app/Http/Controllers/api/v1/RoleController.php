<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if(!Gate::allows(['admin'])){
        //     abort(403);
        // }

        $roles = Role::latest()->get();
        return response([
            'success' => true,
            'message' => 'List Record Role',
            'data' => $roles
        ], 200);
    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        // if(!Gate::allows(['admin'])){
        //     abort(403);
        // }

        if ($role) {
            return response()->json([
                'success' => true,
                'message' => 'Detail Role!',
                'data'    => $role
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Tidak Ditemukan!',
                'data'    => ''
            ], 401);
        }
    }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  \App\Models\Role  $role
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit(Role $role)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \App\Models\Role  $role
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, Role $role)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\Models\Role  $role
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy(Role $role)
    // {
    //     //
    // }
}
