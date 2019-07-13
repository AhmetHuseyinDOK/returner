<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Exception;

class OrderItemsController extends Controller
{

    /**
     * Display a listing of the order items.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $orderItems = OrderItem::with('order','product','coupon')->paginate(25);

        return view('order_items.index', compact('orderItems'));
    }

    /**
     * Show the form for creating a new order item.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $orders = Order::pluck('id','id')->all();
$products = Product::pluck('id','id')->all();
$coupons = Coupon::pluck('id','id')->all();
        
        return view('order_items.create', compact('orders','products','coupons'));
    }

    /**
     * Store a new order item in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            OrderItem::create($data);

            return redirect()->route('order_items.order_item.index')
                ->with('success_message', 'Order Item was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified order item.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $orderItem = OrderItem::with('order','product','coupon')->findOrFail($id);

        return view('order_items.show', compact('orderItem'));
    }

    /**
     * Show the form for editing the specified order item.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $orderItem = OrderItem::findOrFail($id);
        $orders = Order::pluck('id','id')->all();
$products = Product::pluck('id','id')->all();
$coupons = Coupon::pluck('id','id')->all();

        return view('order_items.edit', compact('orderItem','orders','products','coupons'));
    }

    /**
     * Update the specified order item in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            $orderItem = OrderItem::findOrFail($id);
            $orderItem->update($data);

            return redirect()->route('order_items.order_item.index')
                ->with('success_message', 'Order Item was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified order item from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $orderItem = OrderItem::findOrFail($id);
            $orderItem->delete();

            return redirect()->route('order_items.order_item.index')
                ->with('success_message', 'Order Item was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    
    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request 
     * @return array
     */
    protected function getData(Request $request)
    {
        $rules = [
                'order_id' => 'nullable',
            'product_id' => 'nullable',
            'quantity' => 'string|min:1|nullable',
            'coupon_id' => 'nullable', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
