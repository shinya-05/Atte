<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Work;
use Carbon\Carbon;

class WorkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // 出勤時間を6:00から20:00の間でランダムに生成
        $startHour = $this->faker->numberBetween(6, 8); // 8時までを開始時間の範囲に
        $start = Carbon::createFromTime($startHour, 0, 0); // 分・秒は0に設定

        // 勤務時間をランダムに設定（4〜12時間の範囲）
        $workDuration = $this->faker->numberBetween(4, 10); // 勤務時間を4～12時間の間で決定
        $end = (clone $start)->addHours($workDuration); // 勤務時間後に退勤


        return [
            'date' => $this->faker->dateTimeThisMonth()->format('Y-m-d'),
            'start' => $start->format('H:i:s'),
            'end' => $end->format('H:i:s'),
            'user_id' => function () {
                return User::factory()->create()->id;
            },
        ];
    }
}
