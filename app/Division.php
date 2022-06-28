<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $table = 'divisions';
    protected $primaryKey = 'id';
    protected $fillable =[
        'name'
    ];
    public $timestamps = false;

    public function customer()
    {
        return $this->hasMany('App\Customer');
    }

    public function district()
    {
        return $this->hasMany('App\District');
    }
}