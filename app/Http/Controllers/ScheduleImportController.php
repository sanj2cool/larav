<?php

namespace App\Http\Controllers;

use App\Imports\UserImporter;
use App\Models\UserEmailSchedule;
use Illuminate\Http\Request;

class ScheduleImportController extends Controller
{
    public function index()
    {
        $schedules = UserEmailSchedule::query();
        if (!auth()->user()->hasPermission('schedule-index')){
            $schedules = $schedules->where('user_id', auth()->user()->id);
        }
        $schedules = $schedules->where('user_id', auth()->user()->id);
        return view('schedules.index', ['schedules'=> $schedules->orderByDesc('schedule_time')->paginate()]);
    }

    public function import()
    {
        $importer = new UserImporter();
        $importer->import(request()->file('file'));
        return back();
    }
}
