<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\ReduceItem;
<<<<<<< HEAD
use App\Models\Item;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
=======
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
>>>>>>> d8209e76a2eaced5662b969ede07012d601a8cd6

class ReduceItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
<<<<<<< HEAD
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
=======
        if(!Gate::allows(['admin', 'operator'])){
            abort(403);
        }


        $reduceItems = ReduceItem::latest()->get();
        return response([
            'success' => true,
            'message' => 'List Record ReduceItem',
            'data' => $reduceItems
        ], 200);
>>>>>>> d8209e76a2eaced5662b969ede07012d601a8cd6
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
<<<<<<< HEAD
        //TODO: nunggu view create ReduceItems
=======
        //
        if(!Gate::allows(['admin'])){
            abort(403);
        }

        return "ReduceItem_create";
>>>>>>> d8209e76a2eaced5662b969ede07012d601a8cd6
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
<<<<<<< HEAD
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

=======
            'quantity' => 'required',
            'cause' => 'required',
            'id_item' => 'required',
        ];

        $validatedRequest = $request->validate($rules);
>>>>>>> d8209e76a2eaced5662b969ede07012d601a8cd6
        $reduceItem = ReduceItem::create($validatedRequest);

        return response()->json([
            'data' => $reduceItem
        ]);
    }

    /**
     * Display the specified resource.
     *
<<<<<<< HEAD
     * @param  \App\Models\ReduceItem  $ReduceItem
=======
     * @param  \App\Models\ReduceItem  $reduceItem
>>>>>>> d8209e76a2eaced5662b969ede07012d601a8cd6
     * @return \Illuminate\Http\Response
     */
    public function show(ReduceItem $reduceItem)
    {
<<<<<<< HEAD
        // error_log(getrout);
        if ($reduceItem) {
            return response()->json([
                'success' => true,
                'message' => 'Detail Add_item!',
=======
        if(!Gate::allows(['admin', 'operator'])){
            abort(403);
        }

        if ($reduceItem) {
            return response()->json([
                'success' => true,
                'message' => 'Detail ReduceItem!',
>>>>>>> d8209e76a2eaced5662b969ede07012d601a8cd6
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
<<<<<<< HEAD
     * @param  \App\Models\ReduceItem  $ReduceItem
     * @return \Illuminate\Http\Response
     */
    public function edit(ReduceItem $ReduceItem)
    {
        //TODO: nunggu view edit ReduceItem
=======
     * @param  \App\Models\ReduceItem  $reduceItem
     * @return \Illuminate\Http\Response
     */
    public function edit(ReduceItem $reduceItem)
    {
        //
        if(!Gate::allows(['admin'])){
            abort(403);
        }

        return "ReduceItem_edit";
>>>>>>> d8209e76a2eaced5662b969ede07012d601a8cd6
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
<<<<<<< HEAD
     * @param  \App\Models\ReduceItem  $ReduceItem
=======
     * @param  \App\Models\ReduceItem  $reduceItem
>>>>>>> d8209e76a2eaced5662b969ede07012d601a8cd6
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReduceItem $reduceItem)
    {
<<<<<<< HEAD
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
=======
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
>>>>>>> d8209e76a2eaced5662b969ede07012d601a8cd6
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
<<<<<<< HEAD
     * @param  \App\Models\ReduceItem  $ReduceItem
=======
     * @param  \App\Models\ReduceItem  $reduceItem
>>>>>>> d8209e76a2eaced5662b969ede07012d601a8cd6
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReduceItem $reduceItem)
    {
<<<<<<< HEAD
        $reduceItem->delete();
=======
        if(!Gate::allows(['admin'])){
            abort(403);
        }

        $reduceItem->delete();
        return "ReduceItem_destroy";
>>>>>>> d8209e76a2eaced5662b969ede07012d601a8cd6
    }
}
