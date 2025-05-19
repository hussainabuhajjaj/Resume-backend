<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
 \App\Models\PersonalInfo::factory()->create();
    // $this->call([
    //     TechSeeder::class,
    //      ExperienceSeeder::class,
    //      CategorySeeder::class,
    //    TagSeeder::class,
    //     //PostSeeder::class,
    //     //CategoryPostSeeder::class,
    //    // PostTagSeeder::class,
    //    // SeoDetailSeeder::class,
    //    // CommentSeeder::class,
    //    // NewsletterSeeder::class,
    //   // ShareSnippetSeeder::class,
    //   // SettingSeeder::class,
    // ]);
      //  User::factory()->create([ 'name' => 'TestUser',
        //    'email' => 'test@example.com',
      //  ]);
    }
}
