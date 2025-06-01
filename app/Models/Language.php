<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    protected $fillable = ['personal_details_id', 'language_name', 'proficiency'];

    public function personalDetail()
    {
        return $this->belongsTo(PersonalDetail::class);
    }
}
