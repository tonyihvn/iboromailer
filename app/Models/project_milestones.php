<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project_milestones extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function business()
    {
        return $this->belongsTo(businesses::class, 'id', 'business_id');
    }

    public function project()
    {
        return $this->belongsTo(projects::class, 'project_id', 'id');
    }

    public function tasks()
    {
        return $this->hasMany(tasks::class, 'id', 'milestone_id');
    }
}
