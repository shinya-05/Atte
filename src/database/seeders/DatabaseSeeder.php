<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Work;
use App\Models\Rest;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // 20人のユーザーを生成し、それぞれに500日分の勤務と休憩データを作成
        User::factory(20)->create()->each(function ($user) {
            Work::factory(50)->create(['user_id' => $user->id])->each(function ($work) {
                Rest::factory()->create(['work_id' => $work->id]);
            });
        });
    }
}
