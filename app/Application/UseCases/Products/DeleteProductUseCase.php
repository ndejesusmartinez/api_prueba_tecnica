<?php

namespace App\Application\UseCases\Products;

use App\Core\Repositories\ProductRepository;

class DeleteProductUseCase {
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function execute($id)
    {
        return $this->productRepository->delete($id);
    }

}