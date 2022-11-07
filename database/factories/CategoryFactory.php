<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $outcomeCategories = ['Продукти', 'Комуналка', 'Транспорт', 'Розваги', 'Гігієна', 'Медицина', 'Одяг'];

        return [
            'name' => fake()->unique()->randomElement($outcomeCategories),
            'description' => fake()->text(100),
            'type' => 0
        ];          
    }

    public function income()
    {
        $incomeCategories = ['Зарплата', 'Стипендія', 'Бабуся', 'Кешбек'];

        return $this->state(function () use ($incomeCategories) {
            return [
                'name' => fake()->unique()->randomElement($incomeCategories),
                'type' => 1
            ];
        });
    }
}