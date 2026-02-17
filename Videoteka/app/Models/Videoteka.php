<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Videoteka extends Model
{
    protected $table = 'videoteka';
    //nema id a u aplikaciji ovo moramo staviti da bi delete radio
    protected $primaryKey = 'oib';
    public $timestamps = false;
    protected $fillable = [
        "oib",
        "naziv",
        "adresa"
    ];


    protected function casts(): array
    {
        return [
            'oib'=>'string',
            'naziv'=>'string',
            'adresa'=>'string'
        ];
    }
}
