<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\ClassRoom;
use App\Models\Course;
use App\Models\Feedback;
use App\Models\Result_Qestion;
use App\Services\FeedbackServices;
use App\Services\CourseServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Whoops\Run;

class FeedbackController extends Controller
{
    protected $FeedbackServices;
    protected $CourseServices;
    public function __construct(FeedbackServices $FeedbackServices, CourseServices $CourseServices)
    {
        $this->FeedbackServices = $FeedbackServices;
        $this->CourseServices = $CourseServices;
    }
    public function showfeedback()
    {
        $listMenu = $this->FeedbackServices->getFeedback();
        $question = Question::select('*')->get();
        $answer = Answer::select('*')->get();
        $class = ClassRoom::select('*')->get();
        $course = Course::select('*')->get();
        return view('admin.feedback.gop-y', compact('listMenu','question','answer','class','course'));

    }
    public function store(Request $request){
        $question=$request->get('question');
        $answer=$request->get('answer');
        $feedback=$this->FeedbackServices->create($request); 
       foreach ($question as $key => $value) {
        $res_feedback=[
            'id_feedback'=>$feedback->id,
             'id_question'=>$value,
            'id_answer'=>$answer[$key+1],
        ];
        Result_Qestion::create($res_feedback);
       }
        return redirect()->route('feedback.index');
    }
    public function findClassByCourse(Request $request)
    {
        $id = request()->get('id');
        $result = $this->FeedbackServices->getClassInCourse($id);
        return response()->json([
            'dataClass' => $result
        ]);
    }
    public function index()
    {
      $list =   Result_Qestion::select('answers.*', 'questions.*', 'result_question.*')
      ->join('feedback', 'feedback.id', '=', 'result_question.id_feedback')
      ->join('answers', 'answers.id', '=', 'result_question.id_answer')
      ->join('questions', 'questions.id', '=', 'result_question.id_question')
      ->get();
      $feedback = Feedback::select('feedback.*','courses.*', 'classes.*', 'feedback.id as feedbackID')
      ->join('courses', 'courses.id', '=', 'feedback.course_id')
      ->join('classes', 'classes.id', '=', 'feedback.class_id')
      ->get();
        // $list = $this->FeedbackServices->getFeedback();
        return view('admin.feedback.index',compact('list', 'feedback'));
    }
    public function delete(Request $request)
    {   
        $id = $request->get('id');
        $delete= $this->FeedbackServices->deleteFeedback($id);
        return response()->json([
            'dataClass' =>  $delete,
            'id'=>$id
        ]); ;
    }
}