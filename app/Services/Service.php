<?php

namespace App\Services;


class Service
{

    public object $repository;

    public function get($relation = null)
    {
        return $this->repository->query($relation);
    }
    public function getTranslation($relation = null)
    {
        return $this->repository->queryTranslation($relation);
    }
    public function getView($relation = null)
    {
        return $this->repository->queryView($relation);
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
    public function showView($id, $relation = [])
    {
        return $this->repository->showView($id, $relation);
    }

    public function delete($id)
    {
        return $this->repository->destroy($id);
    }

    public function softDelete($id)
    {
        return $this->repository->softDelete($id);
    }

    public function storeTranslation($object_id, $translations)
    {
        return $this->repository->createTranslation($object_id, $translations);
    }

    public function editTranslation($object_id, $translations)
    {
        return $this->repository->updateTranslation($object_id, $translations);
    }
    public function destroyTranslation($id)
    {
        return $this->repository->deleteTranslation($id);
    }


}
