<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\LoanItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class LoanItemController extends Controller
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


        $loanItems = LoanItem::latest()->get();
        return view('peminjaman-barang', [
            'data_loanItems' => $loanItems
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    //     // if(!Gate::allows(['admin', 'operator'])){
    //     //     abort(403);
    //     // }
    // }
    // =====> automatically created everytime any LoanRequest got accepted

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'id_loan_request' => 'required',
            'status' => 'required'
        ];

        $validatedRequest = $request->validate($rules);
        $loanItem = LoanItem::create($validatedRequest);

        return $loanItem;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LoanItem  $loanItem
     * @return \Illuminate\Http\Response
     */
    public function show(LoanItem $loanItem)
    {
        // if(!Gate::allows(['admin', 'operator'])){
        //     abort(403);
        // }

        return $loanItem;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LoanItem  $loanItem
     * @return \Illuminate\Http\Response
     */
    // public function edit(LoanItem $loanItem)
    // {
    //     //
    //     // if(!Gate::allows(['admin', 'operator'])){
    //     //     abort(403);
    //     // }

    //     return "LoanItem_edit";
    // }

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
            'status' => 'required',
        ];

        $validatedRequest = $request->validate($rules);

        $updatedLoanItem = LoanItem::where('id', $loanItem->id)
            ->update($validatedRequest);

        return $updatedLoanItem;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LoanItem  $loanItem
     * @return \Illuminate\Http\Response
     */
    // public function destroy(LoanItem $loanItem)
    // {
    //     // if(!Gate::allows(['admin'])){
    //     //     abort(403);
    //     // }

    //     $loanItem->delete();
    //     return "LoanItem_destroy";
    // }

    // ===> undestroyable
}
