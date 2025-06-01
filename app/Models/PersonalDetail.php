<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'full_name',
        'phone_number',
        'address',
        'email',
        'date_of_birth',
        'photo_path',
    ];

    protected $primaryKey = 'id';

    public $incrementing = false;
    public $timestamps = true;

    public function designations()
    {
        return $this->hasMany(Designation::class, 'personal_details_id');
    }

    public function objectives()
    {
        return $this->hasMany(Objective::class, 'personal_details_id');
    }

    public function skills()
    {
        return $this->hasMany(Skill::class, 'personal_details_id');
    }

    public function educations()
    {
        return $this->hasMany(Education::class, 'personal_details_id');
    }

    public function experiences()
    {
        return $this->hasMany(Experience::class, 'personal_details_id');
    }

    public function languages()
    {
        return $this->hasMany(Language::class, 'personal_details_id');
    }

    public function projects()
    {
        return $this->hasMany(Project::class, 'personal_details_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
