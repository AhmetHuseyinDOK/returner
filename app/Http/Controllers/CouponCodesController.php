<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Product;
use App\Models\CouponCode;
use Illuminate\Http\Request;
use Exception;

class CouponCodesController extends Controller
{

    /**
     * Display a listing of the coupon codes.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $couponCodes = CouponCode::with('customer','product')->paginate(25);

        return view('coupon_codes.index', compact('couponCodes'));
    }

    /**
     * Show the form for creating a new coupon code.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $customers = Customer::pluck('name','id')->all();
$products = Product::pluck('name','id')->all();
        
        return view('coupon_codes.create', compact('customers','products'));
    }

    /**
     * Store a new coupon code in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            CouponCode::create($data);

            return redirect()->route('coupon_codes.coupon_code.index')
                ->with('success_message', 'Coupon Code was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified coupon code.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $couponCode = CouponCode::with('customer','product')->findOrFail($id);

        return view('coupon_codes.show', compact('couponCode'));
    }

    /**
     * Show the form for editing the specified coupon code.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $couponCode = CouponCode::findOrFail($id);
        $customers = Customer::pluck('name','id')->all();
$products = Product::pluck('name','id')->all();

        return view('coupon_codes.edit', compact('couponCode','customers','products'));
    }

    /**
     * Update the specified coupon code in the storage.
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
            
            $couponCode = CouponCode::findOrFail($id);
            $couponCode->update($data);

            return redirect()->route('coupon_codes.coupon_code.index')
                ->with('success_message', 'Coupon Code was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified coupon code from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $couponCode = CouponCode::findOrFail($id);
            $couponCode->delete();

            return redirect()->route('coupon_codes.coupon_code.index')
                ->with('success_message', 'Coupon Code was successfully deleted.');
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
            'code' => 'string|min:1|nullable',
            'expires' => 'string|min:1|nullable',
            'product_id' => 'nullable', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
