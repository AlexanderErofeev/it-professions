<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\SkillController;
use Illuminate\Support\Facades\Storage;

class Skill extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected static function boot(): void
    {
        parent::boot();

        static::updated(static function (Skill $item) {
            if ($item->wasChanged('image_path') && $item->getOriginal('image_path')) {
                Storage::disk('public')->delete($item->getOriginal('image_path'));
            }
        });
    }
}
