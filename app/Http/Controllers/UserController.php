<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application\UseCases\Users\CreateUserUseCase;
use App\Application\UseCases\Users\GetAllUsersUseCase;
use App\Application\UseCases\Users\GetUserByIdUseCase;
use App\Application\UseCases\Users\UpdateUserUseCase;
use App\Application\UseCases\Users\DeleteUserUseCase;

class UserController extends Controller
{
    public function store(Request $request, CreateUserUseCase $useCase)
    {
        try {
            return $useCase->execute($request);
        } catch (\Throwable $th) {
            return response(["message" => 'Internal Server Error'], 500);
        }
    }

    public function index(GetAllUsersUseCase $useCase)
    {
        return $useCase->execute();
    }

    public function find(int $id, GetUserByIdUseCase $useCase) 
    {
        $user = $useCase->execute($id);
        return $user;
    }

    public function update(int $id, Request $request, UpdateUserUseCase $useCase)
    {
        try {
            return $useCase->execute($id, $request);
        } catch (\Throwable $th) {
            return response(["message" => 'Internal Server Error'], 500);
        }

    }

    public function destroy(int $id, DeleteUserUseCase $useCase)
    {
        try {
            return $useCase->execute($id);
        } catch (\Throwable $th) {
            return response(["message" => 'Internal Server Error'], 500);
        }
    }
}
