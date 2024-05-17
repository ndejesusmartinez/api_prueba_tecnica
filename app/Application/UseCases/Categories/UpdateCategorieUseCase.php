<?php

namespace App\Application\UseCases\Categories;

use App\Core\Repositories\CategoryRepository;

class UpdateCategorieUseCase {
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function execute($id, $category) {
        return $this->categoryRepository->update($id, $category);
    }

}