<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\ReduceItem;
use App\Models\Item;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ReduceItemController extends Controller
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
        //TODO: nunggu view create ReduceItems
        //
        // if(!Gate::allows(['admin'])){
        //     abort(403);
        // }

        return "ReduceItem_create";
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
     * @param  \App\Models\ReduceItem  $reduceItem
     * @return \Illuminate\Http\Response
     */
    public function show(ReduceItem $reduceItem)
    {
        // if(!Gate::allows(['admin', 'operator'])){
        //     abort(403);
        // }

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
        // if(!Gate::allows(['admin'])){
        //     abort(403);
        // }

        return "ReduceItem_edit";
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
        // if(!Gate::allows(['admin'])){
        //     abort(403);
        // }

        $reduceItem->delete();
        return "ReduceItem_destroy";
    }
}
