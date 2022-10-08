<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ["React", "Angular", "NodeJs", "TypeScript"];
        foreach ($tags as $key => $tag) {
            Tag::factory()->state([
                'tag' => $tag,
                'slug' => Str::slug($tag)
            ])->create();
        }
    }
}
