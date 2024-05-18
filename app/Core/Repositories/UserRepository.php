<?php

namespace App\Core\Repositories;

interface UserRepository 
{
    public function create($user);
    public function getAll();
    public function findById($id);
    public function update($id, $userData);
    public function delete($id);
}