<?php 
namespace App\Services;

use App\Repositories\FeedbackRepository;

class FeedbackServices extends BaseServices
{
    protected $repository;
    
    public function getRepository()
    {
        return FeedbackRepository::class;
    }
    public function createFeedback($arraydata)
    {
        return $this->repository->createFeedback($arraydata);
    }
    public function getFeedback()
    {
        return $this->repository->getFeedback();
    }
    public function deleteFeedback($id)
    {
        return $this->repository->deleteFeedback($id);
    }

    public function showFeedback()
    {
        return $this->repository->getModel();
    }

}