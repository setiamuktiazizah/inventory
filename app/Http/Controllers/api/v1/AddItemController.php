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
        $_POST = AddItem::create([
            'date' => $request->input('date'),
            'name' => $request->input('name'),
            'brand' => $request->input('brand'),
            'quantity' => $request->input('quantity'),
            'price' => $request->input('price'),
            'cause' => $request->input('cause'),
            'id_category' => $request->input('id_category'),
            'created_by' => $request->input('created_by'),
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
        $_POST = AddItem::whereId($request->input('id'))->update([
            'date' => $request->input('date'),
            'name' => $request->input('name'),
            'brand' => $request->input('brand'),
            'quantity' => $request->input('quantity'),
            'price' => $request->input('price'),
            'cause' => $request->input('cause'),
            'id_category' => $request->input('id_category'),
            'created_by' => $request->input('created_by'),
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
