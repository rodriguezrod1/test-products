<?php

namespace App\Http\Repositories\Contracts;

interface ProductRepositoryInterface
{
    // public function all($columns = ['*']);
    // public function paginate($perPage = 15, $columns = ['*']);
    public function filterAndSort($search, $sortField, $sortOrder);
}
