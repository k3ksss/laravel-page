<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Darbinieki extends Model
{
    protected $table = 'darbinieki';

    public function DarbiniekaPavadzime(){
        return $this->hasMany(Pavadzime::class);
    }


}
