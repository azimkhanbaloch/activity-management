<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ActivityController extends Controller
{
    // Show Create Activity Form
    public function create()
    {
        $users = User::all();
        return view('activities.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        Activity::create([
            'user_id' => $request->user_id,
            'activity_name' => $request->activity_name,
            'activity_date' => now(),
            'points' => 20,
        ]);

        Artisan::call('leaderboard:recalculate');

        return redirect()->route('leaderboard.index')->with('success', 'Activity added successfully!');
    }
}
