<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class events extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function registrations()
    {
        return $this->hasMany('App\registrations','event_id','id');
    }

    public function resources()
    {
        return $this->hasMany('App\Models\resources','event_id','id');
    }
}
