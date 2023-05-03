<?php

namespace App\Http\Controllers\api\v1;

use App\Models\AddItem;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddItemController_old extends Controller
{
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

    public function index()
    {
        $posts = AddItem::latest()->get();
        return response([
            'success' => true,
            'message' => 'List Penambahan data',
            'data' => $posts
        ], 200);
    }

    public function show($id)
    {
        $post = AddItem::whereId($id)->first();


        if ($post) {
            return response()->json([
                'success' => true,
                'message' => 'Detail Add_item!',
                'data'    => $post
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Tidak Ditemukan!',
                'data'    => ''
            ], 401);
        }
    }

    public function update(Request $request)
    {
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

    public function destroy($id)
    {
        $berita = AddItem::findOrFail($id);
        $berita->delete();
    }
}
