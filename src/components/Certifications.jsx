import React from 'react';
import { certifications } from '../data/certifications';
import { settings } from '../data/settings';

export default function Certifications() {
  return (
    <section id="certifications" className="certifications section">
      <div className="container section-title" data-aos="fade-up">
        <div className="d-flex justify-content-between align-items-center flex-wrap gap-2">
          <div>
            <h2>Certifications & Achievements</h2>
            <p>Highlights that strengthen the portfolio beyond project screenshots.</p>
          </div>
        </div>
      </div>

      <div className="container" data-aos="fade-up" data-aos-delay="100">
        {/* 1. Top Grid of Certification Cards */}
        <div className="row g-4 mb-5">
          {certifications.map((cert) => (
            <div key={cert.id} className="col-lg-4 col-md-6">
              <div className="cert-card">
                <div className="cert-card-top">
                  <div className="cert-icon-sq">
                    <i className={cert.icon}></i>
                  </div>
                  <div className="cert-info">
                    <h3>{cert.title}</h3>
                    <span className="cert-issuer">{cert.issuer}</span>
                    <p className="cert-desc">{cert.desc}</p>
                  </div>
                </div>
                <div className="cert-footer-badge">
                  <span className="badge-left">
                    <i className="bi bi-calendar3"></i> Issued: {cert.date}
                  </span>
                  <span className="badge-right">
                    <i className="bi bi-check-circle-fill"></i> Verified
                  </span>
                </div>
              </div>
            </div>
          ))}
        </div>

        {/* 2. Achievements Metric Pastel Banner */}
        <div className="mb-5">
          <h3
            className="fw-bold mb-3"
            style={{ fontSize: '20px', color: '#0f172a' }}
          >
            Achievements
          </h3>
          <div className="row g-3">
            <div className="col-lg-3 col-md-6">
              <div className="achievement-card">
                <div className="achievement-icon-wrap achievement-icon-blue">
                  <i className="bi bi-code-slash"></i>
                </div>
                <div className="achievement-content">
                  <h4>{settings.stat_projects_shipped}</h4>
                  <span className="ach-title">Projects Completed</span>
                  <p>Delivered end-to-end full stack solutions.</p>
                </div>
              </div>
            </div>
            <div className="col-lg-3 col-md-6">
              <div className="achievement-card">
                <div className="achievement-icon-wrap achievement-icon-green">
                  <i className="bi bi-rocket-takeoff"></i>
                </div>
                <div className="achievement-content">
                  <h4>{settings.stat_internship_months}</h4>
                  <span className="ach-title">Internship Months</span>
                  <p>Hands-on experience building real products.</p>
                </div>
              </div>
            </div>
            <div className="col-lg-3 col-md-6">
              <div className="achievement-card">
                <div className="achievement-icon-wrap achievement-icon-purple">
                  <i className="bi bi-cpu"></i>
                </div>
                <div className="achievement-content">
                  <h4>{settings.stat_core_stack}</h4>
                  <span className="ach-title">Technologies Used</span>
                  <p>Worked with modern tech and tools.</p>
                </div>
              </div>
            </div>
            <div className="col-lg-3 col-md-6">
              <div className="achievement-card">
                <div className="achievement-icon-wrap achievement-icon-orange">
                  <i className="bi bi-star"></i>
                </div>
                <div className="achievement-content">
                  <h4>{settings.stat_certifications}</h4>
                  <span className="ach-title">Certifications Earned</span>
                  <p>Continuously learning and upskilling.</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        {/* 3. Featured Certificates Image Gallery */}
        <div>
          <div className="d-flex justify-content-between align-items-center mb-3">
            <h3
              className="fw-bold m-0"
              style={{ fontSize: '20px', color: '#0f172a' }}
            >
              Featured Certificates
            </h3>
            <a
              href="#certifications"
              className="btn btn-outline-primary rounded-pill px-3 py-1 fw-semibold"
              style={{ fontSize: '14px' }}
            >
              View All Certificates
            </a>
          </div>
          <div className="row g-4">
            {certifications.map((cert) => (
              <div key={cert.id} className="col-lg-4 col-md-6">
                <a
                  href={cert.image}
                  target="_blank"
                  rel="noreferrer"
                  className="featured-cert-card d-block"
                >
                  <img
                    src={cert.image}
                    alt={cert.title}
                    className="img-fluid"
                    loading="lazy"
                  />
                  <div className="featured-cert-overlay">
                    <i className="bi bi-zoom-in"></i>
                  </div>
                </a>
              </div>
            ))}
          </div>
        </div>
      </div>
    </section>
  );
}
