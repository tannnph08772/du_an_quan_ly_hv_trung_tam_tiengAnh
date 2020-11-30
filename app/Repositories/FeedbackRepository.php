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
    public function getClassInCourse($id)
    {
        $data = DB::table('classes')
            ->join('courses', 'classes.course_id', '=', 'courses.id')
            ->where('course_id', $id)
            ->select('classes.id', 'classes.course_id', 'classes.name_class')
            ->get();
        return $data;
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
