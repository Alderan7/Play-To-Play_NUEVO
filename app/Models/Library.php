<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    public $timestamps = false;

    protected $table = "library";
    protected $fillable = ["id_game", "id_player"];
}
