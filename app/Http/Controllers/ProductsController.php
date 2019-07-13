<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Product;
use Illuminate\Http\Request;
use Exception;

class ProductsController extends Controller
{

    /**
     * Display a listing of the products.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $products = Product::with('client')->paginate(25);

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new product.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $clients = Client::pluck('created_at','id')->all();
        
        return view('products.create', compact('clients'));
    }

    /**
     * Store a new product in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Product::create($data);

            return redirect()->route('products.product.index')
                ->with('success_message', 'Product was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified product.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $product = Product::with('client')->findOrFail($id);

        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified product.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $clients = Client::pluck('created_at','id')->all();

        return view('products.edit', compact('product','clients'));
    }

    /**
     * Update the specified product in the storage.
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
            
            $product = Product::findOrFail($id);
            $product->update($data);

            return redirect()->route('products.product.index')
                ->with('success_message', 'Product was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified product from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $product = Product::findOrFail($id);
            $product->delete();

            return redirect()->route('products.product.index')
                ->with('success_message', 'Product was successfully deleted.');
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
                'client_id' => 'nullable',
            'client_product_id' => 'nullable',
            'url' => 'string|min:1|nullable',
            'name' => 'string|min:1|max:255|nullable',
            'price' => 'string|min:1|nullable', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
