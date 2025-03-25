<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Activity;

class RecalculateLeaderboard extends Command
{
    protected $signature = 'leaderboard:recalculate';

    protected $description = 'Recalculate points and ranks for the leaderboard.';

    public function handle()
    {
        $this->info('Recalculating points and ranks...');

        $users = User::all();
        foreach ($users as $user) {
            $totalPoints = Activity::where('user_id', $user->id)->sum('points');
            $user->update(['total_points' => $totalPoints]);
        }

        $this->updateRanks();

        $this->info('Leaderboard updated successfully!');
    }

    private function updateRanks()
    {
        $users = User::orderByDesc('total_points')->get();
        $rank = 0;
        $prevPoints = -1;
        $prevRank = 0;
        

        foreach ($users as $index => $user) {
            if ($user->total_points != $prevPoints) {
                $rank = $prevRank + 1;
            }

            $user->update(['rank' => $rank]);
            $prevRank = $user->rank;
            $prevPoints = $user->total_points;
        }
    }
}
