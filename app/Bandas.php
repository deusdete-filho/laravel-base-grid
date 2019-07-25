<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bandas extends Model
{
    protected $fillable = [
        'name','imagem'
    ];

    public function produtos()
    {
        return $this->belongsToMany(Produtos::class);
    }

    public function teste(){
        return $this->belongsTo();
    }
}
