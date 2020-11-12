<?php 
namespace App\Services;

use App\Repositories\PlaceRepository;

class PlaceServices extends BaseServices
{
    protected $repository;
    
    public function getRepository()
    {
        return PlaceRepository::class;
    }

    public function getPlace()
    {
        return $this->repository->getPlace();
    }
    public function createPlace($arraydata)
    {
        return $this->repository->createPlace($arraydata);
    }
    public function deletePlace($id)
    {
        return $this->repository->deletePlace($id);
    }
    public function updatePlace($id,$attribute)
    {
        return $this->repository->updatePlace($id, $attribute);
    }

}