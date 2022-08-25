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
        if (!empty($filters['name'])) {
            $query = $query->where('name', 'like', '%' . $filters['name'] . '%'); 
        }
        if (isset($filters['status'])) {
            $query = $query->where('status', $filters['status']); 
        }
        return $query;
    }

    public function scopeCustomPaginate($query, $request) {
        $pageId = !empty($request['page_id']) ? $request['page_id'] : 0;
        $pageSize = !empty($request['page_size']) ? $request['page_size'] : 5;
        return $query->paginate($pageSize, ['*'], 'page', $pageId);
            
    }
}
