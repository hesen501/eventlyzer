<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Http\Resources\UserResource;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    protected UserService $userService;
    public function __construct(UserService $userService) {
        $this->userService = $userService;
    }

    public function index(): JsonResponse
    {
        return response()->json(UserResource::collection($this->userService->all()));
    }

    public function show($id): JsonResponse
    {
        return response()->json(new UserResource($this->userService->find($id)));
    }

    public function store(StoreRequest $request): JsonResponse
    {
        $user = $this->userService->create($request->validated());
        return response()->json(new UserResource($user), 201);
    }

    public function update(UpdateRequest $request, $id): JsonResponse
    {
        $user = $this->userService->update($id, $request->validated());
        return response()->json(new UserResource($user));
    }

    public function destroy($id): JsonResponse
    {
        $this->userService->delete($id);
        return response()->json(null, 204);
    }
}
