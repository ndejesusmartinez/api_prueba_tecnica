<?php

namespace App\Core\Repositories;

interface CategoryRepository {

    
    public function create($category);
    public function update($id, $category);
    public function getAll();
    public function delete($id);
}