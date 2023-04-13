<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class access extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function book()
    {
        return $this->hasOne(books::class, 'id', 'book_id');
    }

    public function borrower()
    {
        return $this->hasOne(User::class, 'id', 'student_id');
    }

    public function school()
    {
        return $this->belongsTo(school::class, 'school_id', 'id');
    }
}
