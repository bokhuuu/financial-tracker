<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Expense;
use App\Models\Income;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {

        User::factory(20)->create();

        $categories = [
            'Food',
            'Transportation',
            'Entertainment',
            'Health',
            'Education',
        ];

        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }


        Income::factory(50)->create();
        Expense::factory(50)->create();
    }
}
