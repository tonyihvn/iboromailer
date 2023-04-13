<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class supplies extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function supplier()
    {
        return $this->hasOne(User::class, 'id', 'supplier_id');
    }

    public function school()
    {
        return $this->belongsTo(school::class, 'school_id', 'id');
    }
}
