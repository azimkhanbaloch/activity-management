<?php

namespace Database\Seeders;

use App\Http\Controllers\LeaderboardController;
use App\Models\Activity;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $activityNames = [
            'Running',
            'Walking',
            'Cycling',
            'Swimming',
            'Hiking',
            'Yoga',
            'Weightlifting',
            'Pilates',
            'Rowing',
            'Dancing',
            'Basketball',
            'Football',
            'Tennis',
            'Skating',
            'Climbing',
        ];

        $users = User::all();
        
        foreach ($users as $user) {
            for ($i = 0; $i < rand(5, 15); $i++) {
                Activity::create([
                    'user_id' => $user->id,
                    'activity_name' => $activityNames[array_rand($activityNames)],
                    'activity_date' => Carbon::now()->subDays(rand(1, 30)),
                    'points' => 20
                ]);
            }
        }
    }
}
