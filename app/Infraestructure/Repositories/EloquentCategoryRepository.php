<?php

namespace App\Infraestructure\Repositories;

use App\Core\Entities\categories;
use App\Core\Repositories\CategoryRepository;

class EloquentCategoryRepository implements CategoryRepository {

    public function create($category)
    {
        $newCategory = new categories([
            'name' => $category->name,
        ]);

        $newCategory->save();

        return $newCategory;
    }

    public function update($id, $category)
    {
        $data = categories::findOrFail($id);

        $data->name = $category->name;
        $data->save();

        return $data;
    }
}