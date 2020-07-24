<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kabineti extends Model
{
    protected $table = 'kabineti';
	public $timestamps = false;
    public function KabinetaPavadzime(){
        return $this->hasMany(Pavadzime::class);
    }
    public function filiales(){
        return $this->BelongsTo(Filiale::class);
    }

}
