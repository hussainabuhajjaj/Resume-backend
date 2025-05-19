<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Experience;
use App\Models\ExperienceDescriptionPoint;

class ExperienceSeeder extends Seeder
{
    public function run(): void
    {
        $experiences = [
            [
                'title' => 'Founder & CEO / Project Manager',
                'company_name' => 'Avccode',
                'company_website' => null,
                'location' => 'Gaza Strip',
                'start_date' => '2016-01-01',
                'end_date' => '2024-01-01',
                'is_current' => false,
                'short_description' => 'Founded and led a full-service web development company.',
                'order' => 1,
                'points' => [
                    'Oversaw all phases of project development, from concept to delivery.',
                    'Managed budgeting, hiring, timelines, and client relations.',
                    'Supervised cross-functional teams of designers, developers, and marketers.',
                    'Delivered scalable applications across e-commerce, CMS, and custom platforms.',
                ]
            ],
            [
                'title' => 'Freelance Software Project Manager / Developer',
                'company_name' => 'Self-Employed',
                'company_website' => null,
                'location' => null,
                'start_date' => '2017-01-01',
                'end_date' => null,
                'is_current' => true,
                'short_description' => 'Led full-stack projects for international clients.',
                'order' => 2,
                'points' => [
                    'Created technical documentation, project scopes, and sprint plans.',
                    'Coordinated teams across time zones, ensuring deadlines and budgets were met.',
                    'Consulted clients on technology strategy and product roadmaps.',
                ]
            ],
        ];

        foreach ($experiences as $expData) {
            $points = $expData['points'];
            unset($expData['points']);

            $experience = Experience::create($expData);

            foreach ($points as $index => $point) {
                ExperienceDescriptionPoint::create([
                    'experience_id' => $experience->id,
                    'point_text' => $point,
                    'order' => $index + 1,
                ]);
            }
        }
    }
}