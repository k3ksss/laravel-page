<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pamatlidzekli extends Model
{

    protected $table = 'pamatlidzekli';

    public function PamatlidzekliPavadzime(){
        return $this->hasMany(Pavadzime::class);
    }


}
