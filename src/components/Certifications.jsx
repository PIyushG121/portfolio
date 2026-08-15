import React from 'react';
import { certifications } from '../data/certifications';

export default function Certifications() {
  return (
    <section id="certifications" className="certifications section">
      <div className="container" data-aos="fade-up">
        {/* 1. Top Grid of Certification Cards inside section card */}
        <div className="section-card-box mb-4">
          <div className="about-card-title mb-4">
            <i className="bi bi-patch-check"></i>
            <span>Verified Certifications</span>
          </div>
          <div className="row g-4">
            {certifications.map((cert) => (
              <div key={cert.id} className="col-lg-4 col-md-6">
                <div className="cert-card h-100 d-flex flex-column justify-content-between">
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
                  <div className="cert-footer-badge mt-3">
                    <span className="badge-left">
                      <i className="bi bi-calendar3"></i> {cert.date}
                    </span>
                    {cert.credentialUrl ? (
                      <a
                        href={cert.credentialUrl}
                        target="_blank"
                        rel="noreferrer"
                        className="badge-right text-decoration-none"
                        style={{ cursor: 'pointer' }}
                      >
                        <i className="bi bi-patch-check-fill"></i> {cert.verifyLabel || 'Verify'} <i className="bi bi-box-arrow-up-right ms-1" style={{ fontSize: '10px' }}></i>
                      </a>
                    ) : (
                      <span className="badge-right">
                        <i className="bi bi-check-circle-fill"></i> Verified
                      </span>
                    )}
                  </div>
                </div>
              </div>
            ))}
          </div>
        </div>

        {/* 2. Achievements Metric Banner inside section card */}
        <div className="section-card-box mb-4">
          <div className="about-card-title mb-4">
            <i className="bi bi-trophy"></i>
            <span>Key Highlights & Achievements</span>
          </div>
          <div className="row g-3">
            <div className="col-lg-3 col-md-6">
              <div className="achievement-card">
                <div className="achievement-icon-wrap achievement-icon-blue">
                  <i className="bi bi-code-slash"></i>
                </div>
                <div className="achievement-content">
                  <h4>3+</h4>
                  <span className="ach-title">Projects Built</span>
                  <p>Full-stack web & AI applications.</p>
                </div>
              </div>
            </div>
            <div className="col-lg-3 col-md-6">
              <div className="achievement-card">
                <div className="achievement-icon-wrap achievement-icon-green">
                  <i className="bi bi-rocket-takeoff"></i>
                </div>
                <div className="achievement-content">
                  <h4>6 Months</h4>
                  <span className="ach-title">Internship Exp</span>
                  <p>Webly Technolab engineer.</p>
                </div>
              </div>
            </div>
            <div className="col-lg-3 col-md-6">
              <div className="achievement-card">
                <div className="achievement-icon-wrap achievement-icon-purple">
                  <i className="bi bi-cpu"></i>
                </div>
                <div className="achievement-content">
                  <h4>10+</h4>
                  <span className="ach-title">Core Technologies</span>
                  <p>Web, Mobile & AI stacks.</p>
                </div>
              </div>
            </div>
            <div className="col-lg-3 col-md-6">
              <div className="achievement-card">
                <div className="achievement-icon-wrap achievement-icon-orange">
                  <i className="bi bi-patch-check-fill"></i>
                </div>
                <div className="achievement-content">
                  <h4>3+</h4>
                  <span className="ach-title">Credentials</span>
                  <p>IBM, Tata & Project Award.</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        {/* 3. Featured Certificates Gallery inside section card */}
        <div className="section-card-box">
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
            <div className="about-card-title m-0">
              <i className="bi bi-images"></i>
              <span>Featured Certificate Previews</span>
            </div>
            <span className="text-muted" style={{ fontSize: '13px' }}>
              <i className="bi bi-info-circle me-1"></i> Click on any certificate to view credential
            </span>
          </div>
          <div className="row g-4">
            {certifications.map((cert) => (
              <div key={cert.id} className="col-lg-4 col-md-6">
                <a
                  href={cert.credentialUrl || cert.image}
                  target="_blank"
                  rel="noreferrer"
                  className="featured-cert-card d-block"
                  title={`Open ${cert.title}`}
                >
                  <img
                    src={cert.image}
                    alt={cert.title}
                    className="img-fluid"
                    loading="lazy"
                  />
                  <div className="featured-cert-overlay">
                    <span className="cert-preview-pill">
                      <i className="bi bi-box-arrow-up-right"></i>
                      <span>{cert.verifyLabel || 'View Credential'}</span>
                    </span>
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
