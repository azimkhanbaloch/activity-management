<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Activity;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Artisan;

class LeaderboardController extends Controller
{
    public function index(Request $request)
    {
        $query = User::with('activities');

        if ($request->has('filter')) {
            $filter = $request->filter;
            
            if ($filter == 'day') {
                $query->whereHas('activities', function ($q) {
                    $q->whereDate('activity_date', Carbon::today());
                });
            } elseif ($filter == 'month') {
                $query->whereHas('activities', function ($q) {
                    $q->whereMonth('activity_date', Carbon::now()->month);
                });
            } elseif ($filter == 'year') {
                $query->whereHas('activities', function ($q) {
                    $q->whereYear('activity_date', Carbon::now()->year);
                });
            }
        }

        if ($request->has('search') && $request->search > 0) {
            $query->where('id', $request->search);
        }

        $users = $query->orderByDesc('total_points')->get();

        return view('leaderboard.index', compact('users'));
    }

    public function recalculate()
    {
        // Artisan::call('leaderboard:recalculate');
        Artisan::call('db:seed');
        
        return redirect()->route('leaderboard.index')->with('success', 'Leaderboard updated!');
    }
}
