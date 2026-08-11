@extends('layouts.app')

@section('content')
@php
    $primaryEducation = $educations->first();
    $aboutHighlights = [
        ['icon' => 'bi bi-patch-check', 'label' => 'Problem Solver'],
        ['icon' => 'bi bi-code-square', 'label' => 'Clean Code Advocate'],
        ['icon' => 'bi bi-stars', 'label' => 'Quick Learner'],
        ['icon' => 'bi bi-people', 'label' => 'Team Player'],
    ];
    $whatIDo = [
        ['icon' => 'bi bi-window', 'title' => 'Web Development', 'text' => 'Building responsive and performant web applications.'],
        ['icon' => 'bi bi-hdd-network', 'title' => 'Backend Development', 'text' => 'Creating secure RESTful APIs and scalable backend systems.'],
        ['icon' => 'bi bi-cpu', 'title' => 'AI & Automation', 'text' => 'Integrating AI solutions and automation to solve real-world problems.'],
        ['icon' => 'bi bi-database', 'title' => 'Database Management', 'text' => 'Designing efficient database schemas and optimizing queries.'],
    ];
    $techStack = [
        ['icon' => 'bi bi-filetype-jsx', 'label' => 'React.js'],
        ['icon' => 'bi bi-layers', 'label' => 'Next.js'],
        ['icon' => 'bi bi-braces', 'label' => 'Laravel'],
        ['icon' => 'bi bi-boxes', 'label' => 'Node.js'],
        ['icon' => 'bi bi-database', 'label' => 'MySQL'],
        ['icon' => 'bi bi-server', 'label' => 'MongoDB'],
        ['icon' => 'bi bi-wind', 'label' => 'Tailwind CSS'],
        ['icon' => 'bi bi-github', 'label' => 'Git & GitHub'],
    ];
@endphp

<style>
    .about-modern {
        background: linear-gradient(180deg, #f8fbff 0%, #ffffff 100%);
    }

    .about-modern .section-title {
        padding-bottom: 24px;
    }

    .about-hero-card,
    .about-info-card,
    .about-services-card,
    .about-tech-card {
        background: #fff;
        border: 1px solid #e8eef7;
        border-radius: 22px;
        box-shadow: 0 12px 35px rgba(15, 41, 77, 0.08);
    }

    .about-copy {
        padding: 22px 0 0;
    }

    .about-copy p {
        font-size: 18px;
        line-height: 1.8;
        color: #475467;
        margin-bottom: 26px;
    }

    .about-highlight-list {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 14px;
    }

    .about-highlight {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 14px 18px;
        border: 1px solid #e5edf8;
        border-radius: 14px;
        background: #fff;
        color: #344054;
        font-weight: 500;
        box-shadow: 0 8px 20px rgba(15, 41, 77, 0.04);
    }

    .about-highlight i,
    .about-detail-icon,
    .about-service-icon,
    .tech-pill i {
        color: #2d72ff;
    }

    .about-hero-card {
        position: relative;
        overflow: hidden;
        min-height: 100%;
        background: linear-gradient(145deg, #edf5ff 0%, #dceaff 100%);
    }

    .about-hero-card::before,
    .about-hero-card::after {
        content: "";
        position: absolute;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.25);
    }

    .about-hero-card::before {
        width: 220px;
        height: 220px;
        top: -70px;
        right: -70px;
    }

    .about-hero-card::after {
        width: 160px;
        height: 160px;
        bottom: -40px;
        left: -40px;
    }

    .about-hero-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        position: relative;
        z-index: 2;
    }

    .experience-badge {
        position: absolute;
        left: 26px;
        bottom: 26px;
        z-index: 3;
        background: rgba(255, 255, 255, 0.94);
        padding: 16px 18px;
        border-radius: 18px;
        box-shadow: 0 16px 30px rgba(39, 89, 168, 0.18);
        min-width: 120px;
    }

    .experience-badge strong {
        display: block;
        font-size: 40px;
        line-height: 1;
        color: #2d72ff;
        margin-bottom: 8px;
    }

    .experience-badge span {
        display: block;
        color: #344054;
        font-weight: 500;
    }

    .about-info-card,
    .about-services-card,
    .about-tech-card {
        padding: 24px 28px;
    }

    .about-card-title {
        display: flex;
        align-items: center;
        gap: 12px;
        font-size: 30px;
        font-weight: 700;
        margin-bottom: 24px;
    }

    .about-card-title i {
        color: #2d72ff;
        font-size: 24px;
    }

    .about-detail-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 18px 28px;
    }

    .about-detail-item {
        display: flex;
        gap: 14px;
        padding: 16px 0;
        border-bottom: 1px solid #eef3f8;
    }

    .about-detail-item:nth-last-child(-n+2) {
        border-bottom: 0;
    }

    .about-detail-icon,
    .about-service-icon {
        width: 46px;
        height: 46px;
        border-radius: 50%;
        background: #eef4ff;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        flex-shrink: 0;
    }

    .about-detail-item h5,
    .about-service-item h5 {
        font-size: 21px;
        margin-bottom: 6px;
    }

    .about-detail-item p,
    .about-service-item p {
        margin: 0;
        color: #475467;
        line-height: 1.65;
    }

    .about-service-item {
        display: flex;
        gap: 14px;
        padding: 16px 0;
    }

    .about-service-item + .about-service-item {
        border-top: 1px solid #eef3f8;
    }

    .tech-pill-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 14px;
    }

    .tech-pill {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 12px 18px;
        border: 1px solid #e5edf8;
        border-radius: 14px;
        background: #fff;
        color: #344054;
        font-weight: 500;
        box-shadow: 0 8px 20px rgba(15, 41, 77, 0.04);
    }

    @media (max-width: 991.98px) {
        .about-highlight-list,
        .about-detail-grid {
            grid-template-columns: 1fr;
        }

        .about-detail-item:nth-last-child(-n+2) {
            border-bottom: 1px solid #eef3f8;
        }

        .about-detail-item:last-child {
            border-bottom: 0;
        }

        .about-hero-card {
            min-height: 420px;
        }
    }
</style>

<header id="header" class="header dark-background d-flex flex-column">
    <i class="header-toggle d-xl-none bi bi-list"></i>

    <div class="profile-img">
        <img src="{{ asset($settings['profile_photo'] ?? 'assets/img/my-profile-img.jpeg') }}" alt="Profile" class="img-fluid rounded-circle">
    </div>

    <a href="{{ route('home') }}" class="logo d-flex align-items-center justify-content-center">
        <h1 class="sitename">{{ $settings['name'] ?? 'Portfolio' }}</h1>
    </a>

    <div class="social-links text-center">
        <a href="{{ $settings['github'] ?? '#' }}" class="facebook" target="_blank" rel="noreferrer"><i class="bi bi-github"></i></a>
        <a href="{{ $settings['linkedin'] ?? '#' }}" class="linkedin" target="_blank" rel="noreferrer"><i class="bi bi-linkedin"></i></a>
    </div>

    <nav id="navmenu" class="navmenu">
        <ul>
            <li><a href="#hero" class="active"><i class="bi bi-house navicon"></i>Home</a></li>
            <li><a href="#about"><i class="bi bi-person navicon"></i> About</a></li>
            <li><a href="#skills"><i class="bi bi-bar-chart navicon"></i> Skills</a></li>
            <li><a href="#resume"><i class="bi bi-file-earmark-text navicon"></i> Resume</a></li>
            <li><a href="#portfolio"><i class="bi bi-images navicon"></i> Portfolio</a></li>
            <li><a href="#services"><i class="bi bi-hdd-stack navicon"></i> Services</a></li>
            <li><a href="#contact"><i class="bi bi-envelope navicon"></i> Contact</a></li>
        </ul>
    </nav>
</header>

<main class="main">
    <section id="hero" class="hero section dark-background">
        <img src="{{ asset($settings['hero_bg'] ?? 'assets/img/hero-bg.png') }}" alt="Hero background" data-aos="fade-in">

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <h2>{{ $settings['name'] ?? 'Portfolio' }}</h2>
            <p>I'm <span class="typed" data-typed-items="{{ $settings['tagline'] ?? 'Full Stack Developer' }}, Laravel Developer, AI Builder"></span></p>
        </div>
    </section>

    <section id="about" class="about about-modern section">
        <div class="container section-title" data-aos="fade-up">
            <h2>About Me</h2>
        </div>

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4 align-items-stretch mb-4">
                <div class="col-lg-7">
                    <div class="about-copy pe-lg-4">
                        <p>{{ $settings['bio'] ?? '' }}</p>

                        <div class="about-highlight-list">
                            @foreach ($aboutHighlights as $highlight)
                                <div class="about-highlight">
                                    <i class="{{ $highlight['icon'] }}"></i>
                                    <span>{{ $highlight['label'] }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="about-hero-card">
                        <img src="{{ asset('assets/img/about.png') }}" alt="About Piyush Gupta">
                        <div class="experience-badge">
                            <strong>2+</strong>
                            <span>Years of Experience</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row gy-4 mb-4">
                <div class="col-lg-7">
                    <div class="about-info-card h-100">
                        <div class="about-card-title">
                            <i class="bi bi-person-vcard"></i>
                            <span>Personal Information</span>
                        </div>

                        <div class="about-detail-grid">
                            <div class="about-detail-item">
                                <div class="about-detail-icon"><i class="bi bi-mortarboard"></i></div>
                                <div>
                                    <h5>Degree</h5>
                                    <p>{{ $settings['degree'] ?? '' }}</p>
                                </div>
                            </div>
                            <div class="about-detail-item">
                                <div class="about-detail-icon"><i class="bi bi-envelope"></i></div>
                                <div>
                                    <h5>Email</h5>
                                    <p>{{ $settings['email'] ?? '' }}</p>
                                </div>
                            </div>
                            <div class="about-detail-item">
                                <div class="about-detail-icon"><i class="bi bi-building"></i></div>
                                <div>
                                    <h5>University</h5>
                                    <p>{{ $primaryEducation?->institution ?? 'Shri Ramswaroop Memorial College of Engineering and Management' }}</p>
                                </div>
                            </div>
                            <div class="about-detail-item">
                                <div class="about-detail-icon"><i class="bi bi-telephone"></i></div>
                                <div>
                                    <h5>Phone</h5>
                                    <p>{{ $settings['phone'] ?? '' }}</p>
                                </div>
                            </div>
                            <div class="about-detail-item">
                                <div class="about-detail-icon"><i class="bi bi-geo-alt"></i></div>
                                <div>
                                    <h5>Location</h5>
                                    <p>{{ $settings['city'] ?? '' }}</p>
                                </div>
                            </div>
                            <div class="about-detail-item">
                                <div class="about-detail-icon"><i class="bi bi-briefcase"></i></div>
                                <div>
                                    <h5>Freelance</h5>
                                    <p>Available for opportunities</p>
                                </div>
                            </div>
                            <div class="about-detail-item">
                                <div class="about-detail-icon"><i class="bi bi-globe"></i></div>
                                <div>
                                    <h5>Languages</h5>
                                    <p>English, Hindi</p>
                                </div>
                            </div>
                            <div class="about-detail-item">
                                <div class="about-detail-icon"><i class="bi bi-kanban"></i></div>
                                <div>
                                    <h5>Projects</h5>
                                    <p>{{ $settings['stat_projects_shipped'] ?? $projects->count() }} Projects Shipped</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="about-services-card h-100">
                        <div class="about-card-title">
                            <i class="bi bi-folder2-open"></i>
                            <span>What I Do</span>
                        </div>

                        @foreach ($whatIDo as $item)
                            <div class="about-service-item">
                                <div class="about-service-icon"><i class="{{ $item['icon'] }}"></i></div>
                                <div>
                                    <h5>{{ $item['title'] }}</h5>
                                    <p>{{ $item['text'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="about-tech-card">
                <div class="about-card-title mb-3">
                    <i class="bi bi-code-slash"></i>
                    <span>Technologies I Work With</span>
                </div>

                <div class="tech-pill-grid">
                    @foreach ($techStack as $tech)
                        <div class="tech-pill">
                            <i class="{{ $tech['icon'] }}"></i>
                            <span>{{ $tech['label'] }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section id="skills" class="skills section light-background">
        <div class="container section-title" data-aos="fade-up">
            <h2>Skills</h2>
            <p>Core tools and technologies I use to ship quality work.</p>
        </div>

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row skills-content skills-animation">
                @foreach ($skills->chunk((int) ceil(max($skills->count(), 1) / 2)) as $column)
                    <div class="col-lg-6">
                        @foreach ($column as $skill)
                            <div class="progress">
                                <span class="skill"><span>{{ $skill->name }}</span> <i class="val">{{ $skill->percent }}%</i></span>
                                <div class="progress-bar-wrap">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="{{ $skill->percent }}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="resume" class="resume section">
        <div class="container section-title" data-aos="fade-up">
            <h2>Resume</h2>
            <p>Experience and education displayed from the CMS-ready database structure.</p>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-6" data-aos="fade-up">
                    <h3 class="resume-title">Education</h3>
                    @foreach ($educations as $education)
                        <div class="resume-item">
                            <h4>{{ $education->degree }}</h4>
                            <h5>{{ $education->years }}</h5>
                            <p><em>{{ $education->institution }}</em></p>
                            <p>{{ $education->description }}</p>
                        </div>
                    @endforeach
                </div>
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <h3 class="resume-title">Experience</h3>
                    @foreach ($experiences as $experience)
                        <div class="resume-item">
                            <h4>{{ $experience->title }}</h4>
                            <h5>{{ $experience->years }}</h5>
                            <p><em>{{ $experience->company }}</em></p>
                            <ul>
                                @foreach (preg_split('/\r\n|\r|\n/', (string) $experience->description) as $line)
                                    @if (trim($line) !== '')
                                        <li>{{ $line }}</li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section id="certifications" class="services section">
        <div class="container section-title" data-aos="fade-up">
            <h2>Certifications & Achievements</h2>
            <p>Highlights that strengthen the portfolio beyond project screenshots.</p>
        </div>

        <div class="container">
            <div class="row gy-4">
                @foreach ($certifications as $certification)
                    <div class="col-lg-4 col-md-6" data-aos="fade-up">
                        <div class="service-item position-relative h-100">
                            <div class="icon">
                                <i class="bi bi-patch-check"></i>
                            </div>
                            <h3>{{ $certification->title }}</h3>
                            <p>{{ $certification->issuer }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="portfolio" class="portfolio section light-background">
        <div class="container section-title" data-aos="fade-up">
            <h2>Portfolio</h2>
            <p>Projects mapped from your updated plan and ready to be managed from the admin panel.</p>
        </div>

        <div class="container">
            <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                @forelse ($projects as $project)
                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item">
                        <div class="portfolio-content h-100">
                            <img src="{{ $project->image_path ? asset('storage/' . $project->image_path) : asset('assets/img/portfolio/app-1.jpg') }}" class="img-fluid" alt="{{ $project->title }}">
                            <div class="portfolio-info">
                                <h4>{{ $project->title }}</h4>
                                <p>{{ $project->category }}</p>
                                <a href="{{ $project->image_path ? asset('storage/' . $project->image_path) : asset('assets/img/portfolio/app-1.jpg') }}" title="{{ $project->title }}" data-gallery="portfolio-gallery" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                @if ($project->external_link)
                                    <a href="{{ $project->external_link }}" title="Open project" class="details-link" target="_blank" rel="noreferrer"><i class="bi bi-link-45deg"></i></a>
                                @endif
                            </div>
                        </div>
                        <div class="pt-3">
                            <h5>{{ $project->title }}</h5>
                            <p>{{ $project->short_description }}</p>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p>No projects have been published yet.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <section id="services" class="services section">
        <div class="container section-title" data-aos="fade-up">
            <h2>Services</h2>
            <p>Offerings managed in the portfolio backend.</p>
        </div>

        <div class="container">
            <div class="row gy-4">
                @foreach ($services as $service)
                    <div class="col-lg-4 col-md-6" data-aos="fade-up">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="{{ $service->icon }}"></i>
                            </div>
                            <h3>{{ $service->title }}</h3>
                            <p>{{ $service->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="contact" class="contact section">
        <div class="container section-title" data-aos="fade-up">
            <h2>Contact</h2>
            <p>Send a message and it will be stored in the admin-ready contact table.</p>
        </div>

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4">
                <div class="col-lg-5">
                    <div class="info-wrap">
                        <div class="info-item d-flex">
                            <i class="bi bi-geo-alt flex-shrink-0"></i>
                            <div>
                                <h3>Location</h3>
                                <p>{{ $settings['city'] ?? '' }}</p>
                            </div>
                        </div>
                        <div class="info-item d-flex">
                            <i class="bi bi-envelope flex-shrink-0"></i>
                            <div>
                                <h3>Email</h3>
                                <p>{{ $settings['email'] ?? '' }}</p>
                            </div>
                        </div>
                        <div class="info-item d-flex">
                            <i class="bi bi-phone flex-shrink-0"></i>
                            <div>
                                <h3>Phone</h3>
                                <p>{{ $settings['phone'] ?? '' }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7">
                    @if (session('status'))
                        <div class="alert alert-success">{{ session('status') }}</div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="post">
                        @csrf
                        <div class="row gy-4">
                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="Your Name" value="{{ old('name') }}" required>
                            </div>
                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" placeholder="Your Email" value="{{ old('email') }}" required>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="subject" placeholder="Subject" value="{{ old('subject') }}" required>
                            </div>
                            <div class="col-md-12">
                                <textarea class="form-control" name="message" rows="8" placeholder="Message" required>{{ old('message') }}</textarea>
                            </div>
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
