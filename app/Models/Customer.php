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

public function notify($message){
    $client = new \GuzzleHttp\Client();

    $url = "https://onesignal.com/api/v1/notifications";

    $apiKey = $this->client->os_api_key;
    $id = $this->client_customer_id;
    $token = "Basic ".$apiKey;
    $appId = $this->client->os_app_id;
    
    $content      = array(
        "en" => $message
    );
    $hashes_array = array();
    // array_push($hashes_array, array(
    //     "id" => "like-button",
    //     "text" => "Like",
    //     "icon" => "http://i.imgur.com/N8SN8ZS.png",
    //     "url" => "https://yoursite.com"
    // ));
    // array_push($hashes_array, array(
    //     "id" => "like-button-2",
    //     "text" => "Like2",
    //     "icon" => "http://i.imgur.com/N8SN8ZS.png",
    //     "url" => "https://yoursite.com"
    // ));
    $fields = array(
        'app_id' => $appId,
        'include_external_user_ids' => array(
            $this->custemer_client_id//'All'
        ),
        'contents' => $content,
        // 'web_buttons' => $hashes_array
    );
    
    $fields = json_encode($fields);
    print("\nJSON sent:\n");
    print($fields);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json; charset=utf-8',
        'Authorization: Basic '.$apiKey
    ));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
    

    
}


    
}
