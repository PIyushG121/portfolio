import React, { useState, useEffect } from 'react';
import { settings } from '../data/settings';

export default function Header() {
  const [activeSection, setActiveSection] = useState('hero');
  const [mobileHeaderOpen, setMobileHeaderOpen] = useState(false);

  useEffect(() => {
    const handleScroll = () => {
      const sections = [
        'hero',
        'about',
        'skills',
        'resume',
        'portfolio',
        'services',
        'certifications',
        'contact',
      ];
      const scrollPosition = window.scrollY + 200;

      for (const sectionId of sections) {
        const el = document.getElementById(sectionId);
        if (el) {
          const top = el.offsetTop;
          const height = el.offsetHeight;
          if (scrollPosition >= top && scrollPosition < top + height) {
            setActiveSection(sectionId);
            break;
          }
        }
      }
    };

    window.addEventListener('scroll', handleScroll);
    return () => window.removeEventListener('scroll', handleScroll);
  }, []);

  const navItems = [
    { id: 'hero', label: 'Home', icon: 'bi bi-house navicon' },
    { id: 'about', label: 'About', icon: 'bi bi-person navicon' },
    { id: 'skills', label: 'Skills', icon: 'bi bi-bar-chart navicon' },
    { id: 'resume', label: 'Resume', icon: 'bi bi-file-earmark-text navicon' },
    { id: 'portfolio', label: 'Portfolio', icon: 'bi bi-images navicon' },
    { id: 'services', label: 'Services', icon: 'bi bi-hdd-stack navicon' },
    { id: 'certifications', label: 'Certifications', icon: 'bi bi-award navicon' },
    { id: 'contact', label: 'Contact', icon: 'bi bi-envelope navicon' },
  ];

  const handleNavClick = (id) => {
    setActiveSection(id);
    setMobileHeaderOpen(false);
    const element = document.getElementById(id);
    if (element) {
      element.scrollIntoView({ behavior: 'smooth' });
    }
  };

  return (
    <header
      id="header"
      className={`header dark-background d-flex flex-column ${
        mobileHeaderOpen ? 'header-show' : ''
      }`}
    >
      <i
        className={`header-toggle d-xl-none bi ${
          mobileHeaderOpen ? 'bi-x' : 'bi-list'
        }`}
        role="button"
        aria-label="Toggle navigation menu"
        aria-expanded={mobileHeaderOpen}
        tabIndex={0}
        onClick={() => setMobileHeaderOpen(!mobileHeaderOpen)}
        onKeyDown={(e) => {
          if (e.key === 'Enter' || e.key === ' ') {
            setMobileHeaderOpen(!mobileHeaderOpen);
          }
        }}
      ></i>

      <div className="profile-img text-center">
        <img
          src={settings.profile_photo}
          alt={`Profile portrait of ${settings.name}`}
          className="img-fluid"
          width="140"
          height="140"
          loading="eager"
          decoding="async"
        />
        <span
          className="online-status-dot"
          title="Available for opportunities"
          aria-label="Status: Available for opportunities"
        ></span>
      </div>

      <a
        href="#hero"
        onClick={(e) => {
          e.preventDefault();
          handleNavClick('hero');
        }}
        className="logo d-flex flex-column align-items-center justify-content-center"
        aria-label={`${settings.name} - Home`}
      >
        <span className="sitename h5 text-white mb-0 fw-bold">{settings.name}</span>
        <span className="sidebar-role-tagline">{settings.tagline}</span>
      </a>

      <div className="social-links text-center d-flex justify-content-center align-items-center gap-3 my-3">
        <a
          href={settings.github}
          target="_blank"
          rel="noopener noreferrer"
          title="GitHub Profile"
          aria-label="GitHub Profile"
          className="sidebar-social-btn"
        >
          <i className="bi bi-github"></i>
        </a>
        <a
          href={settings.linkedin}
          target="_blank"
          rel="noopener noreferrer"
          title="LinkedIn Profile"
          aria-label="LinkedIn Profile"
          className="sidebar-social-btn sidebar-social-linkedin"
        >
          <i className="bi bi-linkedin"></i>
        </a>
        <a
          href={`mailto:${settings.email}`}
          target="_blank"
          rel="noopener noreferrer"
          title="Send Email"
          aria-label="Send Email"
          className="sidebar-social-btn sidebar-social-mail"
        >
          <i className="bi bi-envelope-fill"></i>
        </a>
      </div>

      <nav id="navmenu" className="navmenu" aria-label="Main Navigation">
        <ul>
          {navItems.map((item) => (
            <li key={item.id}>
              <a
                href={`#${item.id}`}
                className={activeSection === item.id ? 'active' : ''}
                onClick={(e) => {
                  e.preventDefault();
                  handleNavClick(item.id);
                }}
              >
                <i className={item.icon}></i> {item.label}
              </a>
            </li>
          ))}
        </ul>
      </nav>
    </header>
  );
}
