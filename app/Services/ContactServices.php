<?php 
namespace App\Services;

use App\Repositories\ContactRepository;

class ContactServices extends BaseServices
{
    protected $repository;
    
    public function getRepository()
    {
        return ContactRepository::class;
    }

    public function getContact()
    {
        return $this->repository->getContact();
    }
    public function createContact($data)
    {
        return $this->repository->createContact($data);
    }
    public function deleteContact($id)
    {
        return $this->repository->deleteContact($id);
    }
}