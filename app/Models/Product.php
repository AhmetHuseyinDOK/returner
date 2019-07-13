<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';

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
                  'client_id',
                  'client_product_id',
                  'url',
                  'name',
                  'price'
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

    public function views(){
        return $this->hasMany('App\Models\View');
    }

}
