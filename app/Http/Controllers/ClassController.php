<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ClassRequest;
use App\Models\ClassRoom;
use App\Models\Schedule;
use App\Models\Teacher;
use App\Models\Course;
use App\Models\Place;
use App\Models\Attendance;
use Carbon\Carbon;

class ClassController extends Controller
{
    public function index(){
    	$classes = ClassRoom::orderBy('id', 'desc')->get();

		return view('classes.index', [
			'classes' => $classes,
		]);
    }

    public function create(){
		$schedules = Schedule::all();
		$weekdays = config('common.weekdays');
        $teachers = Teacher::with(['user'])->get();
    	$courses = Course::all();        
    	$places = Place::all();

    	return view('classes.create', [
			'schedules' => $schedules,
			'weekdays' => $weekdays,
            'teachers' => $teachers,
    		'courses' => $courses,
    		'places' => $places,
    	]);
    }

    public function store(ClassRequest $request){
		$data = request()->all();

		$params = \Arr::except($data, ['_token', 'weekday']);
		$params['status'] = 1;

		$result = ClassRoom::create($params);

		$start_day = Carbon::create($params['start_day']);
        $end_day = Carbon::create($params['end_day']);
		$diffInDays = $start_day->diffInDays($end_day);
		$dayOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
		$days = request()->get('weekday');

		for($i=0; $i<=$diffInDays; $i++) {
			$dates[] = (clone $start_day)->addDays($i)->toDateString();
		}
		foreach($dates as $date) {
			foreach($days as $day) {
				$dayLearns[] = date('Y-m-d', strtotime($dayOfWeek[$day], strtotime($date)));
			}
		}
		foreach($dates as $date) {
			foreach($dayLearns as $dayLearn) {
				if($dayLearn <= $date) {
					$dayLearnPop[] = $dayLearn;
				}
			}
		}
		$dayLearnUni = array_unique($dayLearnPop);
		foreach($dayLearnUni as $value) {
			$dayLearnSort[] = date('Y-m-d', strtotime($value));
			sort($dayLearnSort);
		}
		foreach($dayLearnSort as $value) {
			$attendance['date'] = $value;
			$attendance['teacher_id'] = $params['teacher_id'];
			$attendance['class_id'] = $result['id'];
			$attendance['schedule_id'] = $params['schedule_id'];
			Attendance::create($attendance);
		}

		return redirect()->route('classes.index');
	}
}
