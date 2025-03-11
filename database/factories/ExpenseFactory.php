<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Expense;
use App\Models\Income;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;


class ExpenseFactory extends Factory
{
    public function definition(): array
    {
        $user = User::inRandomOrder()->first();

        $totalIncome = Income::where('user_id', $user->id)->sum('amount');
        $totalExpenses = Expense::where('user_id', $user->id)->sum('amount');
        $maxExpenseAmount = max(1, $totalIncome - $totalExpenses);

        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'category_id' => Category::inRandomOrder()->first()->id,
            'date' => $this->faker->dateTimeBetween('2015-01-01', '2025-03-31')->format('Y-m-d'),
            'amount' => $this->faker->randomFloat(2, 1, $maxExpenseAmount),
            'description' => $this->faker->sentence(),
        ];
    }
}
