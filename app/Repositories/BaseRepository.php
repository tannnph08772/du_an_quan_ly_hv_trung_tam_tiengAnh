<?php
namespace App\Repositories;
use App\Repositories\BaseRepositoryInterface;
abstract class BaseRepository implements BaseRepositoryInterface
{
    //model muốn tương tác
    protected $model;
    //khởi tạo
    public function __construct()
    {
        $this->setModel();
    }
    //lấy model tương ứng
    abstract public function getModel();
    /**
     * Set model
     */
    public function setModel()
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }
    public function getAll()
    {
        return $this->model->get();
    }
    public function findById($id)
    {
        return $this->model->find($id);
    }
    public function create($attributes = [])
    {
        return  $this->model->create($attributes);
    }
    public function update($id, $attributes = [])
    {
        return $this->model
            ->where('id', $id)
            ->update($attributes);
    }

    public function delete($id)
    {
        return $this->model->where('id', $id)->delete();
    }
}