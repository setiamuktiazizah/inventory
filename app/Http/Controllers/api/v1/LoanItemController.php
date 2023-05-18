<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\LoanItem;
use Illuminate\Http\Request;

class LoanItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loanItems = LoanItem::latest()->get();
        return response([
            'success' => true,
            'message' => 'List Record LoanItem',
            'data' => $loanItems
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'quantity' => 'required',
            'max_return_date' => 'required',
            'id_loan_request' => 'required',
            'id_item' => 'required',
        ];

        $validatedRequest = $request->validate($rules);
        $loanItem = LoanItem::create($validatedRequest);

        return response()->json([
            'data' => $loanItem
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LoanItem  $loanItem
     * @return \Illuminate\Http\Response
     */
    public function show(LoanItem $loanItem)
    {
        if ($loanItem) {
            return response()->json([
                'success' => true,
                'message' => 'Detail LoanItem!',
                'data'    => $loanItem
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
     * @param  \App\Models\LoanItem  $loanItem
     * @return \Illuminate\Http\Response
     */
    public function edit(LoanItem $loanItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LoanItem  $loanItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LoanItem $loanItem)
    {
        $rules = [
            'quantity' => 'required',
            'max_return_date' => 'required',
            'id_loan_request' => 'required',
            'id_item' => 'required',
        ];

        $validatedRequest = $request->validate($rules);

        $updatedLoanItem = LoanItem::where('id', $loanItem->id)
            ->update($validatedRequest);

        return response()->json([
            'data' =>  $updatedLoanItem
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LoanItem  $loanItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(LoanItem $loanItem)
    {
        $loanItem->delete();
    }
}
