<?php 
namespace App\Services;

use App\Repositories\ScheduleRepository;

class ScheduleServices extends BaseServices
{
    protected $repository;
    
    public function getRepository()
    {
        return ScheduleRepository::class;
    }

    public function getSchedule()
    {
        return $this->repository->getSchedule();
    }
    public function createSchedule($arraydata)
    {
        return $this->repository->createSchedule($arraydata);
    }
    public function deleteSchedule($id)
    {
        return $this->repository->deleteSchedule($id);
    }
    public function updateSchedule($id,$attribute)
    {
        return $this->repository->updateSchedule($id, $attribute);
        
    }

}