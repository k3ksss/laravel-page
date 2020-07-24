<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filiale extends Model
{
    protected $table = 'filiales';


    public function FilialesPavadzime(){
        return $this->hasMany(Pavadzime::class);
    }
    public function FilialesKabineti(){
        return $this->hasMany(Kabineti::class);
    }

}
