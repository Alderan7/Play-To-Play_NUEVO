<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectCommentary extends Model
{
    protected $table = "project_commentaries";
    protected $fillable = ["id_project", "id_user", "commentary"];
}
