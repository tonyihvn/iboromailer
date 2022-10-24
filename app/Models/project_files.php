<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project_files extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function business()
    {
        return $this->belongsTo(businesses::class, 'id', 'business_id');
    }

    public function project()
    {
        return $this->belongsTo(projects::class, 'id', 'project_id');
    }
}
