<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\ProgrammingLanguage;

class ProgrammingLanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $programmingLanguages = ["Python", "Java", "Kotlin", "C", "C plus plus", "Javascript", "Swift", "C sharp", "Perl"];
        foreach ($programmingLanguages as $key => $programmingLanguage) {
            ProgrammingLanguage::factory()->state([
                'name' => $programmingLanguage,
                'slug' => Str::slug($programmingLanguage)
            ])->create();
        }
    }
}
