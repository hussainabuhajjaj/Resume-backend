<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \Firefly\FilamentBlog\Models\Comment::factory()->count(5)->create([
            [
                'post_id' => \Firefly\FilamentBlog\Models\Post::inRandomOrder()->first()->id,
                'user_id' => 1,
                'content' => 'Sample comment content',
                'approved' => true,
            ],
            [
                'post_id' => \Firefly\FilamentBlog\Models\Post::inRandomOrder()->first()->id,
                'user_id' => 2,
                'content' => 'Sample comment content',
                'approved' => false,
            ],
            [
                'post_id' => \Firefly\FilamentBlog\Models\Post::inRandomOrder()->first()->id,
                'user_id' => 3,
                'content' => 'Sample comment content',
                'approved' => true,
            ],
        ]);
    }
}
