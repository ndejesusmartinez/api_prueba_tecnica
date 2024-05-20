<?php

namespace App\Core\Repositories;

interface ProductRepository {

    
    public function create($product);
    public function update($id, $product);
    public function getAll();
    public function getListPrice($filters, $request);
    public function delete($id);
    public function findById($id);

}