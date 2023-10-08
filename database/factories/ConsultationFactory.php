<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Reception;
use App\Models\User;
use App\Models\Visitor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Consultation>
 */
class ConsultationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'consultation_date' => fake()->date,
            'comment' => fake()->text,
            'user_id' => User::inRandomOrder()->first()->id, // Выбираем случайного пользователя
            'category_id' => Category::inRandomOrder()->first()->id, // Выбираем случайную категорию
            'visitor_id' => Visitor::inRandomOrder()->first()->id, // Выбираем случайного посетителя
            'reception_id' => Reception::inRandomOrder()->first()->id
        ];
    }
}
