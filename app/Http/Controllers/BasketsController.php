<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Basket;
use Illuminate\Http\Request;
use Exception;

class BasketsController extends Controller
{

    /**
     * Display a listing of the baskets.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $baskets = Basket::with('customer')->paginate(25);

        return view('baskets.index', compact('baskets'));
    }

    /**
     * Show the form for creating a new basket.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $customers = Customer::pluck('name','id')->all();
        
        return view('baskets.create', compact('customers'));
    }

    /**
     * Store a new basket in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Basket::create($data);

            return redirect()->route('baskets.basket.index')
                ->with('success_message', 'Basket was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified basket.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $basket = Basket::with('customer')->findOrFail($id);

        return view('baskets.show', compact('basket'));
    }

    /**
     * Show the form for editing the specified basket.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $basket = Basket::findOrFail($id);
        $customers = Customer::pluck('name','id')->all();

        return view('baskets.edit', compact('basket','customers'));
    }

    /**
     * Update the specified basket in the storage.
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
            
            $basket = Basket::findOrFail($id);
            $basket->update($data);

            return redirect()->route('baskets.basket.index')
                ->with('success_message', 'Basket was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified basket from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $basket = Basket::findOrFail($id);
            $basket->delete();

            return redirect()->route('baskets.basket.index')
                ->with('success_message', 'Basket was successfully deleted.');
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
