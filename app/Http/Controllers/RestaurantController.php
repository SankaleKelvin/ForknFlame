<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:4',
            'address' => 'required|string',
            'description' => 'nullable|max:1000'
        ]);

        $restaurant = new Restaurant();
        $restaurant->name = $request->name;
        $restaurant->address = $request->address;
        $restaurant->description = $request->description;

        try {
            $restaurant->save();
            return response()->json([
                'Restaurant' => $restaurant
            ], 200);
        } catch (\Exception $exception) {
            return response()->json([
                'error' => 'Failed to save Restaurant',
                'message' => $exception->getMessage()
            ], 500);
        }
    }

    public function index()
    {
        try {
            $restaurant = Restaurant::all();
            if ($restaurant) {
                return response()->json([
                    'Restaurant' => $restaurant
                ], 200);
            } else {
                return "No restaurant was found.";
            }
        } catch (\Exception $exception) {
            return response()->json([
                'error' => 'Failed to fetch Restaurant',
                'message' => $exception->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            $restaurant = Restaurant::findOrFail($id);
            return response()->json([
                'Restaurant' => $restaurant
            ], 200);
        } catch (\Exception $exception) {
            return response()->json([
                'error' => 'Failed to fetch Restaurant',
                'message' => $exception->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        $restaurant = Restaurant::findOrFail($id);

        $request->validate([
            'name' => 'required|string|min:4',
            'address' => 'required|string',
            'description' => 'nullable|max:1000'
        ]);
        
        $restaurant->name = $request->name;
        $restaurant->address = $request->address;
        $restaurant->description = $request->description;

        try {
            $restaurant->save();
            return response()->json([
                'Restaurant' => $restaurant
            ], 200);
        } catch (\Exception $exception) {
            return response()->json([
                'error' => 'Failed to update Restaurant',
                'message' => $exception->getMessage()
            ], 500);
        }
    }

    public function delete($id){
        $restaurant = Restaurant::findOrFail($id);
        if($restaurant){
            try{
                $restaurant->delete();
                return response()->json([
                    'Restaurant Deleted Successsfully!'
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
            return "Restaurant was not found";
        }
    }
}
