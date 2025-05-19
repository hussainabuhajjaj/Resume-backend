<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PersonalInfoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => 'HUSSAIN ABUHAJAJJ',
            'title' => 'Software Project Manager | Former Full Stack Web Developer',
            'phone' => '+47 486 79 240',
            'email' => 'Hussain.h.ff32@gmail.com',
            'about' => 'Experienced Software Project Manager with a strong background in full-stack web development and entrepreneurial leadership. Proven ability to lead cross-functional teams, manage full project lifecycles, and deliver scalable, secure, and user-focused solutions. Adept at aligning business goals with technology strategies, ensuring timely and quality delivery of software projects.',
            'cv_url' => null,
            'avatar_image_url' => [],
            'hero_background_image_url' => null,
        ];
    }
}