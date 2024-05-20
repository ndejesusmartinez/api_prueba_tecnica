<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application\UseCases\Products\CreateProductUseCase;
use App\Application\UseCases\Products\UpdateProductUseCase;
use App\Application\UseCases\Products\GetAllProductsUseCase;
use App\Application\UseCases\Products\GetListPricesUseCase;
use App\Application\UseCases\Products\DeleteProductUseCase;
use App\Application\UseCases\Products\GetProductByIdUseCase;
use App\Http\Requests\Product\ProductDTO;
use App\Http\Requests\Product\getPricesDTO;

class ProductController extends Controller
{

    /**
     * Get prices with filters
     *
     * @param Request $request fields: category_id, price_min, price_max optional as filters for your query
     * @param GetListPricesUseCase $useCase The GetListPricesUseCase instance to run the list prices.
     * @return JsonResponse The JSON response with the data.
     */
    public function getPrices(Request $request, GetListPricesUseCase $useCase)
    {
        try {
            return $useCase->execute($useCase, $request);
        } catch (\Throwable $th) {
            return response(["message" => $th->getMessage().'Internal Server Error'], 500);
        }
    }

    /**
     * Save new product
     *
     * @param ProductDTO $request Object with the admitted entry data
     * @param CreateProductUseCase $useCase The CreateProductUseCase instance to run the product creation.
     * @return JsonResponse The JSON response with the data of the created product.
     */
    public function store(ProductDTO $request, CreateProductUseCase $useCase)
    {
        try {
            return $useCase->execute($request);
        } catch (\Throwable $th) {
            return response(["message" => $th->getMessage().'Internal Server Error'], 500);
        }
    }

    /** 
     * Update an existing product. 
     * 
     * @param int $id The ID of the product to update. 
     * @param Request $request The Request object containing the updated data for the product. 
     * @param UpdateProductUseCase $useCase The instance of UpdateProductUseCase to execute the product update. 
     * @return JsonResponse The JSON response with the updated product data. 
     */ 
    public function update(int $id, Request $request, UpdateProductUseCase $useCase)
    {
        try {
            return $useCase->execute($id, $request);
        } catch (\Throwable $th) {
            return response(["message" => $th->getMessage().'Internal Server Error'], 500);
        }
    }

    
    /** 
     * Gets all products.
     * 
     * @param GetAllProductsUseCase $useCase Instance of the GetAllProductsUseCase class.
     * @return JsonResponse The result of the use case execution.
     */ 
    public function index(GetAllProductsUseCase $useCase)
    {
        try {
            return $useCase->execute($useCase);
        } catch (\Throwable $th) {
            return response(["message" => $th->getMessage().'Internal Server Error'], 500);
        }
    }

    /** 
     * Delete an existing product.
     * 
     * @param int $id The ID of the product to delete.
     * @param DeleteProductUseCase $useCase The DeleteProductUseCase instance to execute the product deletion.
     * @return JsonResponse The JSON response indicating the result of the deletion.
     */ 
    public function destroy(int $id, DeleteProductUseCase $useCase)
    {
        try {
            return $useCase->execute($id);
        } catch (\Throwable $th) {
            return response(["message" => 'Internal Server Error'], 500);
        }
    }

    /** 
     * Find a product by its ID.
     * 
     * @param int $id The ID of the product to search for.
     * @param GetProductByIdUseCase $useCase Instance of the GetProductByIdUseCase class.
     * @return JsonResponse The JSON response indicating the search result.
     */ 
    public function find(int $id, GetProductByIdUseCase $useCase) 
    {
        try {
            return $useCase->execute($id);
        } catch (\Throwable $th) {
            return response(["message" => 'Internal Server Error'], 500);
        }
    }
}
