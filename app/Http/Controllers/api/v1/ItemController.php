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
        $items = Item::where('is_empty', false)->get();
        return view('data-barang')->with('data_items', $items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     // if(!Gate::allows(['admin'])){ 
    //     //     abort(403);
    //     // }

    //     return "Item_create";
    // }
    // ====> Automatically created everytime AddItem successfully created


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     $rules = [
    //         'barcode' => 'required',
    //         'name' => 'required',
    //         'brand' => 'required',
    //         'quantity' => 'required',
    //         'condition' => 'required',
    //         'id_add_item' => 'required',
    //         'id_category' => 'required',
    //     ];

    //     $validatedRequest = $request->validate($rules);
    //     $item = Item::create($validatedRequest);

    //     return response()->json([
    //         'data' => $item
    //     ]);
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        return $item;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        if(!Gate::allows(['operator']) && !Gate::allows(['admin'])){
            abort(403);
        }

        return view('edit-barang', [
            'item' => $item
        ]);
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
            // 'quantity' => 'required', // berkurang otomatis lewat ReduceItem
            'condition' => 'required',
            // 'id_add_item' => 'required', // sensitive
        ];

        $validatedRequest = $request->validate($rules);


        $updatedItem = Item::where('id', $item->id)
            ->update($validatedRequest);

        return redirect('/data-barang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Item $item)
    // {
    //     // if(!Gate::allows(['admin'])){
    //     //     abort(403);
    //     // }

    //     $item->delete();
    //     return "Item_destroy";
    // }
    // =====> Undestroyable
}
