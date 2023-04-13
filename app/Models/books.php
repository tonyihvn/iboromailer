<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class books extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function checkouts()
    {
        return $this->hasMany(access::class, 'book_id', 'id');
    }

    public function stock()
    {
        return $this->hasOne(book_stock::class, 'book_id', 'id');
    }

    public function supplies()
    {
        return $this->hasMany(supplies::class, 'book_id', 'id');
    }


    public function school()
    {
        return $this->belongsTo(school::class, 'school_id', 'id');
    }
}
