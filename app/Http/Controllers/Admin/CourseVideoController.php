<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Course;

class CourseVideoController extends Controller
{

    public function create(Course $course)
    {
        return view('admin.courses.createvideo', compact('course'));
    }

}
