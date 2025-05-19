<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TechCategory;
use App\Models\TechItem;

class TechSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            'Project Management' => [
                ['Project Management', 5],
                ['Agile/Scrum', 5],
                ['SDLC', 4],
                ['Risk Management', 4],
                ['Resource Allocation', 4],
                ['Leadership & Communication', 5],
                ['Team Leadership', 5],
                ['Client Management', 4],
                ['Conflict Resolution', 4],
            ],
            'Technical Knowledge' => [
                ['Laravel', 5],
                ['Vue.js', 4],
                ['RESTful APIs', 5],
                ['ASP.NET', 3],
                ['MySQL', 5],
                ['SQL Server', 3],
            ],
            'Business Skills' => [
                ['Budgeting', 4],
                ['Strategic Planning', 4],
                ['Negotiation', 4],
                ['Digital Marketing', 3],
            ],
            'Tools' => [
                ['Jira', 4],
                ['Trello', 5],
                ['Asana', 4],
                ['Git', 5],
                ['Microsoft Office', 5],
            ],
            'Languages' => [
                ['Arabic (Native)', 5],
                ['English (Fluent)', 5],
            ],
        ];

        $order = 1;
        foreach ($data as $category => $items) {
            $techCategory = TechCategory::create([
                'name' => $category,
                'order' => $order++,
            ]);

            $itemOrder = 1;
            foreach ($items as [$name, $level]) {
                TechItem::create([
                    'tech_category_id' => $techCategory->id,
                    'name' => $name,
                    'icon_url_or_svg' => null,
                    'proficiency_level' => $level,
                    'order' => $itemOrder++,
                ]);
            }
        }
    }
}