<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomSection extends Model
{
    use HasFactory;

    protected $fillable = ['personal_details_id', 'section_name'];

    public function personalDetail()
    {
        return $this->belongsTo(PersonalDetail::class);
    }

    public function customFields()
    {
        return $this->hasMany(CustomField::class);
    }
}
