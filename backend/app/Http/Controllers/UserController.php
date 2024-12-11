<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function __construct(protected UserService $userService){
    }

    public function store(UserRequest $request){
        $validatedData = $request->validated();
        $user = $this->userService->addUser($validatedData);
        return response()->json([
            'message' => 'User created successfully.',
            'user' => $user,
        ], 201);
    }
}
