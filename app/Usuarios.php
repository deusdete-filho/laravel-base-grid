<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    protected $fillable = [
        'name'
    ];

    public function teste(){
        return $this->belongsTo();
    }
}
