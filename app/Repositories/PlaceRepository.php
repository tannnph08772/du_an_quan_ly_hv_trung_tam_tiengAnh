<?php

namespace App\Repositories;

use App\Models\Places;
use App\Repositories\BaseRepository;

class PlaceRepository extends BaseRepository implements PlaceRepositoryInterface
{
    protected $model;
    public function __construct(Places $model)
    {
        parent::__construct();
        $this->model = $model;
    }
    public function getModel(){
        return Places::class;
    }
    public function getPlace(){
        return $this->model->get();
    }
    public function createPlace($arraydata){
        return $this->model->create($arraydata);
    }
    public function deletePlace($id){
        return $this->model->where('id',$id)->delete();
    }
    public function updatePlace($id, $attribute =[]){
        return $this->model->find($id)->update($attribute);
    }

}
