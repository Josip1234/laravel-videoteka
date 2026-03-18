<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $table="film";
    public $timestamps = false;
    protected $primaryKey = 'id_filma';
    protected $fillable = [
        "naziv",
        "dostupneKolicine",
        "broj_medija",
        "broj_zanra"
    ];
    public function medij(){
        return $this->hasMany(Medij::class);
    }
    public function zanr(){
        return $this->hasMany(Zanr::class);
    }
    protected $casts = [
        "dostupneKolicine"=>'integer',
        "broj_medija"=>'integer',
        "broj_zanra"=>'integer'
    ];
    public function cjenik(){
        return $this->belongsTo(Cjenik::class,"id_filma");
    }
}
