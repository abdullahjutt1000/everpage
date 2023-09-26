<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class section_image extends Model
{
    use HasFactory;

    public function images()
    {
        return $this->hasMany(item_image::class, 'section_id');
    }
}