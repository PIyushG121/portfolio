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
        onClick={() => setMobileHeaderOpen(!mobileHeaderOpen)}
      ></i>

      <div className="profile-img text-center">
        <img
          src={settings.profile_photo}
          alt="Profile"
          className="img-fluid"
        />
        <span
          className="online-status-dot"
          title="Available for opportunities"
        ></span>
      </div>

      <a
        href="#hero"
        onClick={(e) => {
          e.preventDefault();
          handleNavClick('hero');
        }}
        className="logo d-flex flex-column align-items-center justify-content-center"
      >
        <h1 className="sitename">{settings.name}</h1>
        <span className="sidebar-role-tagline">{settings.tagline}</span>
      </a>

      <div className="social-links text-center d-flex justify-content-center align-items-center gap-3 my-3">
        <a
          href={settings.github}
          target="_blank"
          rel="noreferrer"
          title="GitHub"
          className="sidebar-social-btn"
        >
          <i className="bi bi-github"></i>
        </a>
        <a
          href={settings.linkedin}
          target="_blank"
          rel="noreferrer"
          title="LinkedIn"
          className="sidebar-social-btn sidebar-social-linkedin"
        >
          <i className="bi bi-linkedin"></i>
        </a>
        <a
          href={`mailto:${settings.email}`}
          target="_blank"
          rel="noreferrer"
          title="Email"
          className="sidebar-social-btn sidebar-social-mail"
        >
          <i className="bi bi-envelope-fill"></i>
        </a>
      </div>

      <nav id="navmenu" className="navmenu">
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
