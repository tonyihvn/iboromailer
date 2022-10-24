<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class projects extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function business()
    {
        return $this->belongsTo(businesses::class, 'id', 'business_id');
    }

    public function milestones()
    {
        return $this->hasMany(project_milestones::class, 'project_id', 'id');
    }
}
