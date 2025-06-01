<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomField extends Model
{
    use HasFactory;

    protected $fillable = ['custom_section_id', 'field_name', 'field_details'];

    public function customSection()
    {
        return $this->belongsTo(CustomSection::class);
    }
}
