<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use App\Models\Quiz;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class QuizFactory extends Factory
{

    protected $model = Quiz::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence(rand(3,7));
        $data = [
            'title' => $title,
            'slug' => Str::slug($title),
            'description' => $this->faker->text(200)
        ];

        $status = ['publish', 'passive', 'draft'];

        $select = $status[rand(0, count($status) - 1)];

        $data['status'] = $select;

        
        if($select == 'publish'){
            $data['finished_at'] = date('Y-m-d H:i:s', strtotime('+'.rand(1,10) . ' days'));
        }

        return $data;
    }
}
