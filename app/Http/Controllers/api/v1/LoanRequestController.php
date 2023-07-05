<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\LoanRequest;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

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

            return view('peminjaman-user', [
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
    public function createStep1()
    {
        return view('peminjaman-1');
    }

    public function createStep2(Request $request)
    {
        $categories = DB::table('categories')
            ->join('super_categories', 'categories.id_super_category', '=', 'super_categories.id')
            ->select("categories.*")
            ->where('super_categories.is_loanable', true)
            ->get();

        // $users = DB::table('users')
        //     ->join('contacts', 'users.id', '=', 'contacts.user_id')
        //     ->join('orders', 'users.id', '=', 'orders.user_id')
        //     ->select('users.*', 'contacts.phone', 'orders.price')
        //     ->get();
        // return $request;
        $queried_id_items = $this->stringArrayToArray($request->id_items_string_array);
        $queried_items = Item::all()->whereIn('id', $queried_id_items);

        return view('peminjaman-2', [
            'data_categories' => $categories,
            'previous_request' => $request,
            // 'queried_id_items' => $queried_id_items,
            'queried_items' => $queried_items,
        ]);
    }

    public function createStep2Remove(Request $request)
    {
        $array = $request->id_items_string_array;
        $id = $request->id_item_to_be_removed;
        $request->id_items_string_array = $this->removeElementFromStringArray($array, $id);

        return $this->createStep2($request);
    }

    public function createStep3(Request $request)
    {
        $id_category = $request->id_category;
        $available_items = Item::getAvailableItems($id_category);
        $queried_id_items = $this->stringArrayToArray($request->id_items_string_array);

        $queried_items = Item::all()->whereIn('id', $queried_id_items);

        //TODO: validation
        return view('/peminjaman-3', [
            'previous_request' => $request,
            'available_items' => $available_items,
            // 'queried_id_items' => $queried_id_items,
            'queried_items' => $queried_items,
        ]);
    }
    
    public function createStep3Add(Request $request)
    {
        // array_push($request->id_items, $request->id_item);
        $request->id_items_string_array = $request->id_items_string_array . "," . $request->id_item;

        return $this->createStep2($request);
        // return $request;
    }

    public function createStep4(Request $request)
    {
        // $id_category = $request->id_category;
        // $available_items = Item::getAvailableItems($id_category);

        //TODO: validation
        return view('/peminjaman-4', [
            'previous_request' => $request,
            // 'available_items' => $available_items
        ]);
    }

    private function stringArrayToArray($string_array)
    {
        if(empty($string_array)){
            return [];
        }

        $string_array = substr($string_array, 1); // remove comma at the first index
        $array = explode(",", $string_array);
        return $array;
    }

    private function removeElementFromStringArray($string_array, $id)
    {
        return str_replace("," . $id, "", $string_array);
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
            // 'status' => 'required',
            'note' => 'required',
            // 'id_item' => 'required',
        ];

        $validatedRequest = $request->validate($rules);
        $validatedRequest['status'] = "pending";
        $validatedRequest['created_by'] = auth()->user()->id;
        $validatedRequest['id_items'] = $this->stringArrayToArray($request->id_items_string_array);
        // $validatedRequest['created_by'] = 1;

        // return $validatedRequest;

        // $loanRequest = LoanRequest::create($validatedRequest);
        $loanRequest = LoanRequest::customCreateNonSeeder(
            $validatedRequest['id_items'],
            $validatedRequest['loan_date'],
            $validatedRequest['max_return_date'],
            null, //path cdn
            $validatedRequest['status'],
            $validatedRequest['note'],
            $validatedRequest['created_by'],
            Carbon::now(), // created_at

        );

        return redirect('/peminjaman-user');
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
