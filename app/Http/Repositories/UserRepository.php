<?php

namespace App\Http\Services;


use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class UserRepository
{
    public function create($data): Model|Builder
    {
        return User::query()->create($data);
    }
    public function findById($id): Model|Collection|Builder|array|null
    {
        return User::query()->find($id);
    }

    public function findAll($filters): Collection|array
    {
        return User::query()->get();
    }

    public function update($id, $data): bool|int
    {
        return User::query()
            ->find($id)
            ->update($data);
    }

    public function delete($data): Model|Builder
    {
        return User::query()->create($data);
    }
}
