<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PopisPosudjenih extends Model
{
    protected $table="popisposudjenih";
    public $timestamps = false;
    protected $primaryKey = 'brojPopisa';
    protected $fillable = [
        "datum_posudbe",
        "datum_vracanja",
        "id_filma"
    ];
    protected $casts = [
        "datum_posudbe"=>"date",
        "datum_vracanja"=>"date"
    ];
    //popis može imati više filmova
    public function film(){
        return $this->hasMany(Film::class,'id_filma');
    }
}
