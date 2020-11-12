<?php
namespace App\Repositories;
interface PlaceRepositoryInterface
{
    public function getPlace();
    public function createPlace($arraydata);
    public function deletePlace($id);
    public function updatePlace($id, $attribute = []);
    
}

?>