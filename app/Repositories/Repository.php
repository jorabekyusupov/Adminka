<?php


namespace App\Repositories;


class Repository
{

    public object $model, $modelView, $modelTranslation;

    public function query($relation = null)
    {
        if ($relation) {
            return $this->model->with(...$relation);
        }
        return $this->model->query();
    }

    public function queryView($relations = null)
    {
        if ($relations) {
            return $this->modelView->with(...$relations);
        }
        return $this->modelView->query();
    }

    public function showView($id, $relations = null)
    {
        $model = $this->queryView($relations);
        $model = $model->find($id);
        if ($model) {
            return response()->json($model);
        } else {
            return response('Not found', 404);
        }
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

    public function show($id, $relation = null)
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


    public function createTranslation($object_id, $translations)
    {
        foreach ($translations as $key => $translation) {
            $translation['object_id'] = $object_id;
            $this->modelTranslation->create($translation);
        }
    }

    public function updateTranslation($object_id, $translations)
    {
        foreach ($translations as $translation) {
            $model = $this->modelTranslation->where('object_id', $object_id);
            if ($model && isset($translation['id'])) {
                $model->where('id', $translation['id'])
                    ->update($translation);
            } else {
                $translation['object_id'] = $object_id;
                $this->modelTranslation->create($translation);
            }
        }
    }

    public function deleteTranslation($id)
    {
        $model = $this->modelTranslation::find($id);
        $model->delete();
    }

}
