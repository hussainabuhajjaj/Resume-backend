<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'name' => 'SoftExports',
                'description' => 'SoftExports is the region’s first B2B platform connecting buyers, suppliers, and manufacturers.',
                'project_url' => 'https://softexports.net', // replace with actual URL if known
                'image_url' => null,
                'repo_url' => null,
                'is_featured' => true,
                'order' => 1,
            ],
            [
                'name' => 'Sanabil Educational Platform',
                'description' => 'Sanabil is an innovative online learning platform focused on supporting high school students in Palestine.',
                'project_url' => null,
                'image_url' => null,
                'repo_url' => null,
                'is_featured' => true,
                'order' => 2,
            ],
            [
                'name' => 'Palestinian Trauma and Recovery Center',
                'description' => 'PalTSD is a nonprofit organization dedicated to supporting individuals affected by trauma in Palestine.',
                'project_url' => null,
                'image_url' => null,
                'repo_url' => null,
                'is_featured' => false,
                'order' => 3,
            ],
            [
                'name' => 'Heemam',
                'description' => 'Heemam is a leading Arabic e-learning platform based in Saudi Arabia offering a wide range of certifications.',
                'project_url' => null,
                'image_url' => null,
                'repo_url' => null,
                'is_featured' => true,
                'order' => 4,
            ],
            [
                'name' => '7thStreets',
                'description' => '7thStreets is a trendy online fashion store offering a curated collection of clothing and accessories.',
                'project_url' => 'https://7thstreets.com',
                'image_url' => null,
                'repo_url' => null,
                'is_featured' => true,
                'order' => 5,
            ],
            [
                'name' => 'MyHarvi',
                'description' => 'MyHarvi is a modern e-commerce store featuring a wide selection of lifestyle, fashion, and personal care products.',
                'project_url' => null,
                'image_url' => null,
                'repo_url' => null,
                'is_featured' => false,
                'order' => 6,
            ],
            [
                'name' => 'Concreteo',
                'description' => 'Concreteo is a multivendor e-commerce platform specializing in the sale of construction materials and tools.',
                'project_url' => null,
                'image_url' => null,
                'repo_url' => null,
                'is_featured' => false,
                'order' => 7,
            ],
            [
                'name' => 'TheOneDeals',
                'description' => 'TheOneDeals is a global deals platform offering exclusive discounts on software, tools, and services.',
                'project_url' => null,
                'image_url' => null,
                'repo_url' => null,
                'is_featured' => false,
                'order' => 8,
            ],
            [
                'name' => 'HalaQR',
                'description' => 'HalaQR is a digital invitation design and delivery platform for stylish, personalized invitations.',
                'project_url' => null,
                'image_url' => null,
                'repo_url' => null,
                'is_featured' => true,
                'order' => 9,
            ],
            [
                'name' => 'FourIslands',
                'description' => 'FourIslands General Trading & Contracting, founded in 1987, is a diversified company offering specialized industrial services.',
                'project_url' => null,
                'image_url' => null,
                'repo_url' => null,
                'is_featured' => false,
                'order' => 10,
            ],
            [
                'name' => 'Jmintel',
                'description' => 'Jmintel is a platform providing intelligence and analytics services.',
                'project_url' => null,
                'image_url' => null,
                'repo_url' => null,
                'is_featured' => false,
                'order' => 11,
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}