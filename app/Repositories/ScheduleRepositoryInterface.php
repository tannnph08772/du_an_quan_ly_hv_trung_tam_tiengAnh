<?php
namespace App\Repositories;
interface ScheduleRepositoryInterface
{
    public function getSchedule();
    public function createSchedule($arraydata);
    public function deleteSchedule($id);
    public function updateSchedule($id, $attribute = []);
    
}

?>