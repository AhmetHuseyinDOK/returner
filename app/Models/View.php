<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'views';

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
                  'user_id',
                  'product_id'
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
        return $this->belongsTo('App\Models\User','user_id');
    }

    /**
     * Get the product for this model.
     *
     * @return App\Models\Product
     */
    public function product()
    {
        return $this->belongsTo('App\Models\Product','product_id');
    }



}
