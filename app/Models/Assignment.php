<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'deskripsi',
        'due_date',
        'course_id',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'course_id');
    }

    public function submissions()
    {
        return $this->hasMany(Submission::class, 'assignment_id', 'id');
    }
}
