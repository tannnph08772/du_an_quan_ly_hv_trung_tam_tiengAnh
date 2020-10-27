<?php 
namespace App\Services;

use App\Repositories\CourseRepository;

class CourseServices extends BaseServices
{
    protected $repository;
    
    public function getRepository()
    {
        return CourseRepository::class;
    }

    public function getCourse()
    {
        return $this->repository->getCourse();
    }
    public function createCourse($arraydata)
    {
        return $this->repository->createCourse($arraydata);
    }
    public function deleteCourse($id)
    {
        return $this->repository->deleteCourse($id);
    }
    public function updateCourse($id,$attribute)
    {
        return $this->repository->updateCourse($id, $attribute);
    }

}