<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Add roles;
        // Admin id is 1
        DB::table('roles')->insert([
            'id' => 1,
            'name' => 'admin',
            'slug' => Str::slug('admin'),
        ]);

        // Author id is 2
        DB::table('roles')->insert([
            'id' => 2,
            'name' => 'author',
            'slug' => Str::slug('author'),
        ]);

        // User is 3
        DB::table('roles')->insert([
            'id' => 3,
            'name' => 'user',
            'slug' => Str::slug('user'),
        ]);

        // Admin
        User::factory()->state([
            'role_id' => '1',
            'email' => 'admin@gmail.com'
        ])->create();

        // Author
        User::factory()->state([
            'role_id' => '2',
            'email' => 'author@gmail.com'
        ])->create();

        $this->call([
            CategorySeeder::class,
            LanguageSeeder::class,
            ProgrammingLanguageSeeder::class,
            TagSeeder::class,
        ]);
    }
}
