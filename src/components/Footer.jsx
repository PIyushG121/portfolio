import React from 'react';
import { settings } from '../data/settings';

export default function Footer() {
  const currentYear = new Date().getFullYear();

  const scrollToTop = (e) => {
    e.preventDefault();
    window.scrollTo({
      top: 0,
      behavior: 'smooth',
    });
  };

  return (
    <footer id="footer" className="footer position-relative light-background">
      <div className="container">
        <div className="copyright text-center">
          <p>
            © <span>{currentYear}</span>{' '}
            <strong className="px-1 sitename">{settings.name}</strong>. All Rights Reserved.
          </p>
        </div>
        <div className="credits text-center mt-2">
          <span>Designed & Built with React & Vite by </span>
          <a
            href={settings.github}
            target="_blank"
            rel="noopener noreferrer"
            className="text-primary fw-semibold"
          >
            {settings.name}
          </a>
        </div>
        <div className="text-center mt-3">
          <a
            href="#hero"
            onClick={scrollToTop}
            className="btn btn-sm btn-outline-primary rounded-pill px-3 py-1"
            aria-label="Back to top of page"
          >
            <i className="bi bi-arrow-up me-1"></i> Back to Top
          </a>
        </div>
      </div>
    </footer>
  );
}
