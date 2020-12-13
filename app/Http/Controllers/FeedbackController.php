<?php

namespace App\Http\Controllers;

use App\Http\Requests\Feedback\CreateFeedbackRequest;
use App\Models\Answer;
use App\Models\Question;
use App\Models\ClassRoom;
use App\Models\Course;
use App\Models\Feedback;
use App\Models\Result_Qestion;
use App\Services\FeedbackServices;
use Illuminate\Support\Facades\Auth;
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
    public function store(CreateFeedbackRequest $request){
        $request['student_id'] = Auth::user()->student->id;
        $request['class_id'] = Auth::user()->student->class_id;
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
        return redirect()->route('feedback.thanks');
    }
    public function index()
    { 
        $list =   Result_Qestion::select('answers.*', 'questions.*', 'result_question.*')
        ->join('feedback', 'feedback.id', '=', 'result_question.id_feedback')
        ->join('answers', 'answers.id', '=', 'result_question.id_answer')
        ->join('questions', 'questions.id', '=', 'result_question.id_question')
        ->get();
        $feedback = $this->FeedbackServices->getAll();

        return view('admin.feedback.index',compact('feedback','list'));
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
    public function thanks()
    {
        return view('admin.feedback.cam-on');
    }
    public function viewfb()
    {
        
        $teacherID=Auth::user()->teacher->id;
        $classes= ClassRoom::where('teacher_id',$teacherID)->get();
        $arrayID=array();
        foreach($classes as $class){
            array_push($arrayID, $class->id);
        };
        $fb = Feedback::whereIn('class_id',$arrayID)->with(['results'=>function($query){
            $query->with('question','answer');
        }])->orderBy('class_id', 'desc')->get();
        return view('admin.teacher.ds-gop-y',compact('fb','classes'));
    }
}