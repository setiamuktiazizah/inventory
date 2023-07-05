<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\ReduceItem;
use App\Models\Item;
use App\Models\AddItem;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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
        $addItems = AddItem::all();
        $categories = Category::all();

        // return response([
        //     'success' => true,
        //     'message' => 'List Record ReduceItem',
        //     'data' => $reduceItems
        // ], 200);

        return view('pengurangan-barang', ['reduceItems' => $reduceItems, 'addItems' => $addItems]);
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

        $items = Item::where('is_empty', false)->get();

        return view('tambah-pengurangan', [
            'data_items' => $items,
        ]);
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
            'id_item' => 'required',
            'quantity' => 'required',
            'cause' => 'required',
        ];

        $validatedRequest = $request->validate($rules);
        $validatedRequest['created_by'] = auth()->user()->id;

        // return $validatedRequest;
        $reduceItem = ReduceItem::create(
            $validatedRequest
        );

        return redirect('pengurangan-barang');
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

        return view('edit-pengurangan', [
            'reduceItem' => $reduceItem
        ]);
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
            'cause' => 'required',
        ];

        $validatedRequest = $request->validate($rules);
        $validatedRequest['updated_by'] = auth()->user()->id;
        $validatedRequest['updated_at'] = Carbon::now();

        $reduceItem = ReduceItem::where('id', $reduceItem->id)
            ->update($validatedRequest);

        return redirect('pengurangan-barang');
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
