<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Client;
use Illuminate\Http\Request;
use Exception;

class ClientsController extends Controller
{

    /**
     * Display a listing of the clients.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $clients = auth()->user()->clients()->paginate(25);

        return view('user.clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new client.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        return view('user.clients.create');
    }

    /**
     * Store a new client in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            auth()->user()->client()->create($data);

            return redirect()->route('user.clients.client.index')
                ->with('success_message', 'Client was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified client.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $client = auth()->user()->client()->findOrFail($id);

        return view('user.clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified client.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $client = auth()->user()->client()->findOrFail($id);
        

        return view('user.clients.edit', compact('client'));
    }

    /**
     * Update the specified client in the storage.
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
            
            $client = auth()->user()->client()->findOrFail($id);
            $client->update($data);

            return redirect()->route('user.clients.client.index')
                ->with('success_message', 'Client was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified client from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $client = auth()->user()->client()->findOrFail($id);
            $client->delete();

            return redirect()->route('user.clients.client.index')
                ->with('success_message', 'Client was successfully deleted.');
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
            'company_name' => 'string|min:1|nullable',
            'api_customer_url' => 'string|min:1|nullable',
            'api_coupon_url' => 'string|min:1|nullable',
            'user_id' => 'nullable',
            'host' => 'string|min:1|nullable',
            'os_app_id' => 'nullable|string|min:0',
            'os_api_key' => 'string|min:1|nullable', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
