<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['personal_details_id', 'project_name', 'description'];

    public function personalDetail()
    {
        return $this->belongsTo(PersonalDetail::class);
    }
}
