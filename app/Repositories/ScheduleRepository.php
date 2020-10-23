<?php

namespace App\Repositories;

use App\Models\Schedule;
use App\Repositories\BaseRepository;

class ScheduleRepository extends BaseRepository implements ScheduleRepositoryInterface
{
    protected $model;
    public function __construct(Schedule $model)
    {
        parent::__construct();
        $this->model = $model;
    }
    public function getModel(){
        return Schedule::class;
    }
    public function getSchedule(){
        return $this->model->get();
    }
    public function createSchedule($arraydata){
        return $this->model->create($arraydata);
    }
    public function deleteSchedule($id){
        return $this->model->where('id',$id)->delete();
    }
    public function updateSchedule($id, $attribute =[]){
        return $this->model->find($id)->update($attribute);
    }

}
