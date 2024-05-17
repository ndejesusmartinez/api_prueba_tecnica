<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application\UseCases\Products\CreateProductUseCase;
use App\Application\UseCases\Products\UpdateProductUseCase;
use App\Application\UseCases\Products\GetAllProductsUseCase;
use App\Application\UseCases\Products\GetListPricesUseCase;
use App\Application\UseCases\Products\DeleteProductUseCase;

class ProductController extends Controller
{
    public function getPrices(GetListPricesUseCase $useCase)
    {
        try {
            return $useCase->execute();
        } catch (\Throwable $th) {
            return response(["message" => $th->getMessage().'Internal Server Error'], 500);
        }
    }

    public function store(Request $request, CreateProductUseCase $useCase)
    {
        try {
            return $useCase->execute($request);
        } catch (\Throwable $th) {
            return response(["message" => $th->getMessage().'Internal Server Error'], 500);
        }
    }

    public function update(int $id, Request $request, UpdateProductUseCase $useCase)
    {
        try {
            return $useCase->execute($id, $request);
        } catch (\Throwable $th) {
            return response(["message" => $th->getMessage().'Internal Server Error'], 500);
        }
    }

    public function index(Request $request, GetAllProductsUseCase $useCase)
    {
        $data = $request->input('data');
        try {
            return $useCase->execute($data);
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
