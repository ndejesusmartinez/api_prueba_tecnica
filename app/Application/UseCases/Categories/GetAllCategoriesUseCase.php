<?php

namespace App\Application\UseCases\Categories;

use App\Core\Repositories\CategoryRepository;

class GetAllCategoriesUseCase {
    private $categoriyRepository;

    public function __construct(CategoryRepository $categoriyRepository)
    {
        $this->categoriyRepository = $categoriyRepository;
    }

    public function execute()
    {
        return $this->categoriyRepository->getAll();
    }

}