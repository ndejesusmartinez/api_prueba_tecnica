<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application\UseCases\Categories\CreateCategorieUseCase;
use App\Application\UseCases\Categories\UpdateCategorieUseCase;
use App\Application\UseCases\Categories\GetAllCategoriesUseCase;
use App\Application\UseCases\Categories\DeleteProductUseCase;

class CategoriesController extends Controller
{
    public function store(Request $request, CreateCategorieUseCase $useCase)
    {
        try {
            return $useCase->execute($request);
        } catch (\Throwable $th) {
            return response(["message" => 'Internal Server Error'], 500);
        }
    }

    public function update(int $id, Request $request, UpdateCategorieUseCase $useCase)
    {
        try {
            return $useCase->execute($id, $request);
        } catch (\Throwable $th) {
            return response(["message" => 'Internal Server Error'], 500);
        }
    }

    public function index(GetAllCategoriesUseCase $useCase)
    {
        try {
            return $useCase->execute($useCase);
        } catch (\Throwable $th) {
            return response(["message" => $th->getMessage().'Internal Server Error'], 500);
        }
    }

    public function destroy(int $id, DeleteProductUseCase $useCase)
    {
        try {
            return $useCase->execute($id);
        } catch (\Throwable $th) {
            return response(["message" => 'Internal Server Error'], 500);
        }
    }
}
