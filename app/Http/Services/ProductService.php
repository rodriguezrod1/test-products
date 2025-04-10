<?php

namespace App\Http\Services;

use App\Http\Repositories\Contracts\ProductRepositoryInterface;

class ProductService
{
    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }


    public function getFilteredProducts($search, $sortField, $sortOrder)
    {
        return $this->productRepository->filterAndSort($search, $sortField, $sortOrder)->paginate(10);
    }
}
