<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class milestone_reports extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function business()
    {
        return $this->belongsTo(businesses::class, 'id', 'business_id');
    }

    public function milestone()
    {
        return $this->belongsTo(project_milestones::class, 'id', 'milestone_id');
    }
}
