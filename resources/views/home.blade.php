@extends('layouts.app')

@section('content')
<header id="header" class="header dark-background d-flex flex-column">
    <i class="header-toggle d-xl-none bi bi-list"></i>

    <div class="profile-img">
        <img src="{{ asset($settings['profile_image'] ?? 'assets/img/my-profile-img.jpg') }}" alt="Profile" class="img-fluid rounded-circle">
    </div>

    <a href="{{ route('home') }}" class="logo d-flex align-items-center justify-content-center">
        <h1 class="sitename">{{ $settings['hero_name'] ?? 'Portfolio' }}</h1>
    </a>

    <div class="social-links text-center">
        <a href="{{ $settings['twitter_url'] ?? '#' }}" class="twitter"><i class="bi bi-twitter-x"></i></a>
        <a href="{{ $settings['github_url'] ?? '#' }}" class="facebook"><i class="bi bi-github"></i></a>
        <a href="{{ $settings['linkedin_url'] ?? '#' }}" class="linkedin"><i class="bi bi-linkedin"></i></a>
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
        <img src="{{ asset($settings['hero_image'] ?? 'assets/img/hero-bg.jpg') }}" alt="Hero background" data-aos="fade-in">

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <h2>{{ $settings['hero_name'] ?? 'Portfolio' }}</h2>
            <p>I'm <span class="typed" data-typed-items="{{ $settings['hero_roles'] ?? 'Developer, Designer' }}"></span></p>
        </div>
    </section>

    <section id="about" class="about section">
        <div class="container section-title" data-aos="fade-up">
            <h2>About</h2>
            <p>{{ $settings['about_description'] ?? '' }}</p>
        </div>

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4 justify-content-center">
                <div class="col-lg-4">
                    <img src="{{ asset($settings['about_image'] ?? 'assets/img/my-profile-img.jpg') }}" class="img-fluid" alt="About image">
                </div>
                <div class="col-lg-8 content">
                    <h2>{{ $settings['about_title'] ?? '' }}</h2>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul>
                                <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong> <span>{{ $settings['email'] ?? '' }}</span></li>
                                <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong> <span>{{ $settings['phone'] ?? '' }}</span></li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul>
                                <li><i class="bi bi-chevron-right"></i> <strong>Location:</strong> <span>{{ $settings['location'] ?? '' }}</span></li>
                                <li><i class="bi bi-chevron-right"></i> <strong>Projects:</strong> <span>{{ $projects->count() }}</span></li>
                            </ul>
                        </div>
                    </div>
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
                            <p>{{ $experience->description }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section id="portfolio" class="portfolio section light-background">
        <div class="container section-title" data-aos="fade-up">
            <h2>Portfolio</h2>
            <p>Projects are managed from the admin panel and rendered here dynamically.</p>
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

    <section id="testimonials" class="testimonials section light-background">
        <div class="container section-title" data-aos="fade-up">
            <h2>Testimonials</h2>
        </div>

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="swiper init-swiper">
                <script type="application/json" class="swiper-config">
                    {"loop":true,"speed":600,"autoplay":{"delay":5000},"slidesPerView":"auto","pagination":{"el":".swiper-pagination","type":"bullets","clickable":true}}
                </script>
                <div class="swiper-wrapper">
                    @foreach ($testimonials as $testimonial)
                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>{{ $testimonial->quote }}</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                                <h3>{{ $testimonial->name }}</h3>
                                <h4>{{ $testimonial->role }}</h4>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
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
                                <p>{{ $settings['location'] ?? '' }}</p>
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
