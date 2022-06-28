<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';
    protected $primaryKey = 'id';
    protected $foreignKey = 'division_id, district_id, thana_id';
    protected $fillable = [
        'fname',
        'lname',
        'username',
        'password',
        'gender',
        'division_id',
        'district_id',
        'thana_id',
        'address',
        'status',
        'image'
    ];
    // public $timestamps = false;

    public function division()
    {
        return $this->belongsTo('App\Division');
    }
    public function district()
    {
        return $this->belongsTo('App\District');
    }
    public function thana()
    {
        return $this->belongsTo('App\Thana');
    }
    public function productPurchases()
    {
        return $this->hasMany('App\ProductPurchase');
    }
}
