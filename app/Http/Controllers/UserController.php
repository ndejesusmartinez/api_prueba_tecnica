<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application\UseCases\Users\CreateUserUseCase;
use App\Application\UseCases\Users\GetAllUsersUseCase;
use App\Application\UseCases\Users\GetUserByIdUseCase;
use App\Application\UseCases\Users\UpdateUserUseCase;
use App\Application\UseCases\Users\DeleteUserUseCase;
use App\Http\Requests\User\UserDTO;

class UserController extends Controller
{
    /**
     * Save new user
     *
     * @param UserDTO $request Object with the admitted entry data
     * @param CreateUserUseCase $useCase The CreateUserUseCase instance to run the user creation.
     * @return JsonResponse The JSON response with the data of the user product.
     */
    public function store(UserDTO $request, CreateUserUseCase $useCase)
    {
        try {
            return $useCase->execute($request);
        } catch (\Throwable $th) {
            return response(["message" => 'Internal Server Error'], 500);
        }
    }

    /** 
     * Gets all users.
     * 
     * @param GetAllUsersUseCase $useCase Instance of the GetAllUsersUseCase class.
     * @return JsonResponse The JSON response indicating the result.
     */ 
    public function index(GetAllUsersUseCase $useCase)
    {
        return $useCase->execute();
    }

    public function find(int $id, GetUserByIdUseCase $useCase) 
    {
        $user = $useCase->execute($id);
        return $user;
    }

    /** 
     * Find a user by its ID.
     * 
     * @param int $id The ID of the product to search for.
     * @param UpdateUserUseCase $useCase Instance of the UpdateUserUseCase class.
     * @return JsonResponse The JSON response indicating the search result.
     */ 
    public function update(int $id, Request $request, UpdateUserUseCase $useCase)
    {
        try {
            return $useCase->execute($id, $request);
        } catch (\Throwable $th) {
            return response(["message" => 'Internal Server Error'], 500);
        }

    }

    /** 
     * Delete an existing user.
     * 
     * @param int $id The ID of the product to delete.
     * @param DeleteUserUseCase $useCase The DeleteUserUseCase instance to execute the user deletion.
     * @return JsonResponse The JSON response indicating the result of the deletion.
     */ 
    public function destroy(int $id, DeleteUserUseCase $useCase)
    {
        try {
            return $useCase->execute($id);
        } catch (\Throwable $th) {
            return response(["message" => 'Internal Server Error'], 500);
        }
    }
}
