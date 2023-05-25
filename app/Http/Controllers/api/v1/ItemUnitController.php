<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\ItemUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ItemUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if(!Gate::allows(['admin', 'operator'])){
        //     abort(403);
        // }

        $itemUnits = ItemUnit::latest()->get();
        return response([
            'success' => true,
            'message' => 'List Record ItemUnit',
            'data' => $itemUnits
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // if(!Gate::allows(['admin', 'operator'])){
        //     abort(403);
        // }

        return "ItemUnit_create";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'default_quantity' => 'required',
        ];

        $validatedRequest = $request->validate($rules);
        $itemUnit = ItemUnit::create($validatedRequest);

        return response()->json([
            'data' => $itemUnit
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ItemUnit  $itemUnit
     * @return \Illuminate\Http\Response
     */
    public function show(ItemUnit $itemUnit)
    {
        // if(!Gate::allows(['admin', 'operator'])){
        //     abort(403);
        // }

        if ($itemUnit) {
            return response()->json([
                'success' => true,
                'message' => 'Detail ItemUnit!',
                'data'    => $itemUnit
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
     * @param  \App\Models\ItemUnit  $itemUnit
     * @return \Illuminate\Http\Response
     */
    public function edit(ItemUnit $itemUnit)
    {
        //
        // if(!Gate::allows(['admin', 'operator'])){
        //     abort(403);
        // }

        return "ItemUnit_edit";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ItemUnit  $itemUnit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ItemUnit $itemUnit)
    {
        $rules = [
            'name' => 'required',
            'default_quantity' => 'required',
        ];

        $validatedRequest = $request->validate($rules);

        $updatedItemUnit = ItemUnit::where('id', $itemUnit->id)
            ->update($validatedRequest);

        return response()->json([
            'data' =>  $updatedItemUnit
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ItemUnit  $itemUnit
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItemUnit $itemUnit)
    {
        // if(!Gate::allows(['admin'])){
        //     abort(403);
        // }

        $itemUnit->delete();
        return "ItemUnit_destroy";
    }
}
