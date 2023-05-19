<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\ReduceItem;
use App\Models\Item;
use App\Models\User;
use App\Models\Category;
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
        $reduceItem = ReduceItem::latest()->get();
        $item = Item::all();
        $user = User::all();
        $category = Category::all();

        $data =  response([
            'success' => true,
            'message' => 'List Penambahan data',
            'data' => $reduceItem,
        ], 200);
        return view('pengurangan-barang', ['data_reduce' => $reduceItem, 'data_user' => $user, 'data_item' => $item, 'data_category' => $category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //TODO: nunggu view create ReduceItems
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

        $reduceItem = ReduceItem::create($validatedRequest);

        return response()->json([
            'data' => $reduceItem
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReduceItem  $ReduceItem
     * @return \Illuminate\Http\Response
     */
    public function show(ReduceItem $reduceItem)
    {
        // error_log(getrout);
        if ($reduceItem) {
            return response()->json([
                'success' => true,
                'message' => 'Detail Add_item!',
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
     * @param  \App\Models\ReduceItem  $ReduceItem
     * @return \Illuminate\Http\Response
     */
    public function edit(ReduceItem $ReduceItem)
    {
        //TODO: nunggu view edit ReduceItem
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReduceItem  $ReduceItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReduceItem $reduceItem)
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

        $reduce_item = ReduceItem::where('id', $reduceItem->id)
            ->update($validatedRequest);

        return response()->json([
            'data' =>  $reduce_item
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReduceItem  $ReduceItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReduceItem $reduceItem)
    {
        $reduceItem->delete();
    }
}
