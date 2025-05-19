<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    public function run()
    {
        $tags = ['Laravel', 'Vue.js', 'SEO', 'Google Ads', 'Remote Work', 'Personal Finance'];

        foreach ($tags as $tag) {
            DB::table(config('filamentblog.tables.prefix').'tags')->insert([
                'name' => $tag,
                'slug' => Str::slug($tag),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}