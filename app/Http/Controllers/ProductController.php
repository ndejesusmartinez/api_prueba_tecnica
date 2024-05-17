<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application\UseCases\Products\CreateProductUseCase;
use App\Application\UseCases\Products\UpdateProductUseCase;
use App\Application\UseCases\Products\GetAllProductsUseCase;
use App\Application\UseCases\Products\GetListPricesUseCase;

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
}
