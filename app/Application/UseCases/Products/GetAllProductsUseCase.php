<?php

namespace App\Application\UseCases\Products;

use App\Core\Repositories\ProductRepository;

class GetAllProductsUseCase {
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function execute(array $filters): array
    {
        return $this->productRepository->getAll($filters);
    }

}