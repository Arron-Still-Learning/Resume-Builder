<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $fillable = ['personal_details_id', 'institution', 'degree', 'start_date', 'end_date'];

    public function personalDetail()
    {
        return $this->belongsTo(PersonalDetail::class);
    }
}
