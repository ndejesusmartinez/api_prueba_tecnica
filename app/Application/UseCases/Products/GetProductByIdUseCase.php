<?php

namespace App\Application\UseCases\Products;

use App\Core\Repositories\ProductRepository;

class GetProductByIdUseCase 
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function execute(int $id) {
        return $this->productRepository->findById($id);
    }
}