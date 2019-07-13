<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;
use Exception;

class OrdersController extends Controller
{

    /**
     * Display a listing of the orders.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $orders = Order::with('customer')->paginate(25);

        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new order.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $customers = Customer::pluck('name','id')->all();
        
        return view('orders.create', compact('customers'));
    }

    /**
     * Store a new order in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Order::create($data);

            return redirect()->route('orders.order.index')
                ->with('success_message', 'Order was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified order.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $order = Order::with('customer')->findOrFail($id);

        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified order.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $customers = Customer::pluck('name','id')->all();

        return view('orders.edit', compact('order','customers'));
    }

    /**
     * Update the specified order in the storage.
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
            
            $order = Order::findOrFail($id);
            $order->update($data);

            return redirect()->route('orders.order.index')
                ->with('success_message', 'Order was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified order from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $order = Order::findOrFail($id);
            $order->delete();

            return redirect()->route('orders.order.index')
                ->with('success_message', 'Order was successfully deleted.');
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
                'customer_id' => 'nullable', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
