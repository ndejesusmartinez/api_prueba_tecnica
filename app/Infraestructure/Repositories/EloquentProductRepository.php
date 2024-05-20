<?php

namespace App\Infraestructure\Repositories;

use App\Core\Entities\products;
use App\Core\Repositories\ProductRepository;
use App\Core\Entities\categories_products;

class EloquentProductRepository implements ProductRepository {

    public function create($product)
    {
        $data = new products([
            'name' => $product->name,
            'price' => $product->price,
            'stock' => $product->stock,
        ]);

        $data->save();

        $categories_products = new categories_products([
            'products_id' => $data->id,
            'categories_id' => $product->category
        ]);
        $categories_products->save();

        return $data;
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

    public function getAll() 
    {
        return products::all();
    }

    public function getListPrice($filters, $request)
    {
        $query = products::select('name', 'price');

        if (isset($request['category_id'])) {
            $query->whereHas('categories', function ($q) use ($request) {
                $q->where('categories.id', $request['category_id']);
            });
        }

        if (isset($request['price_min'])) {
            $query->where('price', '>=', $request['price_min']);
        }

        if (isset($request['price_max'])) {
            $query->where('price', '<=', $request['price_max']);
        }

        $products = $query->get();

        return json_decode($products);
    }

    public function delete($id)
    {
        $product = products::findOrFail($id);

        $product->delete();
        return $product;
    }

    public function findById($id) 
    {
        $product = products::find($id);

        if ($product) {
            return products::find($id);
        } else {
            return response(["message" => "Producto con Id $id no encontrado"], 404);
        }
    }
}