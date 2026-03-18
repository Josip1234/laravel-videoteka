<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cjenik extends Model
{
    protected $table="cjenik";
    public $timestamps = false;
    protected $primaryKey = 'id_cjenika';
    protected $fillable = [
        "id_filma",
        "oib_videoteke",
        "cijena_filma",
        "id_vrste_cjenika"
    ];
    protected $casts = [
        "cijena_filma"=>"double"
    ];

    public function videoteka(){
        return $this->belongsTo(Videoteka::class,"oib_videoteke","oib");
    }
    public function vrsta_cjenika(){
        return $this->hasMany(VrstaCjenika::class,"id_vrste_cjenika","id_vrste_cjenika");
    }
    public function film(){
        return $this->hasMany(Film::class,"id_filma","id_filma");
    }
    
}
