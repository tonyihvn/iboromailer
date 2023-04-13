<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tasks extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function school()
    {
        return $this->belongsTo(school::class, 'school_id', 'id');
    }

    public function assignedTo()
    {
        return $this->hasOne(User::class, 'id', 'assigned_to');
    }

    public function createdBy()
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }



}
