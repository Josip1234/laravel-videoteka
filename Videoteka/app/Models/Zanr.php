<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Zanr extends Model
{
   protected $primaryKey = 'broj_zanra';
   public $timestamps = false;
   protected $table="zanr";
   protected $fillable = [
    "naziv"
   ];
   public function film(){
      return $this->belongsTo(Film::class);
   }
}
