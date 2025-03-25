<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class UserController extends Controller
{
    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        User::create([
            'name' => $request->name,
            'total_points' => 0,
            'rank' => 0,
        ]);

        Artisan::call('leaderboard:recalculate');

        return redirect()->route('leaderboard.index')->with('success', 'User added successfully!');
    }
}
