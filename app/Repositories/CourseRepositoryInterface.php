<?php
namespace App\Repositories;
interface CourseRepositoryInterface
{
    public function getCourse();
    public function createCourse($arraydata);
    public function deleteCourse($id);
    public function updateCourse($id, $attribute = []);
    
}

?>