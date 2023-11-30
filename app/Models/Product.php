<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use softDeletes;

    protected $table='products';
    protected $guarded=false;
    protected $casts = [
        'data' => 'array',
    ];


    public function scopeAvailable(Builder $query):void
    {
        $query->where('status', 'available');
    }
}
