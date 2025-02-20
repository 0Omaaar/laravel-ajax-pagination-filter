<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use DataTables;

class ProductController extends Controller
{
    public function index()
    {
        if (\request()->ajax()) {
            $data = Product::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->addColumn('image', function ($row) {
                    // Assuming the image path is stored in the 'image' column of the products table
                    $imageUrl = asset('images/' . $row->image); 
                    return '<img src="' . $imageUrl . '" alt="Product Image" width="50" height="50">';
                })
                ->rawColumns(['action']) // add image
                ->make(true);
        }
        return view('products');
    }
}
