<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Work;
use App\Models\Rest;
use Carbon\Carbon;


class RestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // Workインスタンスの開始時間と終了時間を取得して、そこから休憩時間を計算
        $work = Work::find($this->faker->randomDigitNotNull); // ランダムなWorkを取得（例示）
        $start = Carbon::createFromFormat('H:i:s', $work->start);

        // 出勤2時間後に休憩開始、1時間の休憩と仮定
        $breakStart = (clone $start)->addHours(2);
        $breakEnd = (clone $breakStart)->addHour();

        return [
            'start' => $breakStart->format('H:i:s'),
            'end' => $breakEnd->format('H:i:s'),
            'work_id' => $work->id, // 勤務IDに関連付け
        ];
    }
}
