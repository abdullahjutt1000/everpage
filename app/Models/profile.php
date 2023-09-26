<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    use HasFactory;
    public $table = 'profile';

    public function likes()
    {
        return $this->hasMany(like::class, 'profile_id');
    }
    public function text()
    {
        return $this->hasMany(section_text::class, 'profile_id');
    }


}