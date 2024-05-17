<?php

namespace App\Application\UseCases\Categories;

use App\Core\Repositories\CategoryRepository;

class CreateCategorieUseCase {
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function execute($category) {
        return $this->categoryRepository->create($category);
    }

}