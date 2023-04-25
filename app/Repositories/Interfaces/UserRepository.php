<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface UserRepository
{
    public function __construct(Model $model);
    public function getAll($pages);

    public function store(array $data);
    public function getOne($id);

    public function update($id, array $data);

    public function destroy($id);
}
