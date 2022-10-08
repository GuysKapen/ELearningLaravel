<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages = ["English", "Vietnamese", "French", "Spanish", "Hindi", "Russian", "Japanese", "Bengali", "Korean"];
        foreach ($languages as $key => $language) {
            Language::factory()->state([
                'name' => $language,
                'slug' => Str::slug($language)
            ])->create();
        }
    }
}
