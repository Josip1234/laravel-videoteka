<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clan extends Model
{
    protected $table='clan';
    protected $primaryKey = 'oib';
    public $timestamps = false;
    protected $fillable = [
        'oib',
        'ime',
        'prezime',
        'email',
        'adresa',
        'broj_telefona',
        'spol',
        'datumRodjenja'
    ];
    //jedan član može imati više iskaznica (samo jednu od jedne videoteke)
    public function clanskaIskaznica(){
        return $this->hasMany(ClanskaIskaznica::class);
    }

    protected $casts = [
        "datumRodjenja"=>"date"
    ];
}
