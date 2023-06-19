<?php

namespace App\Http\Controllers\api\v1;

// use Yajra\DataTables\Facades\DataTables;

use App\Http\Controllers\Controller;
use App\Models\AddItem;
use App\Models\Category;
use App\Models\User;
use App\Models\Item;
use App\Models\ItemUnit;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;
use DataTables;

class AddItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        $category = Category::all();
        $addItems = AddItem::latest()->get();
        // $addItems = AddItem::all();
        $item = Item::all();
        $itemUnit = ItemUnit::all();
        // return response([
        //     'success' => true,
        //     'message' => 'List Record AddItem',
        //     'data' => $addItems
        // ], 200);
        return view('pengadaan-barang', ['addItems' => $addItems, 'users' => $user, 'categories' => $category, 'items' => $item, 'itemUnits' => $itemUnit]);
        // if(!Gate::allows(['admin', 'operator'])){
        //     abort(403);
        // }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //TODO: nunggu view create addItems
        // if(!Gate::allows(['admin'])){
        //     abort(403);
        // }
        $user = User::all();
        $category = Category::all();
        $addItem = AddItem::latest()->get();
        // $addItems = AddItem::all();
        $item = Item::all();
        $itemUnit = ItemUnit::all();

        return view('tambah-pengadaan', ['addItems' => $addItem, 'users' => $user, 'categories' => $category, 'items' => $item, 'itemUnits' => $itemUnit]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'date' => 'required',
            'name' => 'required',
            'brand' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'barcode' => 'required',
        ]);

        AddItem::create([
            'date' => $request->date,
            'name' => $request->name,
            'brand' => $request->brand,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'id_category' => $request->id_category,
            'barcode' => $request->barcode,
            'cause' => $request->cause,
            'created_by' => '1',
            'updated_by' => 'NULL',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return redirect('/pengadaan-barang');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AddItem  $addItem
     * @return \Illuminate\Http\Response
     */
    public function show(AddItem $addItem)
    {
        // if(!Gate::allows(['admin', 'operator'])){
        //     abort(403);
        // }

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
        // if(!Gate::allows(['admin'])){
        //     abort(403);
        // }
        // $category = Category::all();
        // $addItem = AddItem::all();
        // $addItem = AddItem::findOrFail($id);
        $category = Category::all();
        return view('edit-pengadaan', ['addItems' => $addItem, 'categories' => $category]);
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
        $validatedData = $request->validate([
            'date' => 'required',
            'name' => 'required',
            'brand' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'barcode' => 'required',
            'id_category' => 'required',
            'cause' => 'required'
        ]);

        $validatedData['date'] = $request->date;
        $validatedData['name'] = $request->name;
        $validatedData['brand'] = $request->brand;
        $validatedData['quantity'] = $request->quantity;
        $validatedData['price'] = $request->price;
        $validatedData['barcode'] = $request->barcode;
        $validatedData['id_category'] = $request->id_category;
        $validatedData['cause'] = $request->cause;
        $validatedData['created_by'] = $addItem['created_by'];
        $validatedData['updated_by'] = '1';
        $validatedData['created_at'] = Carbon::now();
        $validatedData['updated_at'] = Carbon::now();

        AddItem::where('id', $addItem->id)
            ->update($validatedData);

        return redirect('/pengadaan-barang');
        // //TODO: tambah cek rules
        // $rules = [
        //     'date' => 'required',
        //     'name' => 'required',
        //     'brand' => 'required',
        //     'quantity' => 'required',
        //     'price' => 'required',
        //     'cause' => 'required',
        //     'id_category' => 'required',
        //     'created_by' => 'required',
        //     //'edited_by' => 'required' //belom ada fieldnya
        // ];

        // $validatedRequest = $request->validate($rules);
        // // $validatedRequest['updated_by'] = auth()::user()->id;

        // $updatedAddItem = AddItem::where('id', $addItem->id)
        //     ->update($validatedRequest);

        // return response()->json([
        //     'data' =>  $updatedAddItem
        // ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AddItem  $addItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(AddItem $addItem)
    {
        // if(!Gate::allows(['admin'])){
        //     abort(403);
        // }

        $addItem->delete();
        return "AddItem_destroy";
    }
}
