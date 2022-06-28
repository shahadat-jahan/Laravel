<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'districts';
    protected $primaryKey = 'id';
    protected $foreignKey  = 'division_id';
    protected $fillable =[
        'division_id',
        'name'
    ];

    public $timestamps = false;

    public function customer()
    {
        return $this->hasMany('App\Customer');
    }
    public function thana()
    {
        return $this->hasMany('App\Thana');
    }
    public function division()
    {
        return $this->belongsTo('App\Division');
    }
}