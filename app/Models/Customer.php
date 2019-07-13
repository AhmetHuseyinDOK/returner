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

    }

}
