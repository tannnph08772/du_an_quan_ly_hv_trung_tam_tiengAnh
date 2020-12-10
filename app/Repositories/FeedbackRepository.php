<?php

namespace App\Repositories;

use App\Models\Feedback;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

class FeedbackRepository extends BaseRepository implements FeedbackRepositoryInterface
{
    protected $model;
    public function __construct(Feedback $model)
    {
        parent::__construct();
        $this->model = $model;
    }
    public function getModel(){
        return Feedback::class;
    }
    public function getFeedback(){
        return $this->model->get();
    }
    public function createFeedback($arraydata){
        $this->model->create($arraydata);
    }
    public function deleteFeedback($id){
        
         return  $this->model->where('id',$id)->delete();
    }
}
