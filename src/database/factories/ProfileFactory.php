<?php

namespace Database\Factories;

use App\Models\Profile;
use App\Models\Worker;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    protected $model = Profile::class;

    public function definition(): array
    {
        return [
            'worker_id' => Worker::factory()->create(),
        ];
    }
}
