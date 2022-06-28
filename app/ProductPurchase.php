<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPurchase extends Model {

    protected $table = 'product_purchases';
    protected $primaryKey = 'id';
    protected $foreignKey = 'order_id, product_id';
    protected $fillable = [
	'order_id',
	'product_id',
	'qty'
    ];
    public $timestamps = false;

    public function order() {
	return $this->belongsTo('App\Order');
    }

    public function product() {
	return $this->belongsTo('App\Product');
    }

}
