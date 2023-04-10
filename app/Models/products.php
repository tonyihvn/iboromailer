<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function business()
    {
        return $this->belongsTo(businesses::class, 'id', 'business_id');
    }

    public function subplans()
    {
        return $this->hasMany(subscription_plans::class, 'product_id', 'id');
    }

    public function subcribers()
    {
        return $this->hasMany(subscriptions::class, 'product_id', 'id');
    }

    public function supplier()
    {
        return $this->belongsTo(User::class, 'supplier_id', 'id');

    }

    public function product_files()
    {
        return $this->hasMany(product_files::class, 'product_id', 'id');

    }


}
