<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\LoanRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class LoanRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loanRequests = LoanRequest::latest()->get();
        return response([
            'success' => true,
            'message' => 'List Record LoanRequest',
            'data' => $loanRequests
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
            'loan_date' => 'required',
            'max_return_date' => 'required',
            // 'path_file_cdn' => 'required',
            'status' => 'required',
            // 'note' => 'required',
            'id_item' => 'required',
        ];

        $validatedRequest = $request->validate($rules);
        $loanRequest = LoanRequest::create($validatedRequest);

        return response()->json([
            'data' => $loanRequest
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LoanRequest  $loanRequest
     * @return \Illuminate\Http\Response
     */
    public function show(LoanRequest $loanRequest)
    {
        if ($loanRequest) {
            return response()->json([
                'success' => true,
                'message' => 'Detail LoanRequest!',
                'data'    => $loanRequest
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
     * @param  \App\Models\LoanRequest  $loanRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(LoanRequest $loanRequest)
    {
        //
        // if(!Gate::allows(['admin', 'operator'])){
        //     abort(403);
        // }

        return "LoanRequest_edit";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LoanRequest  $loanRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LoanRequest $loanRequest)
    {
        $rules = [
            'loan_date' => 'required',
            'max_return_date' => 'required',
            // 'path_file_cdn' => 'required',
            'status' => 'required',
            // 'note' => 'required',
            'id_item' => 'required',
        ];

        $validatedRequest = $request->validate($rules);

        $updatedLoanRequest = LoanRequest::where('id', $loanRequest->id)
            ->update($validatedRequest);

        return response()->json([
            'data' =>  $updatedLoanRequest
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LoanRequest  $loanRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(LoanRequest $loanRequest)
    {
        // if(!Gate::allows(['admin'])){
        //     abort(403);
        // }

        $loanRequest->delete();
        return "LoanRequest_destroy";
    }
}
