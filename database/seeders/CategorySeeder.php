<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ["Web Development", "Data Science", "Mobile Development", "Programming Languages", "Game Development", "Database", "Software Testing", "Software Engineering", "Network & Security"];
        foreach ($categories as $key => $category) {
            Category::factory()->state([
                'name' => $category,
                'slug' => Str::slug($category)
            ])->create();
        }
    }
}
