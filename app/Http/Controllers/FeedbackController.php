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
        return redirect()->route('feedback.index');
    }
    public function index()
    { 
        $feedback = $this->FeedbackServices->getAll();

        return view('admin.feedback.index',compact('feedback'));
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