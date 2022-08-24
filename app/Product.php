<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'name',
        'type',
        'brand',
        'code',
        'price',
        'description',
        'image',
        'status'
    ];

    public function scopeFilters($query, $filters) {
        if(!empty($filters['name'])) {
            $query = $query->where('name', 'like', '%' . $filters['name'] . '%'); 
        }
        if(isset($filters['status'])) {
            $query = $query->where('status', $filters['status']); 
        }
        return $query;
    }
}
