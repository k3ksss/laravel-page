<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pavadzime extends Model
{
    protected $table = 'pavadzime';


    public function Darbinieki(){
     return $this->belongsToMany(Darbinieki::class);
 }

 public function Filiales(){
     return $this->belongsTo(Filiale::class);
 }

    public function Kabineti(){
        return $this->belongsToMany(Kabineti::class);
    }
    public function Mazvertigie(){
        return $this->belongsTo(Mazvertigie::class);
    }
    public function Pamatlidzekli(){
        return $this->belongsTo(Pamatlidzekli::class);
    }

}
