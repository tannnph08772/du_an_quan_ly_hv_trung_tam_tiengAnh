<?php

namespace App\Repositories;

use App\Models\Feedback;
use App\Repositories\BaseRepository;

class FeedbackRepository extends BaseRepository implements FeedbackRepositoryInterface
{
    protected $model;
    public function __construct(Feedback $model)
    {
        parent::__construct();
        $this->model = $model;
    }
    public function getModel(){
        return Feedback::class;
    }
    // public function getCourse(){
    //     return $this->model->get();
    // }
    // public function getSingleCourse($id){
    //     return $this->model->where('id', $id)->get();
    // }
    // public function createCourse($arraydata){
    //     return $this->model->create($arraydata);
    // }
    // public function deleteCourse($id){
    //     return $this->model->where('id',$id)->delete();
    // }
    // public function updateCourse($id, $attribute =[]){
    //     return $this->model->find($id)->update($attribute);
    // }

}
