<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thana extends Model
{
    protected $table = 'thanas';
    protected $primaryKey = 'id';
    protected $foreignKey  = 'district_id';
    protected $fillable =[
        'district_id',
        'name'
    ];

    public $timestamps = false;

    public function customer()
    {
        return $this->hasMany('App\Customer');
    }

    public function district()
    {
        return $this->belongsTo('App\District');
    }
}