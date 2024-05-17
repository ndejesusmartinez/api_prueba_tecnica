<?php

namespace App\Core\Repositories;

interface ProductRepository {

    
    public function create($product);
    public function update($id, $product);
    public function getAll($data);

}