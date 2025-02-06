<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Workout;
use Carbon\Carbon;

class ProgressController extends Controller
{
    public function index()
    {
        $startDate = Carbon::now()->subDays(30);
        $today = Carbon::now();

        $data = [];

        for ($date = $startDate; $date->lte($today); $date->addDay()) {
            $formattedDate = $date->format('Y-m-d');
            $displayDate = $date->format('m-d');

            $workouts = Workout::where('user_id', Auth::id())
                ->whereDate('date', $formattedDate)
                ->get();

            $data[$displayDate] = 0;

            foreach ($workouts as $workout) {
                $duration = $workout->duration;
                list($hours, $minutes, $seconds) = explode(':', $duration);
                $durationInMinutes = (int)$hours * 60 + (int)$minutes;
                $data[$displayDate] += $durationInMinutes;
            }
        }

        return view('progress.index', compact('data'));
    }
}
