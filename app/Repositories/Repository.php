<?php


namespace App\Repositories;


class Repository {

    protected  object $model;
    protected  object $modelTranslation;

    public function query($relation = null)
    {
        if($relation){
            return $this->model->with(...$relation);
        }
        return $this->model->query();
    }
    public function queryTranslation($relation = null)
    {
        if($relation){
            return $this->modelTranslation->with(...$relation);
        }
        return $this->modelTranslation->query();
    }

    public function create($data)
    {
        return $this->model->create($data);
    }

    public function update($id, $data)
    {
        $model = $this->query();
        $model = $model->find($id);
        $model->update($data);
        return $model;
    }

    public function show($id,  $relation = null)
    {
        $model = $this->query($relation);
        return $model->find($id);
    }

    public function destroy($id)
    {
        $model = $this->query();
        $model = $model->find($id);
        return $model->delete($model);
    }

    public function softDelete($id)
    {
        $model = $this->query()->find($id);
        if ($model) {
            $model->deleted_by = auth()->id();
            $model->save();
            $model->delete();
            return response()->noContent();
        } else {
            return response()->json('Not found', 404);
        }
    }
    public function showTranslation($id,  $relation = null)
    {
        $model = $this->queryTranslation($relation);
        return $model->find($id);
    }

    public function createTranslation($data)
    {
        $this->modelTranslation->create($data);
    }

    public function updateTranslation($id, $data)
    {
        $model = $this->queryTranslation();
        $model = $model->find($id);
        $model->update($data);
        return $model;
    }

    public function destroyTranslation($id)
    {
        $model = $this->queryTranslation();
        $model = $model->find($id);
        return $model->delete($model);
    }
}
