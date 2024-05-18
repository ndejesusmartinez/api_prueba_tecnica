<?php

namespace App\Application\UseCases\Users;

use App\Core\Repositories\UserRepository;

class UpdateUserUseCase {
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute($id, $userData) 
    {
        return $this->userRepository->update($id, $userData);
    }

}