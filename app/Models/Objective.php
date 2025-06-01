<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objective extends Model
{
    use HasFactory;

    protected $fillable = ['personal_details_id', 'objective'];

    public function personalDetail()
    {
        return $this->belongsTo(PersonalDetail::class);
    }
}
