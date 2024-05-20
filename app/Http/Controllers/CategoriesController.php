<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application\UseCases\Categories\CreateCategorieUseCase;
use App\Application\UseCases\Categories\UpdateCategorieUseCase;
use App\Application\UseCases\Categories\GetAllCategoriesUseCase;
use App\Application\UseCases\Categories\DeleteCategoriesUseCase;
use App\Application\UseCases\Categories\GetCategorieByIdUseCase;
use App\Http\Requests\Category\CategoryDTO;

class CategoriesController extends Controller
{

    /**
     * Save new catergory
     *
     * @param CategoryDTO $request Object with the admitted entry data
     * @param CreateCategorieUseCase $useCase The CreateCategorieUseCase instance to run the category creation.
     * @return JsonResponse The JSON response with the data of the category.
     */
    public function store(CategoryDTO $request, CreateCategorieUseCase $useCase)
    {
        try {
            return $useCase->execute($request);
        } catch (\Throwable $th) {
            return response(["message" => 'Internal Server Error'], 500);
        }
    }

    /** 
     * Update an existing category. 
     * 
     * @param int $id The ID of the category to update. 
     * @param Request $request The Request object containing the updated data for the product. 
     * @param UpdateCategorieUseCase $useCase The instance of UpdateCategorieUseCase to execute the category update. 
     * @return JsonResponse The JSON response with the updated category data. 
     */ 
    public function update(int $id, Request $request, UpdateCategorieUseCase $useCase)
    {
        try {
            return $useCase->execute($id, $request);
        } catch (\Throwable $th) {
            return response(["message" => 'Internal Server Error'], 500);
        }
    }

    /** 
     * Gets all categories.
     * 
     * @param GetAllCategoriesUseCase $useCase Instance of the GetAllCategoriesUseCase class.
     * @return JsonResponse The result of the use case execution.
     */ 
    public function index(GetAllCategoriesUseCase $useCase)
    {
        try {
            return $useCase->execute($useCase);
        } catch (\Throwable $th) {
            return response(["message" => $th->getMessage().'Internal Server Error'], 500);
        }
    }

    /** 
     * Delete an existing category.
     * 
     * @param int $id The ID of the category to delete.
     * @param DeleteProductUseCase $useCase The DeleteProductUseCase instance to execute the category deletion.
     * @return JsonResponse The JSON response indicating the result of the deletion.
     */ 
    public function destroy(int $id, DeleteCategoriesUseCase $useCase)
    {
        try {
            return $useCase->execute($id);
        } catch (\Throwable $th) {
            return response(["message" => 'Internal Server Error'], 500);
        }
    }

    /** 
     * Find a category by its ID.
     * 
     * @param int $id The ID of the category to search for.
     * @param GetCategorieByIdUseCase $useCase Instance of the GetCategorieByIdUseCase class.
     * @return JsonResponse The JSON response indicating the search result.
     */ 
    public function find(int $id, GetCategorieByIdUseCase $useCase) 
    {
        try {
            return $useCase->execute($id);
        } catch (\Throwable $th) {
            return response(["message" => 'Internal Server Error'], 500);
        }
    }
}
