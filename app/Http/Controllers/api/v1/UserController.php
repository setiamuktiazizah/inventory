<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->get();
        // return response([
        //     'success' => true,
        //     'message' => 'List Record User',
        //     'data' => $users
        // ], 200);
        return view('manajemen-user', ['data_user' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $rules = [
        //     'name' => 'required',
        //     'email' => 'required',
        //     'password' => 'required',
        //     'no_hp' => 'required',
        //     'no_credential' => 'required',
        //     'id_role' => 'required',
        // ];

        // $validatedRequest = $request->validate($rules);
        // $user = User::create($validatedRequest);

        // return response()->json([
        //     'data' => $user
        // ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        if ($user) {
            return response()->json([
                'success' => true,
                'message' => 'Detail User!',
                'data'    => $user
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Tidak Ditemukan!',
                'data'    => ''
            ], 401);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('manajemen-user-edit', ['data_user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $id = $request->user_id;
        $user = User::where('id', $id)->first();

        if ($user != NULL) {
            $user->update(['name' => $request->name]);
        }


        return redirect('/manajemen-user');
    }

    // public function update(Request $request, User $user)
    // {
    //     $rules = [
    //         'name' => 'required',
    //         'email' => 'required',
    //         'password' => 'required',
    //         'no_hp' => 'required',
    //         'no_credential' => 'required',
    //         'id_role' => 'required',
    //     ];

    //     $validatedRequest = $request->validate($rules);

    //     $updatedUser = User::where('id', $user->id)
    //         ->update($validatedRequest);

    //     return response()->json([
    //         'data' =>  $updatedUser
    //     ]);
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
    }
}
