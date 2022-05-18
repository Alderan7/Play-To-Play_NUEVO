<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public $timestamps = false;
    protected $table = "projects";
    protected $fillable = ["name", "genre", "cover", "text1", "text2", "text3", "pledge1", "pledge2", "pledge3", "image"];
}
