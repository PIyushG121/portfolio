import React from 'react';
import { services, processSteps, miniTechIcons } from '../data/services';

export default function Services() {
  return (
    <section id="services" className="services section">
      <div className="container" data-aos="fade-up">
        {/* 1. Services & Solutions Card */}
        <div className="section-card-box mb-4">
          <div className="about-card-title mb-4">
            <i className="bi bi-gear-wide-connected"></i>
            <span>Services & Solutions</span>
          </div>
          <div className="row g-4">
            {services.map((service) => (
              <div key={service.id} className="col-lg-4 col-md-6">
                <div className="service-card">
                  <div>
                    <div className="service-icon-box">
                      <i className={service.icon}></i>
                    </div>
                    <h3 className="service-card-title">{service.title}</h3>
                    <p className="service-card-desc">{service.description}</p>
                  </div>
                  <div className="service-tech-tags">
                    {service.tags.map((tag, tIndex) => (
                      <span key={tIndex} className="service-tech-tag">
                        {tag}
                      </span>
                    ))}
                  </div>
                </div>
              </div>
            ))}
          </div>
        </div>

        {/* 2. Process Flow Card */}
        <div className="section-card-box mb-4">
          <div className="about-card-title mb-4">
            <i className="bi bi-diagram-3"></i>
            <span>My Development Process</span>
          </div>
          <div className="d-flex align-items-center justify-content-between flex-wrap gap-3 py-2">
            {processSteps.map((step, index) => (
              <React.Fragment key={index}>
                <div className="process-step-item">
                  <div className="process-step-icon">
                    <i className={step.icon}></i>
                  </div>
                  <span className="process-step-title">{step.step}</span>
                  <p className="process-step-desc">{step.desc}</p>
                </div>
                {index < processSteps.length - 1 && (
                  <span className="process-connector d-none d-md-inline">⇢</span>
                )}
              </React.Fragment>
            ))}
          </div>
        </div>

        {/* 3. Blue Banner */}
        <div className="blue-cta-banner">
          <div className="d-flex align-items-center gap-3">
            <div className="cta-icon-wrap">
              <i className="bi bi-chat-quote-fill"></i>
            </div>
            <div>
              <h3>Ready to bring your product to life?</h3>
              <p>Let&apos;s build scalable web systems, cross-platform apps, and automated workflows.</p>
            </div>
          </div>
          <a
            href="#contact"
            className="btn btn-light rounded-pill px-4 py-2 fw-bold text-primary flex-shrink-0"
          >
            Start a Conversation
          </a>
        </div>
      </div>
    </section>
  );
}
