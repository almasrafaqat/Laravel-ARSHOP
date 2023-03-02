<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function get_categories(){
        try {
            $categories = Category::with(['childes.childes'])->where(['position' => 0])->get();
            return response()->json($categories, 200);
        } catch (\Exception $e) {
            return response()->json([], 200);
        }
    }
}
