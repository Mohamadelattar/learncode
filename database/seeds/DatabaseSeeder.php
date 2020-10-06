<?php

use Illuminate\Database\Seeder;
use App\Track;
use App\Course;
use App\Quiz;
class DatabaseSeeder extends Seeder
{
    public function run()
    {
       
    	$users = factory('App\User', 10)->create();

    	$tracks = factory('App\Track', 10)->create();
        foreach ($users as $user) {
            $tracks_ids = [];
            $tracks_ids[] = Track::all()->random()->id;
            $tracks_ids[] = Track::all()->random()->id;

            $user->tracks()->sync( $tracks_ids );
        }


        $courses = factory('App\Course', 50)->create();
    	
        foreach ($users as $user) {
            $courses_ids = [];

            $courses_ids[] = Course::all()->random()->id;
            $courses_ids[] = Course::all()->random()->id;
            $courses_ids[] = Course::all()->random()->id;

            $user->courses()->sync( $courses_ids );
        }


        factory('App\Video', 50)->create();
    	$quizzes = factory('App\Quiz', 50)->create();

        foreach ($users as $user) {
            $quizzes_ids = [];

            $quizzes_ids[] = Quiz::all()->random()->id;
            $quizzes_ids[] = Quiz::all()->random()->id;
            $quizzes_ids[] = Quiz::all()->random()->id;

            $user->quizzes()->sync( $quizzes_ids );
        }

    	factory('App\Question', 50)->create();
    	factory('App\Photo', 50)->create();
    }
}
