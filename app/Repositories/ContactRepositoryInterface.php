<?php
namespace App\Repositories;
interface ContactRepositoryInterface
{
    public function getContact();
    public function createContact($data);
    public function deleteContact($id);
    
}

?>