<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use App\Models\Visitor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CourtCaseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'case_number' => fake()->unique()->randomNumber(6), // Генерируем уникальное шестизначное число
            'case_production_number' => fake()->randomNumber(8), // Генерируем шестизначное число для номера производства
            'visitor_id' => Visitor::inRandomOrder()->first()->id, // Выбираем случайного посетителя
            'user_id' => User::inRandomOrder()->first()->id, // Выбираем случайного пользователя
            'article_id' => Article::inRandomOrder()->first()->id, // Выбираем случайную статью
            'category_id' => Category::inRandomOrder()->first()->id, // Выбираем случайную категорию
            'google_drive_link' => fake()->url, // Генерируем случайную ссылку
            'case_status' => fake()->numberBetween(0, 2),
            'comment' => fake()->text(30),
        ];
    }
}
