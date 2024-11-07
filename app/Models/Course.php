<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nama_mata_kuliah',
        'kode_mata_kuliah',
        'deskripsi',
        'tanggal_mulai',
        'tanggal_selesai',
        'dosen_id',
    ];

    public function dosen()
    {
        return $this->belongsTo(User::class, 'dosen_id', 'id');
    }

    // public function students()
    // {
    //     return $this->belongsToMany(User::class, 'course_user', 'course_id', 'user_id')
    //                 ->withTimestamps();
    // }

    public function students()
    {
        return $this->belongsToMany(User::class, 'course_users', 'course_id', 'user_id');
    }
    // public function students()
    // {
    //     return $this->belongsToMany(User::class, 'course_user');
    // }

    public function materials()
    {
        return $this->hasMany(Material::class, 'course_id', 'course_id');
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class, 'course_id', 'course_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'course_users', 'course_id', 'user_id');
    }

    public function userss()
{
    return $this->belongsToMany(User::class, 'courseuser');
}
}
