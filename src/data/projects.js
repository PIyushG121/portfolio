/**
 * DYNAMIC PROJECTS CONFIGURATION
 * 
 * You can easily add, update, or remove projects directly in this file.
 * Each project supports rich HTML details, custom tags, live links, and categories.
 */

export const projectFilters = [
  { label: 'All Projects', filter: '*' },
  { label: 'Web Apps', filter: 'filter-web' },
  { label: 'AI / ML', filter: 'filter-ai' },
  { label: 'Mobile Apps', filter: 'filter-mobile' },
  { label: 'Tools & APIs', filter: 'filter-tool' },
];

export const projects = [
  {
    id: 'tradefluenza',
    title: 'TradeFluenza – Prop Firm & Trading Evaluation Platform',
    subtitle: 'Comprehensive FinTech platform featuring prop firm comparisons, broker evaluations, cashback rewards, webinars, and mentorship portals.',
    category: 'Client Project / FinTech',
    filterCategory: 'filter-web',
    image: 'assets/img/portfolio/tradefluenza.svg',
    tags: ['React.js', 'Tailwind CSS', 'RESTful APIs', 'FinTech', 'Prop Trading', 'Lucide Icons'],
    liveDemoUrl: 'https://tradefluenza.com/',
    role: 'Full Stack & Frontend Developer',
    timeline: '2025 – 2026',
    featured: true,
    sort_order: 1,
    detailsHtml: `
      <div class="project-modal-content">
        <h4>Overview</h4>
        <p>
          <strong>TradeFluenza</strong> (tradefluenza.com) is a high-traffic FinTech ecosystem empowering global traders with in-depth proprietary firm comparisons, verified broker reviews, trader educational webinars, and cashback reward initiatives.
        </p>

        <h4>Key Features</h4>
        <ul class="project-feature-list">
          <li><strong>Prop Firm Comparison Engine:</strong> Dynamic filters allowing traders to compare evaluation accounts by capital level, profit split rules, drawdown parameters, and pricing.</li>
          <li><strong>Broker Directory & Reviews:</strong> Verified regulatory information, trader reviews, and broker analysis cards.</li>
          <li><strong>Trading Events & Webinars:</strong> Interactive schedule management for webinars, workshops, and international trading competitions.</li>
          <li><strong>Cashback Claim Portal:</strong> Dedicated multi-step entry submission form with transaction verification for prop challenge purchases.</li>
          <li><strong>Modern Responsive UI:</strong> Ultra-clean interface with gradient glassmorphic accents, animated metric counters, and accessible responsive layouts.</li>
        </ul>

        <h4>Technical Architecture</h4>
        <ul class="project-feature-list">
          <li><strong>Frontend:</strong> React.js, Tailwind CSS, Lucide React Icons, Vite.</li>
          <li><strong>Integration:</strong> RESTful API backend integrations, form validation pipelines, and analytics tracking.</li>
        </ul>
      </div>
    `
  },
  {
    id: 'walletry',
    title: 'Walletry – AI Finance Management Platform',
    subtitle: 'A smart finance management platform to track expenses, set budgets, and get AI-powered financial insights.',
    category: 'Web Application',
    filterCategory: 'filter-web',
    image: 'assets/img/portfolio/walletry.svg',
    tags: ['Laravel', 'React.js', 'MySQL', 'Tailwind CSS', 'Chart.js', 'Gemini AI'],
    liveDemoUrl: 'https://walletry.example.com',
    codeUrl: 'https://github.com/PIyushG121/lar_proj',
    role: 'Full Stack Architect & Developer',
    timeline: '2025 – 2026',
    featured: true,
    sort_order: 2,
    detailsHtml: `
      <div class="project-modal-content">
        <h4>Overview</h4>
        <p>
          <strong>Walletry</strong> is an enterprise-grade AI-powered financial dashboard engineered to help individuals and businesses visualize real-time cash flow, detect spending anomalies, and generate predictive budget recommendations using Google Gemini AI.
        </p>

        <h4>Key Features</h4>
        <ul class="project-feature-list">
          <li><strong>Real-Time Analytics & Charting:</strong> Interactive visualizations for expense breakdowns, recurring subscriptions, and category spending distributions.</li>
          <li><strong>AI Financial Assistant:</strong> Integrated Gemini AI model capable of parsing uploaded receipts, categorizing transactions, and answering natural-language queries about monthly savings goals.</li>
          <li><strong>Secure Authentication & RBAC:</strong> JWT authentication with encrypted sessions, multi-wallet support, and role-based access management.</li>
          <li><strong>Automated Export & Invoicing:</strong> One-click generation of PDF financial reports and automated CSV exports.</li>
        </ul>

        <h4>Technical Architecture</h4>
        <ul class="project-feature-list">
          <li><strong>Frontend:</strong> React.js, Tailwind CSS, Chart.js for data visualization, and Lucide Icons.</li>
          <li><strong>Backend:</strong> Laravel RESTful API with Eloquent ORM, background jobs, and cached query layers.</li>
          <li><strong>Database & AI:</strong> MySQL relational database, Redis caching, and Google Gemini API integration.</li>
        </ul>
      </div>
    `
  },
  {
    id: 'ai-resume-analyzer',
    title: 'AI Resume Analyzer & Job Fit Scorer',
    subtitle: 'AI-powered resume parser and analyzer using NLP, RAG, and vector embeddings to extract insights and match job descriptions.',
    category: 'AI / ML',
    filterCategory: 'filter-ai',
    image: 'assets/img/resumeAnalyser.png',
    tags: ['Python', 'LangChain', 'FAISS', 'Gemini API', 'Streamlit', 'NLP'],
    liveDemoUrl: 'https://colab.research.google.com/drive/1KW1Hf_jceukhj-oZRFHvrNODGwTBWp3S',
    codeUrl: 'https://colab.research.google.com/drive/1KW1Hf_jceukhj-oZRFHvrNODGwTBWp3S',
    role: 'AI & Backend Developer',
    timeline: '2025',
    featured: true,
    sort_order: 2,
    detailsHtml: `
      <div class="project-modal-content">
        <h4>Overview</h4>
        <p>
          An automated <strong>Retrieval-Augmented Generation (RAG)</strong> intelligence system that parses unstructured PDF/DOCX resumes, compares candidate qualifications against job descriptions, and calculates match scores with constructive recommendations.
        </p>

        <h4>Key Features</h4>
        <ul class="project-feature-list">
          <li><strong>Automated PDF Parsing:</strong> High-accuracy OCR text extraction capable of interpreting complex multi-column resumes and custom formatting.</li>
          <li><strong>Semantic Skill Matching:</strong> Uses FAISS vector similarity search to match candidate competencies beyond simple keyword searches.</li>
          <li><strong>Instant ATS Feedback:</strong> Evaluates resume layout readability, missing industry keywords, and format compliance.</li>
          <li><strong>Interactive Web Interface:</strong> Fast Streamlit web interface with real-time score progress dials and downloadable analysis summaries.</li>
        </ul>

        <h4>Technical Architecture</h4>
        <ul class="project-feature-list">
          <li><strong>AI Framework:</strong> LangChain RAG pipeline, HuggingFace embeddings, and Google Gemini Pro model.</li>
          <li><strong>Vector Database:</strong> FAISS for rapid in-memory semantic indexing and ranking.</li>
          <li><strong>Backend:</strong> Python 3.11 with PyPDF, Regex parsing, and Streamlit frontend.</li>
        </ul>
      </div>
    `
  },
  {
    id: 'attendance-management-system',
    title: 'Smart QR Attendance Management System',
    subtitle: 'QR-based attendance system with real-time tracking, analytical reports, and role-based administrative control.',
    category: 'Web Application',
    filterCategory: 'filter-web',
    image: 'assets/img/attendence.png',
    tags: ['Laravel', 'React.js', 'MySQL', 'QR Code', 'Tailwind CSS'],
    liveDemoUrl: 'https://attendence.lookhype.com/',
    codeUrl: 'https://attendence.lookhype.com/',
    role: 'Full Stack Developer',
    timeline: '2025',
    featured: true,
    sort_order: 3,
    detailsHtml: `
      <div class="project-modal-content">
        <h4>Overview</h4>
        <p>
          A comprehensive enterprise attendance tracking platform built to eliminate manual register logs in academic institutions and corporate workplaces through dynamically generated, time-restricted QR codes.
        </p>

        <h4>Key Features</h4>
        <ul class="project-feature-list">
          <li><strong>Dynamic Rotating QR Codes:</strong> Prevents attendance fraud by rotating QR tokens every 15 seconds with geofence verification.</li>
          <li><strong>Executive Admin Dashboard:</strong> Real-time attendance rate metrics, employee leave tracking, and automated absenteeism alerts.</li>
          <li><strong>Automated Report Generation:</strong> Export daily, weekly, and monthly attendance sheets in Excel, CSV, and PDF formats.</li>
          <li><strong>Role-Based Access:</strong> Granular permissions for Administrators, Department Heads, and Students / Employees.</li>
        </ul>

        <h4>Technical Architecture</h4>
        <ul class="project-feature-list">
          <li><strong>Frontend:</strong> React.js, Tailwind CSS, HTML5 QR Scanner library.</li>
          <li><strong>Backend:</strong> Laravel RESTful API, scheduled tasks for daily automated report generation.</li>
          <li><strong>Database:</strong> MySQL with indexed timestamps for high-volume scanning queries.</li>
        </ul>
      </div>
    `
  }
];
