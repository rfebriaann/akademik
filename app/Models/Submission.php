<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_path',
        'feedback',
        'grade',
        'assignment_id',
        'user_id',
    ];

    public function assignment()
    {
        return $this->belongsTo(Assignment::class, 'assignment_id', 'id');
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
