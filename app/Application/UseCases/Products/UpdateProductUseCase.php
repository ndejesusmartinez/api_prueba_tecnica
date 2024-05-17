<?php

namespace App\Application\UseCases\Products;

use App\Core\Repositories\ProductRepository;

class UpdateProductUseCase {
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function execute($id, $product) {
        return $this->productRepository->update($id, $product);
    }

}