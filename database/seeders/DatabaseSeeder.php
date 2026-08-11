<?php

namespace Database\Seeders;

use App\Models\Certification;
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
            'site_title' => 'Piyush Gupta Portfolio',
            'meta_description' => 'Full Stack Developer portfolio for Piyush Gupta built with Laravel.',
            'name' => 'Piyush Gupta',
            'tagline' => 'Full Stack Developer',
            'bio' => 'Full Stack Developer and IT undergraduate skilled in React.js, Next.js, Laravel, Node.js, and modern databases. Experienced in building AI-powered applications, RESTful APIs, admin dashboards, and scalable web systems. Interested in AI, Machine Learning, Cyber Security, and Cloud Technologies.',
            'email' => 'piyushgupta422003@gmail.com',
            'phone' => '+91 9555620175',
            'city' => 'Rajajipuram, Lucknow, Uttar Pradesh 226017, India',
            'degree' => 'B.Tech, Information Technology (Honors in Cyber Security)',
            'freelance' => 'Available',
            'github' => 'https://github.com/piyush-gupta2003',
            'linkedin' => 'https://linkedin.com/in/piyushgupta2003',
            'profile_photo' => 'assets/img/my-profile-img.jpeg',
            'hero_bg' => 'assets/img/hero-bg.png',
            'stat_projects_shipped' => '3+',
            'stat_internship_months' => '6',
            'stat_certifications' => '2+',
            'stat_core_stack' => '8',
        ];

        foreach ($settings as $key => $value) {
            SiteSetting::query()->updateOrCreate(['key' => $key], ['value' => $value]);
        }

        foreach ([
            ['name' => 'React.js / Next.js', 'percent' => 90, 'sort_order' => 1],
            ['name' => 'Laravel', 'percent' => 85, 'sort_order' => 2],
            ['name' => 'JavaScript / TypeScript', 'percent' => 90, 'sort_order' => 3],
            ['name' => 'Node.js', 'percent' => 75, 'sort_order' => 4],
            ['name' => 'Python', 'percent' => 75, 'sort_order' => 5],
            ['name' => 'PHP', 'percent' => 80, 'sort_order' => 6],
            ['name' => 'MySQL / PostgreSQL', 'percent' => 80, 'sort_order' => 7],
            ['name' => 'AI/ML (LangChain, Gemini AI, RAG)', 'percent' => 70, 'sort_order' => 8],
        ] as $skill) {
            Skill::query()->updateOrCreate(['name' => $skill['name']], $skill);
        }

        foreach ([
            [
                'degree' => 'B.Tech, Information Technology (Honors in Cyber Security)',
                'institution' => 'Shri Ramswaroop Memorial College of Engineering and Management',
                'years' => '2022 - 2026',
                'description' => 'CGPA: 8.02/10',
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
                'title' => 'Full Stack Developer Intern',
                'company' => 'Webly Technolab',
                'years' => 'Jan 2026 - June 2026',
                'description' => "Built enterprise web apps using Laravel, React.js, PostgreSQL, and MySQL for prop trading and financial management platforms.\nDeveloped admin dashboards, REST APIs, authentication systems, and QR-based attendance management features.\nImplemented OCR pipelines to extract and structure data from scanned PDFs using Python automation.\nIntegrated payment gateways, third-party APIs, and cloud databases (Neon DB) in production environments.",
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
                'title' => 'Walletry – AI Finance Management Platform',
                'category' => 'Web Application',
                'short_description' => 'A smart finance management platform to track expenses, set budgets, and get AI-powered insights.',
                'long_description' => 'Implemented Clerk Authentication, Prisma ORM, and real-time financial dashboards. Stack: Next.js, TypeScript, Supabase, Gemini AI, Tailwind CSS, Shadcn UI.',
                'image_path' => 'assets/img/portfolio/walletry.svg',
                'external_link' => 'https://walletry.example.com',
                'github_link' => 'https://github.com/piyush-gupta2003/walletry',
                'tech_stack' => 'Laravel, React.js, MySQL, Tailwind CSS, Chart.js',
                'featured' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'AI Resume Analyzer',
                'category' => 'AI / ML',
                'short_description' => 'AI-powered resume parser and analyzer using NLP, RAG, and vector embeddings to extract insights.',
                'long_description' => 'Stack: Python, LangChain, HuggingFace, Gemini AI, FAISS, Gradio.',
                'image_path' => 'assets/img/portfolio/resume-analyzer.svg',
                'external_link' => 'https://resume-analyzer.example.com',
                'github_link' => 'https://github.com/piyush-gupta2003/ai-resume-analyzer',
                'tech_stack' => 'Python, LangChain, FAISS, Gemini API, Streamlit',
                'featured' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'Attendance Management System',
                'category' => 'Web Application',
                'short_description' => 'QR-based attendance system with real-time tracking, reports, and role-based access control.',
                'long_description' => 'Academic project. Stack: React.js, Laravel, MySQL, Tailwind CSS, Chart.js.',
                'image_path' => 'assets/img/portfolio/attendance.svg',
                'external_link' => 'https://attendance.example.com',
                'github_link' => 'https://github.com/piyush-gupta2003/attendance-system',
                'tech_stack' => 'Laravel, React.js, MySQL, QR Code, Tailwind CSS',
                'featured' => true,
                'sort_order' => 3,
            ],
        ] as $project) {
            Project::query()->updateOrCreate(['title' => $project['title']], $project);
        }

        foreach ([
            [
                'title' => 'Full Stack Web Development',
                'description' => 'End-to-end web applications using modern technologies. I build fast, scalable, and responsive web solutions tailored to your needs.',
                'icon' => 'bi bi-code-slash',
            ],
            [
                'title' => 'AI-Powered Applications',
                'description' => 'Building intelligent applications with LLMs, RAG pipelines, and semantic search to solve real-world problems and automate workflows.',
                'icon' => 'bi bi-cpu',
            ],
            [
                'title' => 'REST API & Dashboard Development',
                'description' => 'Develop secure REST APIs, admin dashboards, and authentication systems that are scalable, reliable, and easy to maintain.',
                'icon' => 'bi bi-speedometer2',
            ],
        ] as $service) {
            Service::query()->updateOrCreate(['title' => $service['title']], $service);
        }

        foreach ([
            [
                'title' => 'Cybersecurity Fundamentals',
                'issuer' => 'IBM SkillsBuild',
                'issued_at' => null,
                'sort_order' => 1,
            ],
            [
                'title' => 'AI & Machine Learning Bootcamp',
                'issuer' => 'LearnTrail',
                'issued_at' => null,
                'sort_order' => 2,
            ],
            [
                'title' => 'Best Project Award - Walletry',
                'issuer' => 'College / Internal',
                'issued_at' => null,
                'sort_order' => 3,
            ],
        ] as $certification) {
            Certification::query()->updateOrCreate(['title' => $certification['title']], $certification);
        }

        Testimonial::query()->delete();
    }
}
