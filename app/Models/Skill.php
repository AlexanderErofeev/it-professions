<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\SkillController;

class Skill extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
}
