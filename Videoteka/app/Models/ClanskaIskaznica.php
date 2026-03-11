<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClanskaIskaznica extends Model
{
    protected $table="clanska_iskaznica";
    protected $primaryKey = 'broj_iskaznice';
    public $timestamps = false;
    protected $fillable = [
        "broj_iskaznice",
        "oib_videoteke",
        "oib_clana",
        "datum_uclanjenja"
    ];
    protected $casts = [
        "broj_iskaznice"=>"string",
        "oib_videoteke"=>"string",
        "oib_clana"=>"string",
        "datum_uclanjenja"=>"date"
    ];
    //1 članska iskaznica pripada jednoj videoteci
    public function videoteke(){
        return $this->belongsTo(Videoteka::class,'oib_videoteke');
    }
    //jedna članska iskaznica treba pripadati jednom članu u jednoj videoteci
    public function clan(){
        return $this->belongsTo(Clan::class);
    }
}
