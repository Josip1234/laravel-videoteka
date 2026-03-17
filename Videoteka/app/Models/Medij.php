<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medij extends Model
{
    protected $table="medij";
    protected $primaryKey = 'broj_medija';
    public $timestamps = false;
    protected $fillable = [
        "naziv"
    ];
    public function film(){
        return $this->belongsTo(Film::class);
    }
}
