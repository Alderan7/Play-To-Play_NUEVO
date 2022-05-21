<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public $timestamps = false;
    protected $table = "games";
    protected $fillable = ["name", "genre", "cover", "video", "text1", "text2", "text3", "price", "archives"];
}
