<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $foreignKey = 'customer_id';
    protected $fillable = [
	'order_no',
	'customer_id',
    ];
    // public $timestamps = false;

    public function customer() {
	return $this->belongsTo('App\Customer');
    }
}