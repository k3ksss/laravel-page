<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mazvertigie extends Model
{
    protected $table = 'mazvertigie_lidzekli';

    public function MazvertigaPavadzime(){
        return $this->hasMany(Pavadzime::class);
    }

}
