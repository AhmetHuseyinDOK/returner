<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
class ViewController extends Controller
{
    
    public function get(Request $request){
        return response()->json('got it');
    }

    public function create(Request $request){
        $customer = $request->client->customers()->where('client_customer_id',$request->customerId)->firstOrFail();
        $product = $request->client->products()->where('url',$request->productUrl)->firstOrFail();
        $customer->views()->create(['product_id'=>$product->id]);
        $viewCount = $product->views()->where([
                ["customer_id","=",$customer->id],
                ["created_at",">",Carbon::now()->subHours(6)]
            ])->count();
        if($viewCount > 3 && !$customer->couponCodes()->where('created_at',">",Carbon::yesterday())->exists()){
            $code = $request->client->createCouponCode($customer,$product);
            $customer->notify("Special For You, $product->name has $code->direct $ discount till end of the day,Buy Now!");
            return response()->json($code);
        }    
        return response()->json();
    }       


}
