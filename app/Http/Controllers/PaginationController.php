<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class PaginationController extends Controller
{
    public function index(Request $request){
        $items = Item::paginate(5);
        if($request->ajax()){
            return view('data', compact('items'));
        }
        return view('items', compact('items'));
    }

    public function search(Request $request){
        $query = $request->get('query');
        $items = Item::when($query, function($q) use ($query){
            return $q->where('title', 'like', "%{$query}%");
        })->paginate(5);
        return view('data', compact('items'));
    }
}
