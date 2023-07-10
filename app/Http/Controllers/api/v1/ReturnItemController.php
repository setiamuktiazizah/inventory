<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\ReturnItem;
use App\Models\LoanItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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

        return view('pengembalian-operator', [
            'data_returnItems' => $returnItems
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // TODO: belum jalan filternya
        $unreturnedLoanItems = LoanItem::latest()->get();

        return view('tambah-pengembalian', [
            'data_unreturnedLoanItems' => $unreturnedLoanItems
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
            'return_date' => 'required',
            'note' => 'required',
            'id_loan_item' => 'required',
        ];

        $validatedRequest = $request->validate($rules);
        $validatedRequest['created_by'] = Auth::user()->id;
        $validatedRequest['created_at'] = Carbon::now();

        $returnItem = ReturnItem::create($validatedRequest);

        return redirect('pengembalian-operator');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReturnItem  $returnItem
     * @return \Illuminate\Http\Response
     */
    // public function show(ReturnItem $returnItem)
    // {
    //     // if(!Gate::allows(['admin', 'operator'])){
    //     //     abort(403);
    //     // }

    //     if ($returnItem) {
    //         return response()->json([
    //             'success' => true,
    //             'message' => 'Detail ReturnItem!',
    //             'data'    => $returnItem
    //         ], 200);
    //     } else {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Data Tidak Ditemukan!',
    //             'data'    => ''
    //         ], 401);
    //     }
    // }

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
