<?php

namespace App\Application\UseCases\Users;

use App\Core\Repositories\UserRepository;

class GetUserByIdUseCase {
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute($id) {
        return $this->userRepository->findById($id);
    }

}