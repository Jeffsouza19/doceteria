<?php

namespace App\Services;

use App\Repositories\Interfaces\UserRepository;
use Illuminate\Support\Facades\Hash;

class UserService
{
    protected $repo;
    public function __construct(UserRepository $repo)
    {
        $this->repo = $repo;
    }

    public function getOne($id)
    {
        return $this->repo->getOne($id);
    }

    public function update($id, array $data)
    {
        $this->repo->update($id, $data);

        return $this->repo->getOne($id);
    }

    public function getAll($pages = null)
    {
        return $this->repo->getAll($pages);

    }

    public function store(array $data)
    {
        $data['password'] = Hash::make($data['password']);

        return $this->repo->store($data);
    }

    public function destroy($id)
    {
        return $this->repo->destroy($id);
    }
}
