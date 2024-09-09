<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Profession extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    protected static function boot(): void
    {
        parent::boot();

        static::updated(static function (Profession $item) {
            if ($item->wasChanged('image_path') && $item->getOriginal('image_path')) {
                Storage::disk('public')->delete($item->getOriginal('image_path'));
            }
        });
    }
}
