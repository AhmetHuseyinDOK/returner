<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'customers';

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
                  'client_customer_id',
                  'name',
                  'email',
                  'phone',
                  'client_id'
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
     * Get the client for this model.
     *
     * @return App\Models\Client
     */
    public function client()
    {
        return $this->belongsTo('App\Models\Client','client_id');
    }

    public function findByClientIdOrFail($id){
        return Customer::where('client_customer_id',$id)->firstOrFail();
    }

    public function views(){
        return $this->hasMany('App\Models\View','customer_id');
    }

    public function couponCodes(){
        return $this->hasMany('App\Models\CouponCode','customer_id');
    }

    public function notify(){
        $client = new \GuzzleHttp\Client();

        $url = "https://onesignal.com/api/v1/notifications";
        $apiKey = "NmI0MmMzNWMtOGQwYS00OTZhLTg2M2ItNTQ3MmY5YzQxYjA0";
        $id = 1;//$this->client_customer_id;
        $token = "Basic ".$apiKey;
        $appId = "354edde5-17f5-436e-b16d-d8e0ef47f743";
        $body = [
            'content'=>[
                'tr' => 'Deneme'
            ],
            'app_id' => $appId,
            'include_external_user_ids'=>[$id]
        ];
        
        $response = $client->request('POST',$url, [
            \GuzzleHttp\RequestOptions::JSON => $body,
            'headers'  => [
                'Authorization' => 'Bearer ' . $token, 
                'Accept'        => 'application/json',
                'Charset'       => 'charset=utf-8',
            ]
            ] );
        
    }

}
