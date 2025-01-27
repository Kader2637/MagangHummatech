<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Interfaces\AdminJournalInterface;
use App\Contracts\Interfaces\Eloquent\PaginationInterface;
use App\Contracts\Interfaces\JournalInterface;
use App\Http\Controllers\Controller;
use App\Models\Journal;
use App\Services\JournalService;
use Carbon;
use Illuminate\Http\Request;

class AdminJournalController extends Controller
{
    private AdminJournalInterface $adminJournal;

    public function __construct( AdminJournalInterface $adminJournal)
    {
        $this->adminJournal = $adminJournal;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $adminJournalQuery = $this->adminJournal->search($request);
        $searchDate = $request->filled('created_at') ? $request->created_at : Carbon::today()->toDateString();

        if (!$request->filled('created_at') || Carbon::parse($searchDate)->isToday()) {
            $adminJournalQuery->whereDate('created_at', $searchDate);
        }


        $adminJournalAll = $adminJournalQuery->paginate(10, ['*'], 'all_page');
        $adminJournalFillIn = $adminJournalQuery->where('status', 'fillin')->paginate(10, ['*'], 'fillin_page');
        $adminJournalNotFilling = $adminJournalQuery->where('status', '!=', 'fillin')->paginate(10, ['*'], 'notfilling_page');


        return view('admin.page.journal', compact('adminJournalAll','adminJournalFillIn','adminJournalNotFilling'));
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
