<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class businesses extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function businessgroup()
    {
        return $this->belongsTo(businessgroups::class, 'id', 'businessgroup_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function materials()
    {
        return $this->hasMany(materials::class, 'business_id', 'id');
    }

    public function suppliers()
    {
        return $this->hasMany(suppliers::class, 'business_id', 'id');
    }

    public function personnel()
    {
        return $this->hasMany(User::class, 'business_id', 'id');
    }







}
