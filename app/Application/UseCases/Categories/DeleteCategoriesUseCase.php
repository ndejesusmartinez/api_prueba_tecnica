<?php

namespace App\Application\UseCases\Categories;

use App\Core\Repositories\CategoryRepository;

class DeleteProductUseCase {
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function execute($id)
    {
        return $this->categoryRepository->delete($id);
    }

}