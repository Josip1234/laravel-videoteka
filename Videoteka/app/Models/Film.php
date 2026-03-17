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
        "dostupne_kolicine",
        "broj_medija",
        "broj_zanra"
    ];
    public function medij(){
        return $this->hasMany(Medij::class);
    }
    public function zanr(){
        return $this->hasMany(Zanr::class);
    }
}
