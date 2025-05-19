<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EducationItem;

class EducationSeeder extends Seeder
{
    public function run(): void
    {
        $educations = [
            [
                'institution_name'     => 'College of Intermediate Studies, Al-Azhar University',
                'degree_or_certificate'=> 'Diploma',
                'field_of_study'       => 'Programming and Database',
                'start_date'           => '2016-01-01',
                'end_date'             => '2018-01-01',
                'grade_or_score'       => null,
                'description'          => null,
                'order'                => 1,
            ],
            [
                'institution_name'     => 'Professional Certification',
                'degree_or_certificate'=> 'International Diploma',
                'field_of_study'       => 'Project Management',
                'start_date'           => '2013-01-01',
                'end_date'             => '2013-12-31',
                'grade_or_score'       => null,
                'description'          => null,
                'order'                => 2,
            ],
            [
                'institution_name'     => 'Professional Certification',
                'degree_or_certificate'=> 'International Diploma',
                'field_of_study'       => 'Business Management',
                'start_date'           => '2013-01-01',
                'end_date'             => '2013-12-31',
                'grade_or_score'       => null,
                'description'          => null,
                'order'                => 3,
            ],
            [
                'institution_name'     => 'Course/Certification',
                'degree_or_certificate'=> 'The Mystery of Modern Leadership',
                'field_of_study'       => null,
                'start_date'           => '2013-01-01',
                'end_date'             => '2013-12-31',
                'grade_or_score'       => null,
                'description'          => null,
                'order'                => 4,
            ],
            [
                'institution_name'     => 'Certification',
                'degree_or_certificate'=> 'NLP Certificate',
                'field_of_study'       => null,
                'start_date'           => '2014-01-01',
                'end_date'             => '2014-12-31',
                'grade_or_score'       => null,
                'description'          => null,
                'order'                => 5,
            ],
        ];

        foreach ($educations as $education) {
            EducationItem::create($education);
        }
    }
}