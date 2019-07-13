<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class ViewController extends Controller
{
    public function create(Request $request){
        return response()->json($request->client);
    }       
}
