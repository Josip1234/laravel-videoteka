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
        "datum_uclanjenja",
        "datum_isclanjenja"
    ];
    protected $casts = [
        "broj_iskaznice"=>"string",
        "oib_videoteke"=>"string",
        "oib_clana"=>"string",
        "datum_uclanjenja"=>"date",
        "datum_isclanjenja"=>"date"
    ];
    //1 članska iskaznica pripada jednoj videoteci
    public function videoteke(){
        return $this->belongsTo(Videoteka::class,'oib_videoteke');
    }
}
