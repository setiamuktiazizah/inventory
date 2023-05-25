<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::latest()->get();
        return response([
            'success' => true,
            'message' => 'List Record Item',
            'data' => $items
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // if(!Gate::allows(['admin'])){
        //     abort(403);
        // }

        return "Item_create";
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
            'barcode' => 'required',
            'name' => 'required',
            'brand' => 'required',
            'quantity' => 'required',
            'condition' => 'required',
            'id_add_item' => 'required',
            'id_category' => 'required',
        ];

        $validatedRequest = $request->validate($rules);
        $item = Item::create($validatedRequest);

        return response()->json([
            'data' => $item
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        if ($item) {
            return response()->json([
                'success' => true,
                'message' => 'Detail Item!',
                'data'    => $item
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
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
        // if(!Gate::allows(['admin'])){
        //     abort(403);
        // }

        return "Item_edit";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $rules = [
            'barcode' => 'required',
            'name' => 'required',
            'brand' => 'required',
            'quantity' => 'required',
            'condition' => 'required',
            'id_add_item' => 'required',
            'id_category' => 'required',
        ];

        $validatedRequest = $request->validate($rules);

        $updatedItem = Item::where('id', $item->id)
        ->update($validatedRequest);

    return response()->json([
        'data' =>  $updatedItem
    ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        // if(!Gate::allows(['admin'])){
        //     abort(403);
        // }

        $item->delete();
        return "Item_destroy";
    }
}
