<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class item_image extends Model
{
    use HasFactory;
    protected $fillable = ['section_id', 'image_path'];

    public function item()
    {
        return $this->belongsTo(section_image::class, 'section_id');
    }
}