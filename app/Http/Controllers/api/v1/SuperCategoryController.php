<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\SuperCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SuperCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Gate::allows(['admin', 'operator'])){
            abort(403);
        }

        $superCategories = SuperCategory::latest()->get();
        return response([
            'success' => true,
            'message' => 'List Record SuperCategory',
            'data' => $superCategories
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
        if(!Gate::allows(['admin'])){
            abort(403);
        }

        return "SuperCategory_create";
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
            'name' => 'required',
            'is_loanable' => 'required',
        ];

        $validatedRequest = $request->validate($rules);
        $superCategory = SuperCategory::create($validatedRequest);

        return response()->json([
            'data' => $superCategory
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SuperCategory  $superCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SuperCategory $superCategory)
    {
        if(!Gate::allows(['admin', 'operator'])){
            abort(403);
        }

        if ($superCategory) {
            return response()->json([
                'success' => true,
                'message' => 'Detail SuperCategory!',
                'data'    => $superCategory
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
     * @param  \App\Models\SuperCategory  $superCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SuperCategory $superCategory)
    {
        //
        if(!Gate::allows(['admin'])){
            abort(403);
        }

        return "SuperCategory_edit";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SuperCategory  $superCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SuperCategory $superCategory)
    {
        $rules = [
            'name' => 'required',
            'is_loanable' => 'required',
        ];

        $validatedRequest = $request->validate($rules);

        $updatedSuperCategory = SuperCategory::where('id', $superCategory->id)
            ->update($validatedRequest);

        return response()->json([
            'data' =>  $updatedSuperCategory
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SuperCategory  $superCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SuperCategory $superCategory)
    {
        if(!Gate::allows(['admin'])){
            abort(403);
        }

        $superCategory->delete();
        return "SuperCategory_destroy";
    }
}
