<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class section_text extends Model
{
    use HasFactory;

    public function profile()
    {
        return $this->belongsTo(profile::class);
    }

}