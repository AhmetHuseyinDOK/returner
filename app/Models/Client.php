<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'clients';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'company_name',
                  'api_customer_url',
                  'api_coupon_url',
                  'user_id',
                  'host',
                  'os_app_id',
                  'os_api_key'
              ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];
    
    /**
     * Get the user for this model.
     *
     * @return App\Models\User
     */
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function customers(){
        return $this->hasMany('App\Models\Customer','client_id');
    }

    public function products(){
        return $this->hasMany('App\Models\Product','client_id');
    }

    public function createCouponCode($customer,$product){
        $client = new \GuzzleHttp\Client();

        $url = $this->api_coupon_url;
        
        $body = [
            "customer_id" =>$customer->client_customer_id,
            "product_id"=>$product->client_product_id
        ];
        
        $response = $client->request('POST',$url, [\GuzzleHttp\RequestOptions::JSON => $body] );
        $data = json_decode($response->getBody()->getContents(),true);
        $data['product_id'] = $product->id;
        $coupon = CouponCode::make($data);
        $coupon->product_id = $product->id;
        $coupon->customer_id = $customer->id;
        $coupon->save();
        
        return $coupon;
    }

    public function getScriptAttribute(){
        return view('user.script',['client'=>$this])->render();
    }

}
