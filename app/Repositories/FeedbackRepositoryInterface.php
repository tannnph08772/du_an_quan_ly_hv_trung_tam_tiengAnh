<?php
namespace App\Repositories;
interface FeedbackRepositoryInterface
{
    public function getFeedback();
    public function getClassInCourse($id);
    public function createFeedback($arraydata);
    public function deleteFeedback($id);
    
}

?>