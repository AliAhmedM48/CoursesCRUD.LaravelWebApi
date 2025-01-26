<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'instructor_name',
        'price',
        'duration'
    ];

    public function scopeByInstructor($query, $instructor_name)
    {
        return $query->where('instructor_name', $instructor_name);
    }
}
