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
        //TODO: buat peminjam cuman nunjukin request yg dia buat
        if(!Gate::allows(['user'])){


            $loanRequests = LoanRequest::latest()->get();

            return view('pengajuan-peminjaman-operator', [
                'data_loanRequests' => $loanRequests
            ]);
        } else if(!Gate::allows(['admin', 'operator'])){
            $user_id = auth()->user()->id;
            $loanRequests = LoanRequest::where('created_by', $user_id)->get();

            return view('permohonan-user', [
                'data_loanRequests' => $loanRequests
            ]);
        }
        

        return "error";
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
            'path_file_cdn' => 'required',
            'status' => 'required',
            'note' => 'required',
            'id_item' => 'required',
        ];

        $validatedRequest = $request->validate($rules);
        $loanRequest = LoanRequest::create($validatedRequest);

        return $loanRequest;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LoanRequest  $loanRequest
     * @return \Illuminate\Http\Response
     */
    public function show(LoanRequest $loanRequest)
    {
        return $loanRequest;
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

        // return $loanRequest;
        return view('ubah-status', [
            'data_loanRequest' => $loanRequest
        ]);
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
        // return $request;
        $rules = [
            // 'loan_date' => 'required',
            // 'max_return_date' => 'required',
            // 'path_file_cdn' => 'required',
            'status' => 'required',
            // 'note' => 'required',
            // 'id_item' => 'required',
        ];
        
        $validatedRequest = $request->validate($rules);

        $updatedLoanRequest = LoanRequest::where('id', $loanRequest->id)
            ->update($validatedRequest);

        return redirect("/pengajuan-peminjaman-operator");
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
