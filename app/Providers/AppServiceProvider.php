<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Course;
use App\Models\ClassRoom;
use Auth;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            $courses = Course::all();
            $view->with('courses', $courses );
        });

        View::composer('*', function ($view) {
            if (Auth::check()){
                $teacher = Auth::user()->teacher->id;
                $classes = ClassRoom::where('teacher_id', $teacher)->get();
            
                $view->with('classes', $classes );
            }
          
        });
    }
}
