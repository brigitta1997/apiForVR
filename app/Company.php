<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    protected $fillable = ['name','contactNum','address','user_id','logo'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
