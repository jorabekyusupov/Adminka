<?php

namespace App\Services;


class Service
{

    protected object $repository;

    public function get($relation = null)
    {
        return $this->repository->query($relation);
    }


    public function store($params)
    {
        return $this->repository->create($params);
    }

    public function edit($id, $params)
    {
        return $this->repository->update($id, $params);
    }

    public function show($id, $relation = null)
    {
        return $this->repository->show($id, $relation);
    }

    public function delete($id)
    {
        return $this->repository->destroy($id);
    }

    public function softDelete($id)
    {
        return $this->repository->softDelete($id);
    }

    public function getTranslation($relation = null)
    {
        return $this->repository->queryTranslation($relation);
    }

    public function showTranslation($id, $relation = null)
    {
        return $this->repository->showTranslation($id, $relation);
    }

    public function storeTranslation($data)
    {
        return $this->repository->createTranslation($data);
    }

    public function editTranslation($id, $data)
    {
        return $this->repository->updateTranslation($id, $data);
    }

    public function deleteTranslation($id)
    {
        return $this->repository->destroyTranslation($id);
    }

}
