<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = ['personal_details_id', 'skill_name', 'skill_level'];

    public function personalDetail()
    {
        return $this->belongsTo(PersonalDetail::class);
    }
}
