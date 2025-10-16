<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:4',
            'description' => 'nullable|max:1000'
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;

        try {
            $category->save();
            return response()->json([
                'Category' => $category
            ], 200);
        } catch (\Exception $exception) {
            return response()->json([
                'error' => 'Failed to save Category',
                'message' => $exception->getMessage()
            ], 500);
        }
    }

    public function index()
    {
        try {
            $category = Category::all();
            if ($category) {
                return response()->json([
                    'Category' => $category
                ], 200);
            } else {
                return "No category was found.";
            }
        } catch (\Exception $exception) {
            return response()->json([
                'error' => 'Failed to fetch Category',
                'message' => $exception->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            $category = Category::findOrFail($id);
            return response()->json([
                'Category' => $category
            ], 200);
        } catch (\Exception $exception) {
            return response()->json([
                'error' => 'Failed to fetch Category',
                'message' => $exception->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'name' => 'required|string|min:4',
            'description' => 'nullable|max:1000'
        ]);
        
        $category->name = $request->name;
        $category->description = $request->description;

        try {
            $category->save();
            return response()->json([
                'Category' => $category
            ], 200);
        } catch (\Exception $exception) {
            return response()->json([
                'error' => 'Failed to update Category',
                'message' => $exception->getMessage()
            ], 500);
        }
    }

    public function delete($id){
        $category = Category::findOrFail($id);
        if($category){
            try{
                $category->delete();
                return response()->json([
                    'Category Deleted Successsfully!'
                ], 200);
            }
            catch(\Exception $exception){
                return response()->json([
                    'error'=>$exception->getMessage(),
                    'message'=>'Failed to delete'
                ], 500);
            }
        }
        else{
            return "Category was not found";
        }
    }
}
