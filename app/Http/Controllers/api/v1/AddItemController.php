<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\AddItem;
use Illuminate\Http\Request;

class AddItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = AddItem::latest()->get();
        return response([
            'success' => true,
            'message' => 'List Penambahan data',
            'data' => $posts
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //TODO: nunggu view create addItems
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
            'name' => 'required',
            'brand' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'cause' => 'required',
            'id_category' => 'required',
            'created_by' => 'required',
        ];

        $validatedRequest = $request->validate($rules);
        // $validatedRequest['created_by'] = auth()::user()->id;

        $addItem = AddItem::create($validatedRequest);

        return response()->json([
            'data' => $addItem
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AddItem  $addItem
     * @return \Illuminate\Http\Response
     */
    public function show(AddItem $addItem)
    {
        // error_log(getrout);
        if ($addItem) {
            return response()->json([
                'success' => true,
                'message' => 'Detail Add_item!',
                'data'    => $addItem
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
     * @param  \App\Models\AddItem  $addItem
     * @return \Illuminate\Http\Response
     */
    public function edit(AddItem $addItem)
    {
        //TODO: nunggu view edit addItem
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AddItem  $addItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AddItem $addItem)
    {
        //TODO: tambah cek rules
        $rules = [
            'date' => 'required',
            'name' => 'required',
            'brand' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'cause' => 'required',
            'id_category' => 'required',
            'created_by' => 'required',
            'updated_by' => 'required'
        ];

        $validatedRequest = $request->validate($rules);
        // $validatedRequest['updated_by'] = auth()::user()->id;

        $add_item = AddItem::where('id', $addItem->id)
            ->update($validatedRequest);

        return response()->json([
            'data' =>  $add_item
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AddItem  $addItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(AddItem $addItem)
    {
        $addItem->delete();
    }
}
