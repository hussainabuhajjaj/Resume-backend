<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
USE Firefly\FilamentBlog\Models\ShareSnippet;
class ShareSnippetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ShareSnippet::factory()->count(5)->create([
            [
                'script_code' => '<script src="https://example.com/script.js"></script>',
                'html_code' => '<div>Sample HTML Code</div>',
                'active' => true,
            ],
            [
                'script_code' => '<script src="https://example.com/script2.js"></script>',
                'html_code' => '<div>Sample HTML Code 2</div>',
                'active' => false,
            ],
            [
                'script_code' => '<script src="https://example.com/script3.js"></script>',
                'html_code' => '<div>Sample HTML Code 3</div>',
                'active' => true,
            ],
        ]);


    }
}
