<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\AddItem;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AddItemController extends Controller  
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
<<<<<<< HEAD
        $addItem = AddItem::latest()->get();
        $user = User::all();
        $category = Category::all();

        $data =  response([
            'success' => true,
            'message' => 'List Penambahan data',
            'data' => $addItem,
=======
        if(!Gate::allows(['admin', 'operator'])){
            abort(403);
        }

        $addItems = AddItem::latest()->get();
        return response([
            'success' => true,
            'message' => 'List Record AddItem',
            'data' => $addItems
>>>>>>> d8209e76a2eaced5662b969ede07012d601a8cd6
        ], 200);
        return view('pengadaan-barang', ['data_add' => $addItem, 'data_user' => $user, 'data_category' => $category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //TODO: nunggu view create addItems
        if(!Gate::allows(['admin'])){
            abort(403);
        }

        return "AddItem_create";
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
            'created_by' => 'required'
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
        if(!Gate::allows(['admin', 'operator'])){
            abort(403);
        }

        // error_log(getrout);
        if ($addItem) {
            return response()->json([
                'success' => true,
                'message' => 'Detail AddItem!',
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
        if(!Gate::allows(['admin'])){
            abort(403);
        }

        return "AddItem_edit";
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
            //'edited_by' => 'required' //belom ada fieldnya
        ];

        $validatedRequest = $request->validate($rules);
        // $validatedRequest['updated_by'] = auth()::user()->id;

        $updatedAddItem = AddItem::where('id', $addItem->id)
            ->update($validatedRequest);

        return response()->json([
            'data' =>  $updatedAddItem
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
        if(!Gate::allows(['admin'])){
            abort(403);
        }

        $addItem->delete();
        return "AddItem_destroy";
    }
}
