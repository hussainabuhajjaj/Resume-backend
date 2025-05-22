<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeoDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    
        \Firefly\FilamentBlog\Models\SeoDetail::factory()->count(5)->create([
            [
                'post_id' => \Firefly\FilamentBlog\Models\Post::inRandomOrder()->first()->id,
                'keywords' => json_encode($this->generateKeywords()),
                'title' => 'Sample SEO Title',
                'description' => 'Sample SEO Description',
                'user_id' => 1,
            ], 
            [
                'post_id' => \Firefly\FilamentBlog\Models\Post::inRandomOrder()->first()->id,
                'keywords' => json_encode($this->generateKeywords()),
                'title' => 'Sample SEO Title',
                'description' => 'Sample SEO Description',
                'user_id' => 2,
            ],
            [
                'post_id' => \Firefly\FilamentBlog\Models\Post::inRandomOrder()->first()->id,
                'keywords' => json_encode($this->generateKeywords()),
                'title' => 'Sample SEO Title',
                'description' => 'Sample SEO Description',
                'user_id' => 3,
            ],      
            [
                'post_id' => \Firefly\FilamentBlog\Models\Post::inRandomOrder()->first()->id,
                'keywords' => json_encode($this->generateKeywords()),
                'title' => 'Sample SEO Title',
                'description' => 'Sample SEO Description',
                'user_id' => 4,
            ],
            [
                'post_id' => \Firefly\FilamentBlog\Models\Post::inRandomOrder()->first()->id,
                'keywords' => json_encode($this->generateKeywords()),
                'title' => 'Sample SEO Title',
                'description' => 'Sample SEO Description',
                'user_id' => 5,
            ],
        ]);
    

       

  

}
    private function generateKeywords(): array
    {
        $keywords = [];
        for ($i = 0; $i < 5; $i++) {
            $keywords[] = \Firefly\FilamentBlog\Models\SeoDetail::KEYWORDS[array_rand(\Firefly\FilamentBlog\Models\SeoDetail::KEYWORDS)];
        }
        return array_unique($keywords);
    }
}
