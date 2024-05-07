<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\CategoryProjectInterface;
use App\Contracts\Interfaces\HummataskTeamInterface;
use App\Contracts\Interfaces\MentorDivisionInterface;
use App\Contracts\Interfaces\MentorStudentInterface;
use App\Contracts\Interfaces\ProjectInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Contracts\Interfaces\StudentProjectInterface;
use App\Contracts\Interfaces\StudentTeamInterface;
use App\Services\HummataskTeamService;
use App\Services\ProjectService;
use App\Services\StudentProjectService;
use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;

class ProjectController extends Controller
{
    private HummataskTeamService $service;
    private HummataskTeamInterface $hummatask_team;
    private ProjectService $projectService;
    private ProjectInterface $project;
    private StudentProjectService $studentProjectService;
    private MentorDivisionInterface $mentordivision;
    private StudentProjectInterface $studentProject;
    private CategoryProjectInterface $categoryProject;
    private StudentInterface $student;
    private StudentTeamInterface $studentTeam;
    private MentorStudentInterface $mentorStudent;

    public function __construct(
        HummataskTeamInterface $hummatask_team, HummataskTeamService $service,
        ProjectService $projectService, ProjectInterface $project,
        StudentProjectService $studentProjectService, StudentProjectInterface $studentProject,
        CategoryProjectInterface $categoryProject,
        StudentInterface $student,
        MentorDivisionInterface $mentordivision,
        StudentTeamInterface $studentTeam,
        MentorStudentInterface $mentorStudent
        )
    {
        $this->hummatask_team = $hummatask_team;
        $this->service = $service;
        $this->mentordivision = $mentordivision;
        $this->projectService = $projectService;
        $this->project = $project;
        $this->studentProjectService = $studentProjectService;
        $this->studentProject = $studentProject;
        $this->categoryProject = $categoryProject;
        $this->student = $student;
        $this->studentTeam = $studentTeam;
        $this->mentorStudent = $mentorStudent;
    }

    /**
     * Display a listing of the resource.
     */
    public function index($slug)
    {
        $slugs = $this->hummatask_team->slug($slug);
        return view('Hummatask.team.submit-project', compact('slugs'));
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
    public function store($slug, StoreProjectRequest $request)
    {
        $hummaTeam = $this->hummatask_team->slug($slug);
        $titles = $request->input('title');
        $descriptions = $request->input('description');

        if (count($titles) !== count($descriptions)) {
            return redirect()->back()->with('error', 'Jumlah judul dan deskripsi tidak sama');
        }

        for ($i = 0; $i < count($titles); $i++) {
            $this->project->store([
                'hummatask_team_id' => $hummaTeam->id,
                'title' => $titles[$i],
                'description' => $descriptions[$i],
            ]);
        }
        
        return to_route('team.show', $slug)->with('success', 'Berhasil mengajukan projek');
    }

    

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }

    public function mentor()
    {
        return view('Hummatask.project-submission.index');
    }
}