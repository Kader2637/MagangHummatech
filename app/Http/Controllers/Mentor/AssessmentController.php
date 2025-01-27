<?php

namespace App\Http\Controllers\Mentor;

use App\Contracts\Interfaces\ChallengeInterface;
use App\Contracts\Interfaces\CourseInterface;
use App\Contracts\Interfaces\StudentChallengeInterface;
use App\Contracts\Interfaces\StudentTaskInterface;
use App\Contracts\Interfaces\SubCourseInterface;
use App\Contracts\Interfaces\TaskInterface;
use App\Enum\ChallengeStatusEnum;
use App\Enum\TaskStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAssessmentChallengekRequest;
use App\Http\Requests\UpdateAssessmentChallengeRequest;
use App\Http\Requests\UpdateAssessmentTaskRequest;
use App\Models\Challenge;
use App\Models\StudentChallenge;
use App\Models\StudentTask;
use App\Models\Task;
use App\Services\StudentTaskService;
use Illuminate\Http\Request;

class AssessmentController extends Controller
{
    private StudentTaskInterface $studentTask;
    private StudentTaskService $serviceStudentTask;
    private TaskInterface $task;
    private CourseInterface $course;
    private SubCourseInterface $subCourse;
    private ChallengeInterface $challenge;
    private StudentChallengeInterface $studentChallenge;


    public function __construct(StudentTaskInterface $studentTask, StudentTaskService $serviceStudentTask, TaskInterface $task, CourseInterface $course, SubCourseInterface $subCourse, ChallengeInterface $challenge, StudentChallengeInterface $studentChallenge)
    {
        $this->studentTask = $studentTask;
        $this->serviceStudentTask = $serviceStudentTask;
        $this->task = $task;
        $this->course = $course;
        $this->subCourse = $subCourse;
        $this->challenge = $challenge;
        $this->studentChallenge = $studentChallenge;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = $this->course->whereDivision(auth()->user()->mentor->id);
        $tasks = null;
        foreach ($courses as $course) {
            $subCourses = $this->subCourse->whereCourse($course->id);
            foreach ($subCourses as $subCourse) {
                $tasks = $this->task->whereSubCourse($subCourse->id);
            }
        }

        $challenges = $this->challenge->whereMentor(auth()->user()->mentor->id);

        return view('mentor.assessment.index', compact('tasks', 'challenges'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        $studentTasks = $this->studentTask->whereTask($task->id);
        return view('mentor.assessment.task_detail', compact('studentTasks', 'task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAssessmentTaskRequest $request, StudentTask $studentTask)
    {
        $data = $request->all();
        $data['status'] = TaskStatusEnum::COMPLETED->value;
        $this->studentTask->update($studentTask->id, $data);
        return back()->with('success' , 'Berhasi Memperbarui Nilai');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function showChallenge(Challenge $challenge)
    {
        $studentChallenges = $this->studentChallenge->whereChallenge($challenge->id);
        return view('mentor.assessment.challange_detail', compact('studentChallenges', 'challenge'));
    }
    public function updateChallenge(UpdateAssessmentChallengeRequest $request, StudentChallenge $studentChallenge)
    {
        $data = $request->all();
        $data['status'] = ChallengeStatusEnum::COMPLETED->value;
        $this->studentChallenge->update($studentChallenge->id, $data);
        return back()->with('success', 'Berhasil Memperbarui Nilai');
    }

    public function showChallengeStudent(Challenge $challenge)
    {
        $studentChallenges = $this->studentChallenge->whereChallenge($challenge->id);
        return view('mentor.challange.detail', compact('studentChallenges', 'challenge'));
    }
}
