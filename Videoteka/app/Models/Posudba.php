<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Posudba extends Model
{
    protected $table="posudba";
    protected $primaryKey = 'broj_posudbe';
    public $timestamps = false;
    protected $fillable = [
        "broj_iskaznice",
        "zakasnina",
        "brojPopisa"
    ];
    protected $casts = [
        "broj_iskaznice"=>"string",
        "zakasnina"=>"double",
        "brojPopisa"=>"integer"
    ];
    //jedna posudba može imati više popisa
    public function popisposudjenih(){
        return $this->belongsTo(PopisPosudjenih::class,"brojPopisa");
    }
    //jedna ili više posudbi pripada članskoj iskaznici
    public function clanska_iskaznica(){
        return $this->belongsTo(ClanskaIskaznica::class,"broj_iskaznice");
    }
}
