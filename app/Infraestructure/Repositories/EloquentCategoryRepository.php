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

    public function getAll()
    {
        $query = categories::query();
        return $query->get()->toArray();
    }

    public function delete($id)
    {
        $category = categories::findOrFail($id);

        $category->delete();
        return $category;
    }

    public function findById($id) 
    {
        return categories::find($id);
    }
}