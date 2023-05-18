<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\ReduceItem;
use Illuminate\Http\Request;

class ReduceItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reduceItems = ReduceItem::latest()->get();
        return response([
            'success' => true,
            'message' => 'List Record ReduceItem',
            'data' => $reduceItems
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
            'date' => 'required',
            'quantity' => 'required',
            'cause' => 'required',
            'id_item' => 'required',
        ];

        $validatedRequest = $request->validate($rules);
        $reduceItem = ReduceItem::create($validatedRequest);

        return response()->json([
            'data' => $reduceItem
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReduceItem  $reduceItem
     * @return \Illuminate\Http\Response
     */
    public function show(ReduceItem $reduceItem)
    {
        if ($reduceItem) {
            return response()->json([
                'success' => true,
                'message' => 'Detail ReduceItem!',
                'data'    => $reduceItem
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
     * @param  \App\Models\ReduceItem  $reduceItem
     * @return \Illuminate\Http\Response
     */
    public function edit(ReduceItem $reduceItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReduceItem  $reduceItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReduceItem $reduceItem)
    {
        $rules = [
            'date' => 'required',
            'quantity' => 'required',
            'cause' => 'required',
            'id_item' => 'required',
        ];

        $validatedRequest = $request->validate($rules);

        $updatedReduceItem = ReduceItem::where('id', $reduceItem->id)
            ->update($validatedRequest);

        return response()->json([
            'data' =>  $updatedReduceItem
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReduceItem  $reduceItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReduceItem $reduceItem)
    {
        $reduceItem->delete();
    }
}
