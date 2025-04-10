<?php

namespace App\Http\Repositories;

use App\Http\Repositories\Contracts\ProductRepositoryInterface;
use App\Product;

class ProductRepository implements ProductRepositoryInterface
{

    protected $model;

    public function __construct(Product $model)
    {
        $this->model = $model;
    }


    public function filterAndSort($search = null, $sortField = null, $sortOrder = 'asc')
    {
        $query = $this->model->query();

        if ($search) {
            $query->where('name', 'like', "%{$search}%");
        }

        if ($sortField) {
            $query->orderBy($sortField, $sortOrder);
        }

        return $query;
    }
}
