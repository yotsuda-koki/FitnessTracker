<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;
use App\Models\Workout;
use Illuminate\Support\Facades\Auth;

class WorkoutController extends Controller
{
    public function index()
    {
        $workouts = Workout::where('user_id', Auth::id())->orderByDesc('date')->paginate(5);
        return view('workout.index', compact('workouts'));
    }

    public function create()
    {
        return view('workout.create');
    }

    public function store(Request $request)
    {
        $durationInMinutes = $request->duration_minutes;
        $hours = floor($durationInMinutes / 60);
        $minutes = $durationInMinutes % 60;
        $formattedTime = sprintf('%02d:%02d', $hours, $minutes);

        $workout = new Workout();
        $workout->duration = $formattedTime;
        $workout->fill($request->all());
        $workout->user_id = Auth::id();
        $workout->save();

        return redirect()->route('workouts.index')->with('success', 'ワークアウトが追加されました。');
    }

    public function show(Workout $workout)
    {
        return view('workout.show', compact('workout'));
    }

    public function edit(Workout $workout)
    {
        $this->checkUserId($workout);

        $duration = $workout->duration;
        list($hours, $minutes, $seconds) = explode(':', $duration);
        $durationInMinutes = (int)$hours * 60 + (int)$minutes;

        return view('workout.edit', [
            'workout' => $workout,
            'durationInMinutes' => $durationInMinutes,
        ]);
    }

    public function update(Request $request, Workout $workout)
    {
        $this->checkUserId($workout);

        $durationInMinutes = $request->duration_minutes;
        $hours = floor($durationInMinutes / 60);
        $minutes = $durationInMinutes % 60;
        $formattedTime = sprintf('%02d:%02d:00', $hours, $minutes);

        $workout->duration = $formattedTime;
        $workout->fill($request->all());
        $workout->save();

        return redirect()->route('workouts.index')->with('success', 'ワークアウトが更新されました。');
    }

    public function destroy(Workout $workout)
    {
        $workout->delete();

        return redirect()->route('workouts.index')->with('success', 'ワークアウトを削除しました。');
    }

    private function checkUserId(Workout $workout)
    {
        if (Auth::id() !== $workout->user_id) {
            abort(404);
        }
    }
}
