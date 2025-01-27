<?php

namespace App\Http\Controllers\StudentOfline;

use App\Contracts\Interfaces\NotePicketInterface;
use App\Contracts\Interfaces\PicketingReportInterface;
use App\Contracts\Interfaces\PicketInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PicketOfflineController extends Controller
{
    private PicketInterface $picket;
    private StudentInterface $student;
    private PicketingReportInterface $report;
    private NotePicketInterface $note;
    public function __construct(PicketInterface $picket, StudentInterface $student, PicketingReportInterface $report, NotePicketInterface $note)
    {
        $this->report = $report;
        $this->student = $student;
        $this->picket = $picket;
        $this->note = $note;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $report = $this->report->getToday();
        $pickets = $this->picket->get();
        $students = $this->student->get();
        $notes = $this->note->get();

        return view('student_offline.others.picket', compact('pickets','students','report','notes'));
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
    public function show(string $id)
    {
        //
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
