<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

     /*
       'title',
        'slug',
        'sub_title',
        'body',
        'status',
        'published_at',
        'scheduled_for',
        'cover_photo_path',
        'photo_alt_text',
        'user_id',
     */
    public function run(): void
    {
     
    $posts = [
        [
            'title' => 'How to Build a Laravel Blog',
            'slug' => 'how-to-build-a-laravel-blog',
            'sub_title' => 'A step-by-step guide to building a blog with Laravel',
            'body' => 'In this post, we will walk through the process of building a blog using Laravel, covering migrations, models, controllers, and views.',
            'status' => 'published',
            'published_at' => now()->subDays(10),
            'scheduled_for' => null,
            'cover_photo_path' => 'covers/laravel-blog.jpg',
            'photo_alt_text' => 'Laravel blog cover image',
            'user_id' => 1,
        ],
        [
            'title' => 'Understanding Eloquent Relationships',
            'slug' => 'understanding-eloquent-relationships',
            'sub_title' => 'Mastering one-to-many and many-to-many in Laravel',
            'body' => 'Eloquent makes it easy to manage relationships between models. This post explains the different types and how to use them.',
            'status' => 'published',
            'published_at' => now()->subDays(7),
            'scheduled_for' => null,
            'cover_photo_path' => 'covers/eloquent-relationships.jpg',
            'photo_alt_text' => 'Eloquent relationships diagram',
            'user_id' => 2,
        ],
        [
            'title' => 'Deploying Laravel Apps to Production',
            'slug' => 'deploying-laravel-apps-to-production',
            'sub_title' => 'Best practices for deploying your Laravel application',
            'body' => 'Learn how to deploy your Laravel application safely and efficiently, including environment configuration and caching.',
            'status' => 'published',
            'published_at' => now()->subDays(5),
            'scheduled_for' => null,
            'cover_photo_path' => 'covers/deploy-laravel.jpg',
            'photo_alt_text' => 'Server deployment illustration',
            'user_id' => 1,
        ],
        [
            'title' => 'Getting Started with Filament Admin',
            'slug' => 'getting-started-with-filament-admin',
            'sub_title' => 'A beginner\'s guide to Filament for Laravel',
            'body' => 'Filament is a powerful admin panel for Laravel. This post introduces its features and how to set it up.',
            'status' => 'published',
            'published_at' => now()->subDays(3),
            'scheduled_for' => null,
            'cover_photo_path' => 'covers/filament-admin.jpg',
            'photo_alt_text' => 'Filament admin dashboard screenshot',
            'user_id' => 3,
        ],
        [
            'title' => 'Scheduling Tasks in Laravel',
            'slug' => 'scheduling-tasks-in-laravel',
            'sub_title' => 'Automate your workflow with Laravel Scheduler',
            'body' => 'The Laravel Scheduler allows you to automate repetitive tasks. Learn how to set up and manage scheduled jobs.',
            'status' => 'published',
            'published_at' => now()->subDay(),
            'scheduled_for' => null,
            'cover_photo_path' => 'covers/laravel-scheduler.jpg',
            'photo_alt_text' => 'Clock and calendar illustration',
            'user_id' => 2,
        ],
    ];

    foreach ($posts as $post) {
        \Firefly\FilamentBlog\Models\Post::create($post);
    }
       
    }
}
