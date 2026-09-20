/**
 * CLIENT PROJECTS & PRODUCTION WORK CONFIGURATION
 * 
 * Add, edit, or remove client projects you have worked on.
 * Images can be updated with screenshots in the 'public/assets/img/' or 'public/assets/img/portfolio/' folder.
 */

export const clientProjects = [
  {
    id: 'tradefluenza',
    title: 'TradeFluenza – Proprietary Trading & Prop Firm Platform',
    subtitle: 'Comprehensive FinTech platform featuring prop firm comparisons, broker evaluations, cashback rewards, webinars, and mentorship portals.',
    client: 'TradeFluenza',
    role: 'Full Stack & Frontend Developer',
    timeline: '2025 – 2026',
    category: 'FinTech & Trading',
    image: 'assets/img/portfolio/tradefluenza.svg',
    liveDemoUrl: 'https://tradefluenza.com/',
    tags: ['React.js', 'Tailwind CSS', 'RESTful APIs', 'Lucide Icons', 'FinTech', 'Prop Trading', 'Webinars & Events'],
    featured: true,
    highlights: [
      'Interactive Prop Firm & Broker comparison engine with real-time filtering by account size and profit split.',
      'Webinar & trading event ticketing system with live attendee tracking and countdowns.',
      'Cashback and discount promo claim pipeline with automated verification for trader purchases.',
      'High-conversion, mobile-responsive dark & modern neon UI design built with Tailwind CSS.'
    ],
    detailsHtml: `
      <div class="project-modal-content">
        <h4>About TradeFluenza</h4>
        <p>
          <strong>TradeFluenza</strong> (tradefluenza.com) is an ecosystem empowering global traders with in-depth proprietary firm comparisons, verified broker reviews, trader educational webinars, and cashback reward initiatives.
        </p>

        <h4>Key Deliverables & Implementations</h4>
        <ul class="project-feature-list">
          <li><strong>Prop Firm Comparison Engine:</strong> Dynamic filters allowing traders to compare evaluation accounts by capital level, profit split rules, drawdown parameters, and pricing.</li>
          <li><strong>Broker Directory & Reviews:</strong> Verified regulatory information, trader reviews, and broker analysis cards.</li>
          <li><strong>Trading Events & Webinars:</strong> Interactive schedule management for webinars, workshops, and international trading competitions.</li>
          <li><strong>Cashback Claim Portal:</strong> Dedicated multi-step entry submission form with transaction verification for prop challenge purchases.</li>
          <li><strong>Modern Responsive UI:</strong> Ultra-clean interface with gradient glassmorphic accents, animated metric counters, and accessible responsive layouts.</li>
        </ul>
      </div>
    `
  },
  {
    id: 'epaperbuy',
    title: 'Epaper Pro – AI-Powered Digital Publishing & RSS Aggregator',
    subtitle: 'Advanced e-paper and news publishing platform with AI OCR, automated RSS ingestion, multi-edition management, and white-labeling.',
    client: 'Epaper Pro',
    role: 'Full Stack Developer',
    timeline: '2025 – 2026',
    category: 'Publishing & AI',
    image: 'assets/img/portfolio/epaper.png',
    liveDemoUrl: 'https://epaperbuy.com/',
    exampleUrl: 'https://ladoora.in/',
    tags: ['Laravel', 'Tailwind CSS', 'AI OCR', 'RSS Aggregator', 'PDF Processing', 'MySQL'],
    featured: true,
    highlights: [
      'Automated high-precision AI OCR pipeline for extraction of article text from PDF newspapers.',
      'Powers live digital newspapers including Ladoora News (ladoora.in) with multi-edition readers.',
      'Automated multi-source RSS feed ingestion with scheduled background parsing jobs.',
      'White-label publisher support allowing distinct domains, custom styling, and branding.'
    ],
    detailsHtml: `
      <div class="project-modal-content">
        <h4>About Epaper Pro</h4>
        <p>
          <strong>Epaper Pro</strong> (epaperbuy.com) is a next-generation publishing platform enabling digital media houses and print newspapers to distribute interactive digital editions with automated OCR and RSS syndication.
        </p>

        <h4>Live Deployments & Examples</h4>
        <p>
          Powers major digital publications such as <strong>Ladoora News</strong> (<a href="https://ladoora.in/" target="_blank" rel="noreferrer">ladoora.in</a>) for daily edition distribution and breaking news broadcasting.
        </p>

        <h4>Key Deliverables</h4>
        <ul class="project-feature-list">
          <li><strong>AI OCR Processing:</strong> Automated text detection and zone mapping on uploaded PDF pages.</li>
          <li><strong>RSS Feeds Ingestion:</strong> Continuous background sync of article feeds categorized by geography and topic.</li>
          <li><strong>Monetization & Ad Manager:</strong> Placement zones for banner advertising and subscriber paywalls.</li>
        </ul>
      </div>
    `
  },
  {
    id: 'examinspect',
    title: 'ExamInspect – Online Assessment & Test Series Storefront',
    subtitle: 'Educational assessment marketplace providing test prep series, digital study materials, and instant online test delivery.',
    client: 'ExamInspect',
    role: 'Full Stack Developer',
    timeline: '2025',
    category: 'EdTech & E-Commerce',
    image: 'assets/img/portfolio/examinspect.png',
    liveDemoUrl: 'https://examinspect.com/',
    tags: ['Laravel', 'E-Commerce', 'MySQL', 'Payment Gateway', 'Assessment System', 'Bootstrap'],
    featured: true,
    highlights: [
      'Comprehensive exam series catalog with test bundles, subject breakdown, and sample tests.',
      'Integrated payment gateway for seamless digital checkouts and instant user enrollment.',
      'Timed mock exam engine with real-time scoring, answer key explanations, and rank analytics.',
      'Admin portal for uploading question banks, managing discounts, and tracking sales performance.'
    ],
    detailsHtml: `
      <div class="project-modal-content">
        <h4>About ExamInspect</h4>
        <p>
          <strong>ExamInspect</strong> (examinspect.com) is a comprehensive online assessment storefront providing mock exams and study resources for competitive test candidates.
        </p>
      </div>
    `
  },
  {
    id: 'drsuniturocare',
    title: 'Dr. Sunit Urocare – Specialized Urology Healthcare Portal',
    subtitle: 'Clinical healthcare portal for Dr. Sunit P. Tiwari with online appointment scheduling, treatment guides, and patient inquiries.',
    client: 'Dr. Sunit Urocare',
    role: 'Frontend & UI Developer',
    timeline: '2025',
    category: 'Healthcare & Medical',
    image: 'assets/img/portfolio/drsuniturocare.png',
    liveDemoUrl: 'https://drsuniturocare.com/',
    tags: ['HTML5/CSS3', 'JavaScript', 'Bootstrap 5', 'Appointment Booking', 'SEO Optimized'],
    featured: false,
    highlights: [
      'Interactive online consultation and clinic appointment request system.',
      'Detailed educational treatment modules for kidney stones, prostate care, and laparoscopic urology.',
      'Comprehensive local SEO optimization and Google Search Console integration for Lucknow healthcare.',
      'Direct WhatsApp and quick emergency contact integration for patients.'
    ],
    detailsHtml: `
      <div class="project-modal-content">
        <h4>About Dr. Sunit Urocare</h4>
        <p>
          <strong>Dr. Sunit Urocare</strong> (drsuniturocare.com) is the digital clinic portal for renowned urologist Dr. Sunit P. Tiwari in Lucknow, providing patient education and seamless consultation bookings.
        </p>
      </div>
    `
  },
  {
    id: 'tushartourandtravels',
    title: 'Tushar Tours & Travels – Online Bus Ticketing System',
    subtitle: 'Intercity travel portal offering AC Sleeper bus bookings, 2D seat selection, live tracking, and instant refunds across major Indian cities.',
    client: 'Tushar Tours & Travels',
    role: 'Full Stack Developer',
    timeline: '2025',
    category: 'Travel & Ticketing',
    image: 'assets/img/portfolio/tushartourandtravels.png',
    liveDemoUrl: 'https://tushartourandtravels.com/',
    tags: ['Laravel', 'MySQL', 'Payment Gateway', 'Bus Booking Engine', 'Seat Selection', 'Bootstrap'],
    featured: true,
    highlights: [
      'Dynamic 2D interactive upper & lower deck bus seat layout selector.',
      'Route management engine connecting Delhi, Lucknow, Jaipur, Mumbai, and regional hubs.',
      'Integrated payment gateway with instant SMS/email booking confirmation and ticket PDF download.',
      'Customer dashboard for viewing active journeys, ticket cancellation, and refund status.'
    ],
    detailsHtml: `
      <div class="project-modal-content">
        <h4>About Tushar Tours & Travels</h4>
        <p>
          <strong>Tushar Tours & Travels</strong> (tushartourandtravels.com) operates intercity bus travel with premium AC Sleeper coaches and seamless web booking infrastructure.
        </p>
      </div>
    `
  },
  {
    id: 'weblytechnolab',
    title: 'Webly Technolab – Agency Portal & Digital IT Solutions',
    subtitle: 'Official corporate website showcasing custom software architecture, digital marketing services, SaaS systems, and cloud solutions.',
    client: 'Webly Technolab',
    role: 'Full Stack Developer',
    timeline: '2025 – 2026',
    category: 'IT Agency & SaaS',
    image: 'assets/img/portfolio/weblytechnolab.png',
    liveDemoUrl: 'https://weblytechnolab.com/',
    tags: ['Laravel', 'Bootstrap 5', 'MySQL', 'SEO Systems', 'Digital IT Services'],
    featured: true,
    highlights: [
      'Interactive service showcase highlighting full-stack engineering, AI automation, and digital marketing.',
      'Case study portfolio and client review management system.',
      'Lead capture forms with automated email notifications and CRM pipeline integration.',
      'High-performance, mobile-optimized responsive layout with subtle CSS animations.'
    ],
    detailsHtml: `
      <div class="project-modal-content">
        <h4>About Webly Technolab</h4>
        <p>
          <strong>Webly Technolab</strong> (weblytechnolab.com) is an IT solutions provider delivering cutting-edge enterprise software, SaaS development, and growth marketing.
        </p>
      </div>
    `
  },
  {
    id: 'manavadhikara',
    title: 'Bhartiya Manavadhikar Parivar – NGO & Community Portal',
    subtitle: 'Human rights advocacy portal dedicated to social justice, monthly magazine publications, educational support, and membership enrollment.',
    client: 'Bhartiya Manavadhikar Parivar',
    role: 'Web Developer',
    timeline: '2025',
    category: 'NGO & Community',
    image: 'assets/img/portfolio/manavadhikara.png',
    liveDemoUrl: 'https://manavadhikara.in/',
    tags: ['PHP', 'Bootstrap 5', 'MySQL', 'Membership System', 'Multilingual Hindi/English'],
    featured: false,
    highlights: [
      'Online membership registration system with automated digital ID card generation.',
      'Monthly Hindi magazine digital publication archive with PDF read & download features.',
      'Community event gallery, press releases, and human rights awareness campaign tracking.',
      'Bilingual content support tailored for regional community outreach.'
    ],
    detailsHtml: `
      <div class="project-modal-content">
        <h4>About Bhartiya Manavadhikar Parivar</h4>
        <p>
          <strong>Bhartiya Manavadhikar Parivar</strong> (manavadhikara.in) is an NGO dedicated to human dignity, equality, legal awareness, and constitutional fundamental rights across India.
        </p>
      </div>
    `
  },
  {
    id: 'nrinteriordesigner',
    title: 'NR Interiors – Luxury Home & Interior Architecture Portal',
    subtitle: 'Modern interior design showcase featuring customized home interiors, 3D modular kitchens, architectural planning, and cost estimators.',
    client: 'NR Interiors',
    role: 'Frontend Developer',
    timeline: '2025',
    category: 'Architecture & Design',
    image: 'assets/img/portfolio/nrinteriordesigner.png',
    liveDemoUrl: 'https://nrinteriordesigner.com/',
    tags: ['Laravel', 'Tailwind CSS', 'Alpine.js', 'Vite', 'Responsive UI', 'Gallery System'],
    featured: false,
    highlights: [
      'High-resolution visual gallery showcasing modular kitchens, luxury bedrooms, and living spaces.',
      'Custom interior package cost calculator and instant consultation request forms.',
      'Ultra-fast Vite and Alpine.js interactive frontend with smooth filtering and transitions.',
      'Comprehensive local Lucknow interior design SEO optimizations.'
    ],
    detailsHtml: `
      <div class="project-modal-content">
        <h4>About NR Interiors</h4>
        <p>
          <strong>NR Interiors</strong> (nrinteriordesigner.com) is a premium interior design firm in Lucknow providing residential and commercial architectural transformations.
        </p>
      </div>
    `
  },
  {
    id: 'suryavanshiguesthouse',
    title: 'Suryavanshi Guest House – Ayodhya Hospitality & Room Booking',
    subtitle: 'Hospitality web portal offering luxury room reservations, pilgrimage stay guides, and online booking inquiries near Shri Ram Janmabhoomi Temple.',
    client: 'Suryavanshi Guest House',
    role: 'Frontend Developer',
    timeline: '2025',
    category: 'Hospitality & Travel',
    image: 'assets/img/portfolio/suryavanshiguesthouse.png',
    liveDemoUrl: 'https://www.suryavanshiguesthouse.com/',
    tags: ['SPA Architecture', 'Tailwind CSS', 'Hotel Booking Engine', 'Room Reservation', 'Mobile-First'],
    featured: false,
    highlights: [
      'Room category showcase with amenity badges, tariffs, and high-quality room photos.',
      'Direct WhatsApp and online room availability inquiry forms for fast reservations.',
      'Ayodhya pilgrimage guide with directions and distance to major holy temples.',
      'Mobile-first, lightning-fast lightweight SPA structure.'
    ],
    detailsHtml: `
      <div class="project-modal-content">
        <h4>About Suryavanshi Guest House</h4>
        <p>
          <strong>Suryavanshi Guest House</strong> (suryavanshiguesthouse.com) provides serene and premium accommodation for pilgrims and tourists visiting Ayodhya.
        </p>
      </div>
    `
  }
];
