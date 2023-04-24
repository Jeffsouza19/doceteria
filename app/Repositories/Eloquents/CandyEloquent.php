<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Interfaces\CandyRepository;
use Illuminate\Database\Eloquent\Model;

class CandyEloquent implements CandyRepository
{
    private $model;
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getOne($id)
    {
        return $this->model->find($id);
    }

    public function update($id, array $data)
    {
        return $this->model->find($id)->update($data);
    }

    public function getAll($pages = null)
    {
        return $this->model->query()->paginate($pages);

    }

    public function store(array $data)
    {
        return $this->model->create($data);

    }

    public function destroy($id)
    {
        return $this->model->find($id)->delete();

    }
}
