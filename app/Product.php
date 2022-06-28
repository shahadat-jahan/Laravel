<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'code',
        'des',
        'status'
    ];
    public $timestamps = false;

    public function productPurchases()
    {
        return $this->hasMany('App\ProductPurchase');
    }
}
