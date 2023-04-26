<?php

namespace App\Services;

use App\Exceptions\GeneralJsonException;
use App\Repositories\Interfaces\CandyRepository;

class CandyService
{
    protected $repo;
    public function __construct(CandyRepository $repo)
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
        throw_if(!isset($data['candy_name']) || !isset($data['amount']), GeneralJsonException::class, 'Favor preencher todos dados');

        return $this->repo->store($data);
    }

    public function destroy($id)
    {
        return $this->repo->destroy($id);
    }
}
