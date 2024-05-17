<?php

namespace App\Infraestructure\Repositories;

use App\Core\Entities\products;
use App\Core\Repositories\ProductRepository;

class EloquentProductRepository implements ProductRepository {

    public function create($product)
    {
        $product = new products([
            'name' => $product->name,
            'price' => $product->price,
            'stock' => $product->stock,
        ]);

        $product->save();

        return $product;
    }

    public function update($id, $product) 
    {
        $data = products::findOrFail($id);

        $data->name = $product->name;
        $data->price = $product->price;
        $data->stock = $product->stock;
        $data->save();

        return $data;
    }

    public function getAll($filters) 
    {
        $query = products::query();
        return $query->get()->toArray();
    }

    public function getListPrice()
    {
        $query = products::select('name','price')->where('stock','>', 0);
        return $query->get()->toArray();
    }

    public function delete($id)
    {
        $product = products::findOrFail($id);

        $product->delete();
        return $product;
    }
}