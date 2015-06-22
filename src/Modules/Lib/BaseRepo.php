<?php namespace Gmlo\CMS\Modules\Lib;

abstract class BaseRepo {

    protected $model;

    public function __construct()
    {
        $this->model = $this->getModel();
    }

    abstract public function getModel();


    public function storeNew($data = [])
    {
        $model = $this->getModel();
        $model->fill($data);
        $model->save();
        return $model;
    }

    public function newModel($data = [])
    {
        $model = $this->getModel();
        $model->fill($data);
        return $model;
    }

    public function update($model, $data)
    {
        $model->fill($data);
        return $model->save();
    }

    public function delete($model)
    {
        return $model->delete();
    }

    public function find($id, array $columns = array('*'))
    {
        return $this->model->find($id, $columns);
    }

    public function findOrFail($id, array $columns = array('*'))
    {
        return $this->model->findOrFail($id, $columns);
    }

    public function lists($column, $key = null)
    {
        return $this->model->lists($column, $key);
    }

    public function all($columns = array('*'))
    {
        return $this->model->all($columns);
    }

    public function paginate(int $perPage = null, array $columns = array('*'))
    {
        return $this->model->paginate($perPage, $columns);
    }

    public function simplePaginate($perPage = null, $columns = array('*'))
    {
        return $this->model->simplePaginate($perPage, $columns);
    }

    public function with($relations)
    {
        return $this->model->with($relations);
    }

    public function withTrashed()
    {
        return $this->model->withTrashed();
    }

    public function onlyTrashed()
    {
        return $this->model->onlyTrashed();
    }

    public function orderBy($column, $direction = 'asc')
    {
        return $this->model->orderBy($column, $direction);
    }
}