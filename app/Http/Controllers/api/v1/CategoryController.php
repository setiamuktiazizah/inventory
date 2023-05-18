<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
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

        $categories = Category::latest()->get();
        return response([
            'success' => true,
            'message' => 'List Record Category',
            'data' => $categories
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
        if(!Gate::allows(['admin', 'operator'])){
            abort(403);
        }

        return "Category_create";
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
            'quantity' => 'required',
            'id_super_category' => 'required',
            'id_item_unit' => 'required',
        ];

        $validatedRequest = $request->validate($rules);
        $category = Category::create($validatedRequest);

        return response()->json([
            'data' => $category
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        if(!Gate::allows(['admin', 'operator'])){
            abort(403);
        }

        if ($category) {
            return response()->json([
                'success' => true,
                'message' => 'Detail Category!',
                'data'    => $category
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
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
        if(!Gate::allows(['admin', 'operator'])){
            abort(403);
        }

        return "Category_edit";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $rules = [
            'name' => 'required',
            'quantity' => 'required',
            'id_super_category' => 'required',
            'id_item_unit' => 'required',
        ];

        $validatedRequest = $request->validate($rules);

        $updatedCategory = Category::where('id', $category->id)
            ->update($validatedRequest);

        return response()->json([
            'data' =>  $updatedCategory
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if(!Gate::allows(['admin'])){
            abort(403);
        }

        $category->delete();
        return "Category_destroy";
    }
}
