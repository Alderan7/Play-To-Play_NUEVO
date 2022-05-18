<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    public $timestamps = false;

    protected $table = "portfolio";
    protected $fillable = ["id_project", "id_creator"];
}
