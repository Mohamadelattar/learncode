<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Quiz;


class QuizQuestionController extends Controller
{
   
    public function create(Quiz $quiz)
    {
        return view('admin.quizzes.createquestion', compact('quiz'));
    }
}
