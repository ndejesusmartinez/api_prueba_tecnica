<?php

namespace App\Application\UseCases\Categories;

use App\Core\Repositories\CategoryRepository;

class GetCategorieByIdUseCase 
{
    private $categoriyRepository;

    public function __construct(CategoryRepository $categoriyRepository)
    {
        $this->categoriyRepository = $categoriyRepository;
    }

    public function execute(int $id) {
        return $this->categoriyRepository->findById($id);
    }
}