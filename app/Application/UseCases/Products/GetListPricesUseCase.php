<?php

namespace App\Application\UseCases\Products;

use App\Core\Repositories\ProductRepository;

class GetListPricesUseCase 
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function execute($filters, $request)
    {
        return $this->productRepository->getListPrice($filters, $request);
    }
}