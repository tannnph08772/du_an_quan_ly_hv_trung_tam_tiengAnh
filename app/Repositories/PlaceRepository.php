<?php

namespace App\Repositories;

use App\Models\Place;
use App\Repositories\BaseRepository;

class PlaceRepository extends BaseRepository implements PlaceRepositoryInterface
{
    protected $model;
    public function __construct(Place $model)
    {
        parent::__construct();
        $this->model = $model;
    }
    public function getModel(){
        return Place::class;
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
