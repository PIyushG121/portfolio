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
    $techStackRow1 = [
        ['label' => 'React.js', 'icon' => 'assets/img/assets_logo/react.svg'],
        ['label' => 'Next.js', 'icon' => 'assets/img/assets_logo/nextjs.svg'],
        ['label' => 'TypeScript', 'icon' => 'assets/img/assets_logo/typescript.svg'],
        ['label' => 'Tailwind CSS', 'icon' => 'assets/img/assets_logo/tailwind.svg'],
        ['label' => 'Laravel', 'icon' => 'assets/img/assets_logo/laravel.svg'],
        ['label' => 'Node.js', 'icon' => 'assets/img/assets_logo/node.svg'],
        ['label' => 'Express.js', 'icon' => 'assets/img/assets_logo/express.svg'],
        ['label' => 'MySQL', 'icon' => 'assets/img/assets_logo/mysql.svg'],
    ];

    $techStackRow2 = [
        ['label' => 'MongoDB', 'icon' => 'assets/img/assets_logo/mongo.svg'],
        ['label' => 'PostgreSQL', 'icon' => 'assets/img/assets_logo/postgres.svg'],
        ['label' => 'Git', 'icon' => 'assets/img/assets_logo/git.svg'],
        ['label' => 'GitHub', 'icon' => 'assets/img/assets_logo/github.svg'],
        ['label' => 'Docker', 'icon' => 'assets/img/assets_logo/docker.svg'],
        ['label' => 'Figma', 'icon' => 'assets/img/assets_logo/figma.svg'],
        ['label' => 'VS Code', 'icon' => 'assets/img/assets_logo/vscode.svg'],
        ['label' => 'Postman', 'icon' => 'assets/img/assets_logo/postman.svg'],
    ];

    $skillMeta = [
        'React.js / Next.js' => [
            'icon' => 'assets/img/assets_logo/react.svg',
            'level' => 'Advanced',
        ],
        'Laravel' => [
            'icon' => 'assets/img/assets_logo/laravel.svg',
            'level' => 'Advanced',
        ],
        'JavaScript / TypeScript' => [
            'icon' => 'assets/img/assets_logo/javascript.svg',
            'level' => 'Advanced',
        ],
        'Node.js' => [
            'icon' => 'assets/img/assets_logo/node.svg',
            'level' => 'Strong',
        ],
        'Python' => [
            'icon' => 'assets/img/assets_logo/python.svg',
            'level' => 'Strong',
        ],
        'PHP' => [
            'icon' => 'assets/img/assets_logo/php.svg',
            'level' => 'Strong',
        ],
        'MySQL / PostgreSQL' => [
            'icon' => 'assets/img/assets_logo/mysql.svg',
            'level' => 'Strong',
        ],
        'AI/ML (LangChain, Gemini AI, RAG)' => [
            'icon' => 'assets/img/assets_logo/aiml.svg',
            'level' => 'Intermediate',
        ],
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

    .about-tech-card {
        padding: 24px 28px;
        overflow: hidden;
    }

    .about-card-title .icon-code {
        color: #2d72ff;
        font-weight: 800;
        font-family: monospace;
        font-size: 22px;
        letter-spacing: -1px;
    }

    .marquee-container {
        display: flex;
        flex-direction: column;
        gap: 16px;
        position: relative;
        overflow: hidden;
        mask-image: linear-gradient(to right, transparent, black 8%, black 92%, transparent);
        -webkit-mask-image: linear-gradient(to right, transparent, black 8%, black 92%, transparent);
        padding: 6px 0;
    }

    .marquee-row {
        display: flex;
        overflow: hidden;
        user-select: none;
        width: 100%;
    }

    .marquee-track {
        display: flex;
        flex-shrink: 0;
        gap: 14px;
        align-items: center;
        white-space: nowrap;
        will-change: transform;
        padding-right: 14px;
    }

    .marquee-row-left .marquee-track {
        animation: marquee-left 25s linear infinite;
    }

    .marquee-row-right .marquee-track {
        animation: marquee-right 25s linear infinite;
    }

    .marquee-container:hover .marquee-track {
        animation-play-state: paused;
    }

    @keyframes marquee-left {
        0% {
            transform: translateX(0%);
        }
        100% {
            transform: translateX(-50%);
        }
    }

    @keyframes marquee-right {
        0% {
            transform: translateX(-50%);
        }
        100% {
            transform: translateX(0%);
        }
    }

    .tech-pill {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 10px 18px;
        border: 1px solid #eef2f6;
        border-radius: 14px;
        background: #ffffff;
        color: #334155;
        font-weight: 500;
        font-size: 15px;
        box-shadow: 0 4px 12px rgba(15, 41, 77, 0.04);
        transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        cursor: pointer;
    }

    .tech-pill:hover {
        transform: translateY(-2px) scale(1.03);
        border-color: #cbd5e1;
        box-shadow: 0 8px 20px rgba(45, 114, 255, 0.12);
        background: #f8fafc;
    }

    .tech-pill img,
    .tech-pill svg {
        flex-shrink: 0;
        display: block;
        width: 22px;
        height: 22px;
        object-fit: contain;
    }

    .skills-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 20px;
    }

    .skill-card {
        background: #ffffff;
        border: 1px solid #eef2f6;
        border-radius: 16px;
        box-shadow: 0 4px 18px rgba(15, 41, 77, 0.04);
        padding: 20px 24px;
        display: flex;
        flex-direction: column;
        gap: 12px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .skill-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(45, 114, 255, 0.09);
        border-color: #cbd5e1;
    }

    .skill-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
    }

    .skill-title-wrap {
        display: flex;
        align-items: center;
        gap: 12px;
        min-width: 0;
    }

    .skill-title-wrap img,
    .skill-title-wrap svg {
        width: 28px;
        height: 28px;
        object-fit: contain;
        flex-shrink: 0;
    }

    .skill-title-wrap span {
        font-size: 16px;
        font-weight: 700;
        color: #0f172a;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .skill-stats {
        display: flex;
        align-items: center;
        gap: 10px;
        flex-shrink: 0;
    }

    .skill-percent {
        font-size: 15px;
        font-weight: 800;
        color: #0f172a;
    }

    .skill-level-badge {
        background: #eff6ff;
        color: #2563eb;
        font-size: 13px;
        font-weight: 600;
        padding: 4px 12px;
        border-radius: 8px;
        display: inline-block;
    }

    .skill-bar-wrap {
        background: #f1f5f9;
        height: 7px;
        border-radius: 10px;
        overflow: hidden;
        width: 100%;
    }

    .skill-bar-fill {
        background: #2d72ff;
        height: 100%;
        border-radius: 10px;
        transition: width 1s ease-in-out;
    }

    /* Modern Resume Section UI */
    .resume-timeline-col {
        position: relative;
        padding-left: 28px;
    }

    .resume-timeline-col::before {
        content: "";
        position: absolute;
        top: 60px;
        bottom: 20px;
        left: 8px;
        width: 3px;
        background: linear-gradient(180deg, #2d72ff 0%, #cbd5e1 100%);
        border-radius: 4px;
    }

    .resume-header-badge {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 28px;
    }

    .resume-header-badge .header-icon {
        width: 44px;
        height: 44px;
        border-radius: 12px;
        background: #eff6ff;
        color: #2563eb;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        box-shadow: 0 4px 12px rgba(37, 99, 235, 0.1);
    }

    .resume-header-badge h3 {
        font-size: 22px;
        font-weight: 700;
        color: #0f172a;
        margin: 0;
    }

    .resume-card-wrap {
        position: relative;
        margin-bottom: 24px;
    }

    .resume-card-wrap::before {
        content: "";
        position: absolute;
        left: -28px;
        top: 24px;
        width: 15px;
        height: 15px;
        border-radius: 50%;
        background: #ffffff;
        border: 3.5px solid #2d72ff;
        box-shadow: 0 0 0 4px rgba(45, 114, 255, 0.15);
        z-index: 2;
    }

    .resume-card {
        background: #ffffff;
        border: 1px solid #eef2f6;
        border-radius: 18px;
        padding: 24px 28px;
        box-shadow: 0 4px 20px rgba(15, 41, 77, 0.04);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .resume-card:hover {
        transform: translateX(4px);
        box-shadow: 0 10px 30px rgba(45, 114, 255, 0.1);
        border-color: #cbd5e1;
    }

    .resume-card-title {
        font-size: 18px;
        font-weight: 700;
        color: #0f172a;
        margin-bottom: 8px;
    }

    .resume-meta-row {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 12px;
        margin-bottom: 14px;
    }

    .resume-date-badge {
        background: #eff6ff;
        color: #2563eb;
        font-size: 13px;
        font-weight: 600;
        padding: 4px 14px;
        border-radius: 20px;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .resume-company {
        color: #475467;
        font-size: 14px;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .resume-description-text {
        color: #334155;
        font-size: 15px;
        line-height: 1.6;
        margin: 0;
    }

    .resume-bullet-list {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .resume-bullet-list li {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        color: #334155;
        font-size: 14.5px;
        line-height: 1.65;
    }

    .resume-bullet-list li i {
        color: #2563eb;
        font-size: 16px;
        margin-top: 2px;
        flex-shrink: 0;
    }

    /* Modern Certifications & Achievements Section UI */
    .cert-card {
        background: #ffffff;
        border: 1px solid #eef2f6;
        border-radius: 18px;
        padding: 24px;
        box-shadow: 0 4px 20px rgba(15, 41, 77, 0.04);
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        gap: 16px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        height: 100%;
    }

    .cert-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 30px rgba(45, 114, 255, 0.1);
        border-color: #cbd5e1;
    }

    .cert-card-top {
        display: flex;
        align-items: flex-start;
        gap: 16px;
    }

    .cert-icon-sq {
        width: 48px;
        height: 48px;
        border-radius: 14px;
        background: #1d6bf3;
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        flex-shrink: 0;
        box-shadow: 0 6px 16px rgba(29, 107, 243, 0.25);
    }

    .cert-info h3 {
        font-size: 17px;
        font-weight: 700;
        color: #0f172a;
        margin-bottom: 4px;
    }

    .cert-issuer {
        color: #2563eb;
        font-weight: 600;
        font-size: 14px;
        margin-bottom: 8px;
        display: block;
    }

    .cert-desc {
        color: #475467;
        font-size: 13.5px;
        line-height: 1.55;
        margin: 0;
    }

    .cert-footer-badge {
        background: #f0f7ff;
        border-radius: 10px;
        padding: 8px 14px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        font-size: 12.5px;
        font-weight: 600;
        color: #2563eb;
    }

    .cert-footer-badge .badge-left {
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .cert-footer-badge .badge-right {
        display: flex;
        align-items: center;
        gap: 6px;
        color: #16a34a;
    }

    /* Achievements Metric Pastel Cards */
    .achievement-card {
        background: #ffffff;
        border: 1px solid #eef2f6;
        border-radius: 16px;
        padding: 18px 20px;
        display: flex;
        align-items: center;
        gap: 16px;
        box-shadow: 0 4px 14px rgba(15, 41, 77, 0.03);
        transition: all 0.25s ease;
        height: 100%;
    }

    .achievement-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 22px rgba(45, 114, 255, 0.08);
    }

    .achievement-icon-wrap {
        width: 44px;
        height: 44px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        flex-shrink: 0;
    }

    .achievement-icon-blue { background: #eff6ff; color: #2563eb; }
    .achievement-icon-green { background: #f0fdf4; color: #16a34a; }
    .achievement-icon-purple { background: #f5f3ff; color: #7c3aed; }
    .achievement-icon-orange { background: #fff7ed; color: #ea580c; }

    .achievement-content h4 {
        font-size: 20px;
        font-weight: 800;
        color: #0f172a;
        margin: 0;
        line-height: 1.2;
    }

    .achievement-content .ach-title {
        font-size: 14px;
        font-weight: 700;
        color: #1e293b;
    }

    .achievement-content p {
        font-size: 12px;
        color: #64748b;
        margin: 2px 0 0 0;
    }

    /* Featured Certificates Gallery */
    .featured-cert-card {
        background: #ffffff;
        border: 1px solid #eef2f6;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 18px rgba(15, 41, 77, 0.04);
        transition: all 0.3s ease;
        position: relative;
    }

    .featured-cert-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 30px rgba(45, 114, 255, 0.12);
    }

    .featured-cert-card img {
        width: 100%;
        height: 220px;
        object-fit: cover;
        display: block;
        transition: transform 0.4s ease;
    }

    .featured-cert-card:hover img {
        transform: scale(1.03);
    }

    .featured-cert-overlay {
        position: absolute;
        inset: 0;
        background: rgba(15, 23, 42, 0.4);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .featured-cert-card:hover .featured-cert-overlay {
        opacity: 1;
    }

    .featured-cert-overlay i {
        font-size: 28px;
        color: #ffffff;
        background: #2563eb;
        width: 48px;
        height: 48px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 6px 18px rgba(37, 99, 235, 0.4);
    }

    /* Modern Portfolio Section UI */
    .portfolio-filters-wrap {
        display: flex;
        align-items: center;
        gap: 8px;
        flex-wrap: wrap;
    }

    .portfolio-filter-btn {
        background: #ffffff;
        border: 1px solid #eef2f6;
        color: #475467;
        font-size: 13.5px;
        font-weight: 600;
        padding: 8px 18px;
        border-radius: 20px;
        cursor: pointer;
        transition: all 0.25s ease;
        box-shadow: 0 2px 8px rgba(15, 41, 77, 0.03);
    }

    .portfolio-filter-btn:hover,
    .portfolio-filter-btn.active {
        background: #1d6bf3;
        color: #ffffff;
        border-color: #1d6bf3;
        box-shadow: 0 4px 14px rgba(29, 107, 243, 0.3);
    }

    .project-card {
        background: #ffffff;
        border: 1px solid #eef2f6;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(15, 41, 77, 0.04);
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        height: 100%;
    }

    .project-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 14px 35px rgba(45, 114, 255, 0.12);
        border-color: #cbd5e1;
    }

    .project-img-wrap {
        position: relative;
        overflow: hidden;
        height: 220px;
        background: #0f172a;
    }

    .project-img-wrap img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    .project-card:hover .project-img-wrap img {
        transform: scale(1.04);
    }

    .project-external-btn {
        position: absolute;
        top: 16px;
        right: 16px;
        width: 38px;
        height: 38px;
        border-radius: 50%;
        background: #ffffff;
        color: #1d6bf3;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        box-shadow: 0 4px 14px rgba(0, 0, 0, 0.18);
        transition: all 0.25s ease;
        z-index: 3;
    }

    .project-external-btn:hover {
        background: #1d6bf3;
        color: #ffffff;
        transform: scale(1.1);
    }

    .project-body {
        padding: 22px 24px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .project-category-badge {
        background: #eff6ff;
        color: #2563eb;
        font-size: 12px;
        font-weight: 600;
        padding: 4px 12px;
        border-radius: 16px;
        display: inline-block;
        margin-bottom: 12px;
        align-self: flex-start;
    }

    .project-title {
        font-size: 17px;
        font-weight: 700;
        color: #0f172a;
        margin-bottom: 8px;
        line-height: 1.35;
    }

    .project-short-desc {
        color: #475467;
        font-size: 13.5px;
        line-height: 1.55;
        margin-bottom: 16px;
    }

    .project-tech-list {
        display: flex;
        flex-wrap: wrap;
        gap: 6px;
        margin-top: auto;
    }

    .project-tech-pill {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        color: #475467;
        font-size: 12px;
        font-weight: 500;
        padding: 3px 10px;
        border-radius: 8px;
    }

    .project-footer-actions {
        border-top: 1px solid #f1f5f9;
        display: flex;
        align-items: center;
        padding: 14px 24px;
    }

    .project-action-btn {
        flex: 1;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        color: #2563eb;
        font-size: 13.5px;
        font-weight: 600;
        text-decoration: none;
        transition: color 0.2s ease;
    }

    .project-action-btn:hover {
        color: #1d4ed8;
    }

    .project-action-divider {
        width: 1px;
        height: 20px;
        background: #e2e8f0;
    }

    /* CTA Banner: "Have a project in mind?" */
    .cta-project-box {
        background: #ffffff;
        border: 1px solid #eef2f6;
        border-radius: 18px;
        padding: 20px 28px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        box-shadow: 0 4px 20px rgba(15, 41, 77, 0.04);
        max-width: 680px;
        margin: 50px auto 0 auto;
    }

    .cta-icon-folder {
        width: 46px;
        height: 46px;
        border-radius: 12px;
        background: #eff6ff;
        color: #2563eb;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        flex-shrink: 0;
    }

    .cta-text h4 {
        font-size: 17px;
        font-weight: 700;
        color: #0f172a;
        margin: 0 0 2px 0;
    }

    .cta-text p {
        font-size: 13.5px;
        color: #64748b;
        margin: 0;
    }

    /* Modern Services Section UI */
    .service-card {
        background: #ffffff;
        border: 1px solid #eef2f6;
        border-radius: 20px;
        padding: 28px;
        box-shadow: 0 4px 20px rgba(15, 41, 77, 0.04);
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        gap: 20px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        height: 100%;
    }

    .service-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 14px 35px rgba(45, 114, 255, 0.12);
        border-color: #cbd5e1;
    }

    .service-icon-box {
        width: 48px;
        height: 48px;
        border-radius: 14px;
        background: #eff6ff;
        color: #2563eb;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        margin-bottom: 16px;
    }

    .service-card-title {
        font-size: 18px;
        font-weight: 700;
        color: #0f172a;
        margin-bottom: 6px;
        position: relative;
        padding-bottom: 10px;
    }

    .service-card-title::after {
        content: "";
        position: absolute;
        bottom: 0;
        left: 0;
        width: 32px;
        height: 2.5px;
        background: #2563eb;
        border-radius: 2px;
    }

    .service-card-desc {
        color: #475467;
        font-size: 13.5px;
        line-height: 1.6;
        margin: 0;
    }

    .service-tech-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 6px;
        margin-top: auto;
    }

    .service-tech-tag {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        color: #475467;
        font-size: 12px;
        font-weight: 500;
        padding: 4px 12px;
        border-radius: 14px;
    }

    /* Process Flow Banner */
    .process-card-box {
        background: #ffffff;
        border: 1px solid #eef2f6;
        border-radius: 20px;
        padding: 26px 28px;
        box-shadow: 0 4px 20px rgba(15, 41, 77, 0.04);
        height: 100%;
    }

    .process-step-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        position: relative;
        flex: 1;
    }

    .process-step-icon {
        width: 44px;
        height: 44px;
        border-radius: 50%;
        background: #1d6bf3;
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        box-shadow: 0 4px 14px rgba(29, 107, 243, 0.3);
        margin-bottom: 12px;
    }

    .process-step-title {
        font-size: 13.5px;
        font-weight: 700;
        color: #0f172a;
        margin-bottom: 4px;
    }

    .process-step-desc {
        font-size: 11.5px;
        color: #64748b;
        margin: 0;
        line-height: 1.4;
    }

    .process-connector {
        color: #cbd5e1;
        font-size: 18px;
        align-self: center;
        margin-bottom: 20px;
    }

    /* Technologies Grid Box */
    .tech-grid-box {
        background: #ffffff;
        border: 1px solid #eef2f6;
        border-radius: 20px;
        padding: 26px 28px;
        box-shadow: 0 4px 20px rgba(15, 41, 77, 0.04);
        height: 100%;
    }

    .tech-mini-grid {
        display: grid;
        grid-template-columns: repeat(6, 1fr);
        gap: 12px;
    }

    .tech-mini-item {
        background: #ffffff;
        border: 1px solid #eef2f6;
        border-radius: 12px;
        padding: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.02);
        transition: transform 0.2s ease;
    }

    .tech-mini-item:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 14px rgba(45, 114, 255, 0.1);
    }

    .tech-mini-item img {
        width: 24px;
        height: 24px;
        object-fit: contain;
    }

    /* Blue Primary CTA Banner */
    .blue-cta-banner {
        background: #1d6bf3;
        border-radius: 20px;
        padding: 28px 36px;
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        box-shadow: 0 8px 30px rgba(29, 107, 243, 0.25);
    }

    .blue-cta-banner .cta-icon-wrap {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        background: #ffffff;
        color: #1d6bf3;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        flex-shrink: 0;
    }

    .blue-cta-banner h3 {
        font-size: 19px;
        font-weight: 700;
        color: #ffffff;
        margin: 0 0 4px 0;
    }

    .blue-cta-banner p {
        font-size: 14px;
        color: rgba(255, 255, 255, 0.85);
        margin: 0;
    }

    /* Modern Contact Section UI */
    .contact-info-card {
        background: #ffffff;
        border: 1px solid #eef2f6;
        border-radius: 20px;
        padding: 26px 28px;
        box-shadow: 0 4px 20px rgba(15, 41, 77, 0.04);
        display: flex;
        flex-direction: column;
        gap: 22px;
    }

    .contact-info-item {
        display: flex;
        align-items: flex-start;
        gap: 16px;
    }

    .contact-info-icon {
        width: 44px;
        height: 44px;
        border-radius: 50%;
        background: #eff6ff;
        color: #2563eb;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        flex-shrink: 0;
    }

    .contact-info-content h4 {
        font-size: 15px;
        font-weight: 700;
        color: #0f172a;
        margin: 0 0 4px 0;
    }

    .contact-info-content p {
        font-size: 13.5px;
        color: #475467;
        margin: 0;
        line-height: 1.5;
    }

    .contact-map-card {
        background: #ffffff;
        border: 1px solid #eef2f6;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(15, 41, 77, 0.04);
        height: 250px;
        margin-top: 24px;
    }

    .contact-map-card iframe {
        width: 100%;
        height: 100%;
        border: 0;
    }

    .contact-form-card {
        background: #ffffff;
        border: 1px solid #eef2f6;
        border-radius: 20px;
        padding: 28px 32px;
        box-shadow: 0 4px 20px rgba(15, 41, 77, 0.04);
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .contact-form-card form {
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }

    .contact-form-card form .row {
        flex-grow: 1;
    }

    .contact-form-card .textarea-col {
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }

    .contact-form-card .textarea-col .contact-input-icon-wrap {
        display: flex;
        flex-direction: column;
        flex-grow: 1;
        height: 100%;
    }

    .contact-form-card .textarea-col textarea {
        flex-grow: 1;
        min-height: 170px;
        height: 100%;
    }

    .contact-input-icon-wrap {
        position: relative;
    }

    .contact-input-icon-wrap i {
        position: absolute;
        top: 50%;
        left: 16px;
        transform: translateY(-50%);
        color: #2563eb;
        font-size: 17px;
        pointer-events: none;
    }

    .contact-input-icon-wrap.textarea-wrap i {
        top: 20px;
        transform: none;
    }

    .contact-input-icon-wrap .form-control {
        padding-left: 44px;
        border-radius: 12px;
        border: 1px solid #e2e8f0;
        background: #ffffff;
        font-size: 14px;
        color: #0f172a;
        transition: all 0.2s ease;
    }

    .contact-input-icon-wrap .form-control:focus {
        border-color: #1d6bf3;
        box-shadow: 0 0 0 4px rgba(29, 107, 243, 0.1);
        outline: none;
    }

    .btn-contact-submit {
        background: #1d6bf3;
        color: #ffffff;
        font-size: 15px;
        font-weight: 600;
        padding: 13px 28px;
        border-radius: 12px;
        border: none;
        width: 100%;
        box-shadow: 0 6px 18px rgba(29, 107, 243, 0.28);
        transition: all 0.25s ease;
    }

    .btn-contact-submit:hover {
        background: #1557d0;
        box-shadow: 0 8px 24px rgba(29, 107, 243, 0.38);
        transform: translateY(-1px);
    }

    .contact-security-text {
        font-size: 12.5px;
        color: #64748b;
        margin-top: 14px;
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
    }

    .contact-cta-soft-banner {
        background: #f0f7ff;
        border: 1px solid #dbeafe;
        border-radius: 20px;
        padding: 22px 28px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        margin-top: 36px;
    }

    .contact-cta-soft-banner .cta-icon-wrap {
        width: 44px;
        height: 44px;
        border-radius: 50%;
        background: #ffffff;
        color: #1d6bf3;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        box-shadow: 0 4px 12px rgba(29, 107, 243, 0.12);
        flex-shrink: 0;
    }

    .contact-cta-soft-banner h4 {
        font-size: 16.5px;
        font-weight: 700;
        color: #0f172a;
        margin: 0 0 3px 0;
    }

    .contact-cta-soft-banner p {
        font-size: 13.5px;
        color: #475467;
        margin: 0;
    }

    @media (max-width: 991.98px) {
        .skills-grid {
            grid-template-columns: 1fr;
        }
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

    <div class="social-links text-center d-flex justify-content-center align-items-center gap-2">
        <a href="{{ $settings['github'] ?? '#' }}" target="_blank" rel="noreferrer" title="GitHub" class="d-inline-flex align-items-center justify-content-center">
            <img src="{{ asset('assets/img/assets_logo/github.svg') }}" alt="GitHub" width="20" height="20">
        </a>
        <a href="{{ $settings['linkedin'] ?? '#' }}" target="_blank" rel="noreferrer" title="LinkedIn" class="d-inline-flex align-items-center justify-content-center">
            <img src="{{ asset('assets/img/assets_logo/linkedin.svg') }}" alt="LinkedIn" width="20" height="20">
        </a>
        <a href="mailto:{{ $settings['email'] ?? 'contact@example.com' }}" target="_blank" rel="noreferrer" title="Email" class="d-inline-flex align-items-center justify-content-center">
            <img src="{{ asset('assets/img/assets_logo/mail.svg') }}" alt="Email" width="20" height="20">
        </a>
    </div>

    <nav id="navmenu" class="navmenu">
        <ul>
            <li><a href="#hero" class="active"><i class="bi bi-house navicon"></i>Home</a></li>
            <li><a href="#about"><i class="bi bi-person navicon"></i> About</a></li>
            <li><a href="#skills"><i class="bi bi-bar-chart navicon"></i> Skills</a></li>
            <li><a href="#resume"><i class="bi bi-file-earmark-text navicon"></i> Resume</a></li>
            <li><a href="#portfolio"><i class="bi bi-images navicon"></i> Portfolio</a></li>
            <li><a href="#services"><i class="bi bi-hdd-stack navicon"></i> Services</a></li>
            <li><a href="#certifications"><i class="bi bi-award navicon"></i> Certifications</a></li>
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
                    <span class="icon-code">&lt;/&gt;</span>
                    <span>Technologies & Tools</span>
                </div>

                <div class="marquee-container">
                    <div class="marquee-row marquee-row-left">
                        <div class="marquee-track">
                            @foreach (array_merge($techStackRow1, $techStackRow1) as $tech)
                                <div class="tech-pill">
                                    <img src="{{ asset($tech['icon']) }}" alt="{{ $tech['label'] }}" width="22" height="22">
                                    <span>{{ $tech['label'] }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="marquee-row marquee-row-right">
                        <div class="marquee-track">
                            @foreach (array_merge($techStackRow2, $techStackRow2) as $tech)
                                <div class="tech-pill">
                                    <img src="{{ asset($tech['icon']) }}" alt="{{ $tech['label'] }}" width="22" height="22">
                                    <span>{{ $tech['label'] }}</span>
                                </div>
                            @endforeach
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
            <div class="skills-grid">
                @foreach ($skills as $skill)
                    @php
                        $meta = $skillMeta[$skill->name] ?? [
                            'icon' => 'assets/img/assets_logo/react.svg',
                            'level' => ($skill->percent >= 85 ? 'Advanced' : ($skill->percent >= 75 ? 'Strong' : 'Intermediate'))
                        ];
                        $level = $meta['level'] ?? ($skill->percent >= 85 ? 'Advanced' : ($skill->percent >= 75 ? 'Strong' : 'Intermediate'));
                    @endphp
                    <div class="skill-card">
                        <div class="skill-header">
                            <div class="skill-title-wrap">
                                <img src="{{ asset($meta['icon']) }}" alt="{{ $skill->name }}">
                                <span>{{ $skill->name }}</span>
                            </div>
                            <div class="skill-stats">
                                <span class="skill-percent">{{ $skill->percent }}%</span>
                                <span class="skill-level-badge">{{ $level }}</span>
                            </div>
                        </div>
                        <div class="skill-bar-wrap">
                            <div class="skill-bar-fill" style="width: {{ $skill->percent }}%;"></div>
                        </div>
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
            <div class="row g-4">
                <div class="col-lg-6" data-aos="fade-up">
                    <div class="resume-timeline-col">
                        <div class="resume-header-badge">
                            <div class="header-icon"><i class="bi bi-mortarboard-fill"></i></div>
                            <h3>Education</h3>
                        </div>
                        @foreach ($educations as $education)
                            <div class="resume-card-wrap">
                                <div class="resume-card">
                                    <h4 class="resume-card-title">{{ $education->degree }}</h4>
                                    <div class="resume-meta-row">
                                        <span class="resume-date-badge">
                                            <i class="bi bi-calendar3"></i> {{ $education->years }}
                                        </span>
                                        <span class="resume-company">
                                            <i class="bi bi-building"></i> {{ $education->institution }}
                                        </span>
                                    </div>
                                    @if ($education->description)
                                        <p class="resume-description-text">{{ $education->description }}</p>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="resume-timeline-col">
                        <div class="resume-header-badge">
                            <div class="header-icon"><i class="bi bi-briefcase-fill"></i></div>
                            <h3>Experience</h3>
                        </div>
                        @foreach ($experiences as $experience)
                            <div class="resume-card-wrap">
                                <div class="resume-card">
                                    <h4 class="resume-card-title">{{ $experience->title }}</h4>
                                    <div class="resume-meta-row">
                                        <span class="resume-date-badge">
                                            <i class="bi bi-calendar3"></i> {{ $experience->years }}
                                        </span>
                                        <span class="resume-company">
                                            <i class="bi bi-building-fill-gear"></i> {{ $experience->company }}
                                        </span>
                                    </div>
                                    <ul class="resume-bullet-list">
                                        @foreach (preg_split('/\r\n|\r|\n/', (string) $experience->description) as $line)
                                            @if (trim($line) !== '')
                                                <li>
                                                    <i class="bi bi-check2-circle"></i>
                                                    <span>{{ ltrim(trim($line), '•- ') }}</span>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="certifications" class="certifications section">
        <div class="container section-title" data-aos="fade-up">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
                <div>
                    <h2>Certifications & Achievements</h2>
                    <p>Highlights that strengthen the portfolio beyond project screenshots.</p>
                </div>
            </div>
        </div>

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <!-- 1. Top Grid of Certification Cards -->
            <div class="row g-4 mb-5">
                @php
                    $certData = [
                        [
                            'title' => 'Cybersecurity Fundamentals',
                            'issuer' => 'IBM SkillsBuild',
                            'desc' => 'Gained foundational knowledge of cybersecurity principles, threats, security controls, and best practices.',
                            'icon' => 'bi bi-shield-check',
                            'date' => 'Jan 2025',
                            'image' => 'assets/img/certificates/cert-1.svg',
                        ],
                        [
                            'title' => 'AI & Machine Learning Bootcamp',
                            'issuer' => 'LearnTrail',
                            'desc' => 'Learned core ML concepts, model building, data preprocessing, and real-world AI applications.',
                            'icon' => 'bi bi-cpu-fill',
                            'date' => 'Mar 2025',
                            'image' => 'assets/img/certificates/cert-2.svg',
                        ],
                        [
                            'title' => 'Best Project Award - Walletry',
                            'issuer' => 'College / Internal',
                            'desc' => 'Awarded for developing an innovative and impactful solution with real-world use case and great presentation.',
                            'icon' => 'bi bi-trophy-fill',
                            'date' => 'Nov 2024',
                            'image' => 'assets/img/certificates/cert-3.svg',
                        ],
                    ];
                @endphp

                @foreach ($certifications as $index => $certification)
                    @php
                        $fallback = $certData[$index] ?? [
                            'desc' => 'Verified professional credential and achievement.',
                            'icon' => 'bi bi-patch-check-fill',
                            'date' => 'Issued',
                            'image' => 'assets/img/certificates/cert-1.svg',
                        ];
                        $iconClass = $fallback['icon'];
                        $descText = $fallback['desc'];
                        $dateText = $certification->issued_at ? $certification->issued_at->format('M Y') : $fallback['date'];
                    @endphp
                    <div class="col-lg-4 col-md-6">
                        <div class="cert-card">
                            <div class="cert-card-top">
                                <div class="cert-icon-sq">
                                    <i class="{{ $iconClass }}"></i>
                                </div>
                                <div class="cert-info">
                                    <h3>{{ $certification->title }}</h3>
                                    <span class="cert-issuer">{{ $certification->issuer }}</span>
                                    <p class="cert-desc">{{ $descText }}</p>
                                </div>
                            </div>
                            <div class="cert-footer-badge">
                                <span class="badge-left">
                                    <i class="bi bi-calendar3"></i> Issued: {{ $dateText }}
                                </span>
                                <span class="badge-right">
                                    <i class="bi bi-check-circle-fill"></i> Verified
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- 2. Achievements Metric Pastel Banner -->
            <div class="mb-5">
                <h3 class="fw-bold mb-3" style="font-size: 20px; color: #0f172a;">Achievements</h3>
                <div class="row g-3">
                    <div class="col-lg-3 col-md-6">
                        <div class="achievement-card">
                            <div class="achievement-icon-wrap achievement-icon-blue">
                                <i class="bi bi-code-slash"></i>
                            </div>
                            <div class="achievement-content">
                                <h4>{{ $settings['stat_projects_shipped'] ?? '3+' }}</h4>
                                <span class="ach-title">Projects Completed</span>
                                <p>Delivered end-to-end full stack solutions.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="achievement-card">
                            <div class="achievement-icon-wrap achievement-icon-green">
                                <i class="bi bi-rocket-takeoff"></i>
                            </div>
                            <div class="achievement-content">
                                <h4>{{ $settings['stat_internship_months'] ?? '6' }}</h4>
                                <span class="ach-title">Internship Months</span>
                                <p>Hands-on experience building real products.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="achievement-card">
                            <div class="achievement-icon-wrap achievement-icon-purple">
                                <i class="bi bi-cpu"></i>
                            </div>
                            <div class="achievement-content">
                                <h4>{{ $settings['stat_core_stack'] ?? '8+' }}</h4>
                                <span class="ach-title">Technologies Used</span>
                                <p>Worked with modern tech and tools.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="achievement-card">
                            <div class="achievement-icon-wrap achievement-icon-orange">
                                <i class="bi bi-star"></i>
                            </div>
                            <div class="achievement-content">
                                <h4>{{ $settings['stat_certifications'] ?? '2+' }}</h4>
                                <span class="ach-title">Certifications Earned</span>
                                <p>Continuously learning and upskilling.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 3. Featured Certificates Image Gallery -->
            <div>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3 class="fw-bold m-0" style="font-size: 20px; color: #0f172a;">Featured Certificates</h3>
                    <a href="#certifications" class="btn btn-outline-primary rounded-pill px-3 py-1 fw-semibold" style="font-size: 14px;">View All Certificates</a>
                </div>
                <div class="row g-4">
                    @foreach ($certifications as $index => $certification)
                        @php
                            $fallback = $certData[$index] ?? ['image' => 'assets/img/certificates/cert-1.svg'];
                            $imgPath = isset($certification->image_path) && $certification->image_path ? asset('storage/' . $certification->image_path) : asset($fallback['image']);
                        @endphp
                        <div class="col-lg-4 col-md-6">
                            <a href="{{ $imgPath }}" data-gallery="cert-gallery" class="glightbox featured-cert-card d-block">
                                <img src="{{ $imgPath }}" alt="{{ $certification->title }}" class="img-fluid">
                                <div class="featured-cert-overlay">
                                    <i class="bi bi-zoom-in"></i>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section id="portfolio" class="portfolio section light-background">
        <div class="container section-title" data-aos="fade-up">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                <div>
                    <h2>Portfolio</h2>
                    <p>Projects mapped from your updated plan and ready to be managed from the admin panel.</p>
                </div>
                <div class="portfolio-filters-wrap">
                    <button class="portfolio-filter-btn active" data-filter="*">All Projects</button>
                    <button class="portfolio-filter-btn" data-filter=".filter-web">Web Apps</button>
                    <button class="portfolio-filter-btn" data-filter=".filter-ai">AI / ML</button>
                    <button class="portfolio-filter-btn" data-filter=".filter-tool">Tools</button>
                    <button class="portfolio-filter-btn" data-filter=".filter-other">Others</button>
                </div>
            </div>
        </div>

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row g-4 isotope-container">
                @forelse ($projects as $project)
                    @php
                        $catFilter = match (strtolower($project->category)) {
                            'web application', 'web app' => 'filter-web',
                            'ai / ml', 'ai', 'ml' => 'filter-ai',
                            'tool', 'tools' => 'filter-tool',
                            default => 'filter-other',
                        };
                        $imgPath = $project->image_path ? asset($project->image_path) : asset('assets/img/portfolio/app-1.jpg');
                        $techPills = $project->tech_stack ? array_map('trim', explode(',', $project->tech_stack)) : ['Laravel', 'React.js', 'MySQL', 'Tailwind CSS'];
                    @endphp
                    <div class="col-lg-4 col-md-6 isotope-item {{ $catFilter }}">
                        <div class="project-card">
                            <div>
                                <div class="project-img-wrap">
                                    <img src="{{ $imgPath }}" alt="{{ $project->title }}">
                                    @if ($project->external_link)
                                        <a href="{{ $project->external_link }}" target="_blank" rel="noreferrer" class="project-external-btn" title="Live Preview">
                                            <i class="bi bi-box-arrow-up-right"></i>
                                        </a>
                                    @endif
                                </div>
                                <div class="project-body">
                                    <span class="project-category-badge">{{ $project->category }}</span>
                                    <h3 class="project-title">{{ $project->title }}</h3>
                                    <p class="project-short-desc">{{ $project->short_description }}</p>
                                    <div class="project-tech-list">
                                        @foreach ($techPills as $tech)
                                            <span class="project-tech-pill">{{ $tech }}</span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="project-footer-actions">
                                <a href="{{ $project->external_link ?? '#' }}" target="_blank" rel="noreferrer" class="project-action-btn">
                                    <span>View Details</span> <i class="bi bi-arrow-right"></i>
                                </a>
                                <div class="project-action-divider"></div>
                                <a href="{{ $project->github_link ?? 'https://github.com/piyush-gupta2003' }}" target="_blank" rel="noreferrer" class="project-action-btn text-dark">
                                    <i class="bi bi-github"></i> <span>GitHub</span>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p class="text-center text-muted">No projects have been published yet.</p>
                    </div>
                @endforelse
            </div>

            <!-- Call-To-Action Banner: Have a project in mind? -->
            <div class="cta-project-box">
                <div class="d-flex align-items-center gap-3">
                    <div class="cta-icon-folder">
                        <i class="bi bi-folder2-open"></i>
                    </div>
                    <div class="cta-text">
                        <h4>Have a project in mind?</h4>
                        <p>Let's build something amazing together.</p>
                    </div>
                </div>
                <a href="#contact" class="btn btn-primary rounded-pill px-4 py-2 fw-semibold d-inline-flex align-items-center gap-2">
                    <i class="bi bi-send-fill"></i> <span>Get In Touch</span>
                </a>
            </div>
        </div>
    </section>

    <section id="services" class="services section">
        <div class="container section-title" data-aos="fade-up">
            <h2>Services</h2>
            <p>Solutions I build to help businesses and individuals transform ideas into powerful digital products.</p>
        </div>

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <!-- 1. Top Grid of 3 Service Cards -->
            <div class="row g-4 mb-4">
                @php
                    $serviceTechTags = [
                        'Full Stack Web Development' => ['React.js', 'Next.js', 'Laravel', 'Node.js', 'MySQL', 'Tailwind CSS'],
                        'AI-Powered Applications' => ['Python', 'LangChain', 'RAG', 'Gemini API', 'FAISS', 'Vector DB'],
                        'REST API & Dashboard Development' => ['REST API', 'Express.js', 'Laravel', 'JWT Auth', 'MySQL', 'Dashboard'],
                    ];
                @endphp
                @foreach ($services as $service)
                    @php
                        $tags = $serviceTechTags[$service->title] ?? ['Web Apps', 'APIs', 'Database', 'Cloud'];
                    @endphp
                    <div class="col-lg-4 col-md-6">
                        <div class="service-card">
                            <div>
                                <div class="service-icon-box">
                                    <i class="{{ $service->icon }}"></i>
                                </div>
                                <h3 class="service-card-title">{{ $service->title }}</h3>
                                <p class="service-card-desc">{{ $service->description }}</p>
                            </div>
                            <div class="service-tech-tags">
                                @foreach ($tags as $tag)
                                    <span class="service-tech-tag">{{ $tag }}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- 2. Middle Grid: My Process & Technologies I Work With -->
            <div class="row g-4 mb-4">
                <div class="col-lg-7">
                    <div class="process-card-box">
                        <h3 class="fw-bold mb-4" style="font-size: 18px; color: #0f172a;">My Process</h3>
                        <div class="d-flex align-items-center justify-content-between gap-2">
                            <div class="process-step-item">
                                <div class="process-step-icon"><i class="bi bi-chat-text-fill"></i></div>
                                <span class="process-step-title">01. Discuss</span>
                                <p class="process-step-desc">Understand your requirements</p>
                            </div>
                            <span class="process-connector">⇢</span>
                            <div class="process-step-item">
                                <div class="process-step-icon"><i class="bi bi-lightbulb-fill"></i></div>
                                <span class="process-step-title">02. Plan</span>
                                <p class="process-step-desc">Plan architecture &amp; tech stack</p>
                            </div>
                            <span class="process-connector">⇢</span>
                            <div class="process-step-item">
                                <div class="process-step-icon"><i class="bi bi-code-slash"></i></div>
                                <span class="process-step-title">03. Build</span>
                                <p class="process-step-desc">Develop with clean code</p>
                            </div>
                            <span class="process-connector">⇢</span>
                            <div class="process-step-item">
                                <div class="process-step-icon"><i class="bi bi-rocket-takeoff-fill"></i></div>
                                <span class="process-step-title">04. Deploy</span>
                                <p class="process-step-desc">Test, deploy &amp; deliver on time</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="tech-grid-box">
                        <h3 class="fw-bold mb-4" style="font-size: 18px; color: #0f172a;">Technologies I Work With</h3>
                        <div class="tech-mini-grid">
                            <div class="tech-mini-item" title="React.js"><img src="{{ asset('assets/img/assets_logo/react.svg') }}" alt="React"></div>
                            <div class="tech-mini-item" title="Next.js"><img src="{{ asset('assets/img/assets_logo/nextjs.svg') }}" alt="Next.js"></div>
                            <div class="tech-mini-item" title="TypeScript"><img src="{{ asset('assets/img/assets_logo/typescript.svg') }}" alt="TypeScript"></div>
                            <div class="tech-mini-item" title="Node.js"><img src="{{ asset('assets/img/assets_logo/node.svg') }}" alt="Node.js"></div>
                            <div class="tech-mini-item" title="Laravel"><img src="{{ asset('assets/img/assets_logo/laravel.svg') }}" alt="Laravel"></div>
                            <div class="tech-mini-item" title="Python"><img src="{{ asset('assets/img/assets_logo/python.svg') }}" alt="Python"></div>
                            <div class="tech-mini-item" title="MySQL"><img src="{{ asset('assets/img/assets_logo/mysql.svg') }}" alt="MySQL"></div>
                            <div class="tech-mini-item" title="PostgreSQL"><img src="{{ asset('assets/img/assets_logo/postgres.svg') }}" alt="PostgreSQL"></div>
                            <div class="tech-mini-item" title="MongoDB"><img src="{{ asset('assets/img/assets_logo/mongo.svg') }}" alt="MongoDB"></div>
                            <div class="tech-mini-item" title="Tailwind CSS"><img src="{{ asset('assets/img/assets_logo/tailwind.svg') }}" alt="Tailwind"></div>
                            <div class="tech-mini-item" title="Git"><img src="{{ asset('assets/img/assets_logo/git.svg') }}" alt="Git"></div>
                            <div class="tech-mini-item" title="Docker"><img src="{{ asset('assets/img/assets_logo/docker.svg') }}" alt="Docker"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 3. Bottom Blue Call-To-Action Banner -->
            <div class="blue-cta-banner">
                <div class="d-flex align-items-center gap-3">
                    <div class="cta-icon-wrap">
                        <i class="bi bi-send-fill"></i>
                    </div>
                    <div>
                        <h3>Have a project in mind?</h3>
                        <p>Let's build something amazing together.</p>
                    </div>
                </div>
                <a href="#contact" class="btn btn-light rounded-pill px-4 py-2 text-primary fw-bold d-inline-flex align-items-center gap-2">
                    <span>Get In Touch</span> <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>

    <section id="contact" class="contact section">
        <div class="container section-title" data-aos="fade-up">
            <h2>Contact</h2>
            <p>Have a project in mind or want to work together? Send me a message — I'll get back to you as soon as possible.</p>
        </div>

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row g-4">
                <!-- Left Column: Info Card & Embedded Google Map -->
                <div class="col-lg-5">
                    <div class="contact-info-card">
                        <div class="contact-info-item">
                            <div class="contact-info-icon">
                                <i class="bi bi-geo-alt"></i>
                            </div>
                            <div class="contact-info-content">
                                <h4>Location</h4>
                                <p>{{ $settings['city'] ?? 'Rajajipuram, Lucknow, Uttar Pradesh 226017, India' }}</p>
                            </div>
                        </div>

                        <div class="contact-info-item">
                            <div class="contact-info-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                            <div class="contact-info-content">
                                <h4>Email</h4>
                                <p>{{ $settings['email'] ?? 'piyushgupta422003@gmail.com' }}</p>
                            </div>
                        </div>

                        <div class="contact-info-item">
                            <div class="contact-info-icon">
                                <i class="bi bi-telephone"></i>
                            </div>
                            <div class="contact-info-content">
                                <h4>Phone</h4>
                                <p>{{ $settings['phone'] ?? '+91 9555620175' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="contact-map-card">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14240.23157147585!2d80.8758804!3d26.8378942!2m3!1f0!0f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399bfc138eb15967%3A0xbca89547d639b70b!2sRajajipuram%2C%20Lucknow%2C%20Uttar%20Pradesh%20226017!5e0!3m2!1sen!2sin!4v1700000000000!5m2!1sen!2sin" width="100%" height="100%" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>

                <!-- Right Column: Interactive Contact Form Card -->
                <div class="col-lg-7">
                    <div class="contact-form-card">
                        @if (session('status'))
                            <div class="alert alert-success rounded-3 mb-4"><i class="bi bi-check-circle-fill me-2"></i>{{ session('status') }}</div>
                        @endif

                        <form action="{{ route('contact.store') }}" method="post">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="contact-input-icon-wrap">
                                        <i class="bi bi-person"></i>
                                        <input type="text" name="name" class="form-control py-3" placeholder="Your Name" value="{{ old('name') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="contact-input-icon-wrap">
                                        <i class="bi bi-envelope"></i>
                                        <input type="email" class="form-control py-3" name="email" placeholder="Your Email" value="{{ old('email') }}" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="contact-input-icon-wrap">
                                        <i class="bi bi-tag"></i>
                                        <input type="text" class="form-control py-3" name="subject" placeholder="Subject" value="{{ old('subject') }}" required>
                                    </div>
                                </div>
                                <div class="col-12 textarea-col">
                                    <div class="contact-input-icon-wrap textarea-wrap">
                                        <i class="bi bi-chat-dots"></i>
                                        <textarea class="form-control pt-3" name="message" rows="7" placeholder="Your Message" required>{{ old('message') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12 mt-4">
                                    <button type="submit" class="btn btn-contact-submit">
                                        <i class="bi bi-send-fill me-2"></i> Send Message
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="contact-security-text">
                            <i class="bi bi-lock-fill text-success"></i> Your information is safe with me. I'll never share your details.
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom Banner: Let's build something amazing together! -->
            <div class="contact-cta-soft-banner">
                <div class="d-flex align-items-center gap-3">
                    <div class="cta-icon-wrap">
                        <i class="bi bi-send-fill"></i>
                    </div>
                    <div>
                        <h4>Let's build something amazing together!</h4>
                        <p>I'm available for freelance projects, internships, and full-time opportunities.</p>
                    </div>
                </div>
                <a href="mailto:{{ $settings['email'] ?? 'piyushgupta422003@gmail.com' }}" class="btn btn-light border-primary rounded-pill px-4 py-2 text-primary fw-semibold d-inline-flex align-items-center gap-2">
                    <span>Get In Touch</span> <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>
</main>
@endsection
