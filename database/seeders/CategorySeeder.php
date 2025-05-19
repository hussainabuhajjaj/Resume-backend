<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = ['Tech', 'Travel', 'Lifestyle', 'Food', 'Finance', 'Education'];

        foreach ($categories as $category) {
            DB::table(config('filamentblog.tables.prefix').'categories')->insert([
                'name' => $category,
                'slug' => Str::slug($category),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}