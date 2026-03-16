<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VrstaCjenika extends Model
{
    protected $table="vrsta_cjenika";
    protected $primaryKey = 'id_vrste_cjenika';
    public $timestamps = false;
    protected $fillable = [
        "naziv",
        "opis"
    ];
}
