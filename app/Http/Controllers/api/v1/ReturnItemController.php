<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\ReturnItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ReturnItemController extends Controller
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

        $returnItems = ReturnItem::latest()->get();
        // return response([
        //     'success' => true,
        //     'message' => 'List Record ReturnItem',
        //     'data' => $returnItems
        // ], 200);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // if(!Gate::allows(['admin', 'operator'])){
        //     abort(403);
        // }

        return "ReturnItem_create";
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
            'return_date' => 'required',
            'note' => 'required',
            'id_loan' => 'required',
        ];

        $validatedRequest = $request->validate($rules);
        $returnItem = ReturnItem::create($validatedRequest);

        return response()->json([
            'data' => $returnItem
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReturnItem  $returnItem
     * @return \Illuminate\Http\Response
     */
    public function show(ReturnItem $returnItem)
    {
        // if(!Gate::allows(['admin', 'operator'])){
        //     abort(403);
        // }

        if ($returnItem) {
            return response()->json([
                'success' => true,
                'message' => 'Detail ReturnItem!',
                'data'    => $returnItem
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
     * @param  \App\Models\ReturnItem  $returnItem
     * @return \Illuminate\Http\Response
     */
    public function edit(ReturnItem $returnItem)
    {
        //
        // if(!Gate::allows(['admin', 'operator'])){
        //     abort(403);
        // }

        return "ReturnItem_edit";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReturnItem  $returnItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReturnItem $returnItem)
    {
        $rules = [
            'return_date' => 'required',
            'note' => 'required',
            'id_loan' => 'required',
        ];

        $validatedRequest = $request->validate($rules);

        $updatedReturnItem = ReturnItem::where('id', $returnItem->id)
            ->update($validatedRequest);

        return response()->json([
            'data' =>  $updatedReturnItem
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReturnItem  $returnItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReturnItem $returnItem)
    {
        // if(!Gate::allows(['admin'])){
        //     abort(403);
        // }

        $returnItem->delete();
        return "ReturnItem_destroy";
    }
}
