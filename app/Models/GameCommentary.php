<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameCommentary extends Model
{
    protected $table = "game_commentaries";
    protected $fillable = ["id_game", "id_user", "commentary"];
}
