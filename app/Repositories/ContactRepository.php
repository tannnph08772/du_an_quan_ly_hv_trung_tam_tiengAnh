<?php

namespace App\Repositories;

use App\Models\Contact;
use App\Repositories\BaseRepository;

class ContactRepository extends BaseRepository implements ContactRepositoryInterface
{
    protected $model;
    public function __construct(Contact $model)
    {
        parent::__construct();
        $this->model = $model;
    }
    public function getModel(){
        return Contact::class;
    }
    public function getContact(){
        return $this->model->get();
    }
    public function createContact($data){
        return $this->model->create($data);
    }
    public function deleteContact($id){
        return $this->model->where('id',$id)->delete();
    }

}
