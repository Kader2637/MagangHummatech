<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\CourseInterface;
use App\Models\Course;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class StudentCourseController extends Controller
{
    private CourseInterface $course;
    public function __construct(CourseInterface $courseInterface)
    {
        $this->course = $courseInterface;
    }

    /**
     * index
     *
     * @param  mixed $request
     * @return View
     */
    public function index(Request $request): View
    {
        $courses = $this->course->getNonactiveCourse(auth()->user()->student->division_id, auth()->user()->student->id);
        return view('student_online_&_offline.course-store.index', compact('courses'));
    }

    public function activeCourses(Request $request): View
    {
        $courses = auth()->user()->student->activeCourses;
        return view('student_online_&_offline.course.active-course', compact('courses'));
    }

    /**
     * show
     *
     * @param  mixed $course
     * @return View
     */
    public function show(Course $course): View
    {
        return view('student_online_&_offline.course-store.details', compact('course'));
    }
}
