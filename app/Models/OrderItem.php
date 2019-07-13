<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'order_items';

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
                  'order_id',
                  'product_id',
                  'quantity',
                  'coupon_id'
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
     * Get the order for this model.
     *
     * @return App\Models\Order
     */
    public function order()
    {
        return $this->belongsTo('App\Models\Order','order_id');
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

    /**
     * Get the coupon for this model.
     *
     * @return App\Models\Coupon
     */
    public function coupon()
    {
        return $this->belongsTo('App\Models\Coupon','coupon_id');
    }



}
