<?php

namespace App\Repositories;

use App\Models\Course;
use App\Repositories\BaseRepository;

class CourseRepository extends BaseRepository implements CourseRepositoryInterface
{
    protected $model;
    public function __construct(Course $model)
    {
        parent::__construct();
        $this->model = $model;
    }
    public function getModel(){
        return Course::class;
    }
    public function getCourse(){
        return $this->model->get();
    }
    public function createCourse($arraydata){
        return $this->model->create($arraydata);
    }
    public function deleteCourse($id){
        return $this->model->where('id',$id)->delete();
    }
    public function updateCourse($id, $attribute =[]){
        return $this->model->find($id)->update($attribute);
    }

}
