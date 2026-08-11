<?php

namespace Database\Seeders;

use App\Models\Education;
use App\Models\Experience;
use App\Models\Project;
use App\Models\Service;
use App\Models\SiteSetting;
use App\Models\Skill;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::query()->firstOrCreate(
            ['email' => env('ADMIN_EMAIL', 'admin@example.com')],
            [
                'name' => 'Admin User',
                'password' => env('ADMIN_PASSWORD', 'password'),
            ]
        );

        $settings = [
            'site_title' => 'My Portfolio',
            'meta_description' => 'Laravel portfolio site built from the iPortfolio template.',
            'hero_name' => 'Alex Smith',
            'hero_roles' => 'Designer, Developer, Freelancer',
            'about_title' => 'Full-stack developer building clean digital experiences.',
            'about_description' => 'I help businesses and founders turn ideas into polished websites and products.',
            'about_image' => 'assets/img/my-profile-img.jpg',
            'hero_image' => 'assets/img/hero-bg.jpg',
            'profile_image' => 'assets/img/my-profile-img.jpg',
            'email' => 'hello@example.com',
            'phone' => '+91 90000 00000',
            'location' => 'Kolkata, India',
            'linkedin_url' => 'https://linkedin.com',
            'github_url' => 'https://github.com',
            'twitter_url' => 'https://x.com',
        ];

        foreach ($settings as $key => $value) {
            SiteSetting::query()->updateOrCreate(['key' => $key], ['value' => $value]);
        }

        foreach ([
            ['name' => 'Laravel', 'percent' => 92, 'sort_order' => 1],
            ['name' => 'PHP', 'percent' => 88, 'sort_order' => 2],
            ['name' => 'Bootstrap', 'percent' => 84, 'sort_order' => 3],
            ['name' => 'JavaScript', 'percent' => 80, 'sort_order' => 4],
        ] as $skill) {
            Skill::query()->updateOrCreate(['name' => $skill['name']], $skill);
        }

        foreach ([
            [
                'degree' => 'B.Tech in Computer Science',
                'institution' => 'Your University',
                'years' => '2018 - 2022',
                'description' => 'Focused on software engineering, UI systems, and product delivery.',
                'sort_order' => 1,
            ],
        ] as $education) {
            Education::query()->updateOrCreate(
                ['degree' => $education['degree'], 'institution' => $education['institution']],
                $education
            );
        }

        foreach ([
            [
                'title' => 'Full Stack Developer',
                'company' => 'Freelance',
                'years' => '2022 - Present',
                'description' => 'Building business websites, admin panels, and portfolio systems with Laravel.',
                'sort_order' => 1,
            ],
        ] as $experience) {
            Experience::query()->updateOrCreate(
                ['title' => $experience['title'], 'company' => $experience['company']],
                $experience
            );
        }

        foreach ([
            [
                'title' => 'Portfolio CMS',
                'category' => 'Web App',
                'short_description' => 'A Laravel portfolio site with dynamic content and project management.',
                'long_description' => 'This starter project includes a dynamic homepage, login flow, project CRUD, and contact form handling.',
                'image_path' => null,
                'external_link' => 'https://example.com',
                'featured' => true,
                'sort_order' => 1,
            ],
        ] as $project) {
            Project::query()->updateOrCreate(['title' => $project['title']], $project);
        }

        foreach ([
            [
                'title' => 'Portfolio Websites',
                'description' => 'Custom portfolio and business sites with a clean, fast backend.',
                'icon' => 'bi bi-briefcase',
            ],
            [
                'title' => 'Laravel Development',
                'description' => 'Admin dashboards, CRUD workflows, and maintainable application architecture.',
                'icon' => 'bi bi-code-slash',
            ],
            [
                'title' => 'UI Implementation',
                'description' => 'Responsive frontend implementation using Bootstrap-based systems.',
                'icon' => 'bi bi-phone',
            ],
        ] as $service) {
            Service::query()->updateOrCreate(['title' => $service['title']], $service);
        }

        foreach ([
            [
                'name' => 'Happy Client',
                'role' => 'Startup Founder',
                'photo_path' => null,
                'quote' => 'Clean communication, fast delivery, and a result that was easy to manage afterwards.',
            ],
        ] as $testimonial) {
            Testimonial::query()->updateOrCreate(['name' => $testimonial['name']], $testimonial);
        }
    }
}
