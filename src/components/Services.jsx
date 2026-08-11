import React from 'react';
import { services, processSteps, miniTechIcons } from '../data/services';

export default function Services() {
  return (
    <section id="services" className="services section">
      <div className="container section-title" data-aos="fade-up">
        <h2>Services</h2>
        <p>
          Solutions I build to help businesses and individuals transform ideas into powerful digital products.
        </p>
      </div>

      <div className="container" data-aos="fade-up" data-aos-delay="100">
        {/* 1. Top Grid of Service Cards */}
        <div className="row g-4 mb-4">
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

        {/* 2. Middle Grid: Process & Technologies */}
        <div className="row g-4 mb-4">
          <div className="col-lg-7">
            <div className="process-card-box">
              <h3
                className="fw-bold mb-4"
                style={{ fontSize: '18px', color: '#0f172a' }}
              >
                My Process
              </h3>
              <div className="d-flex align-items-center justify-content-between gap-2">
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
                      <span className="process-connector">⇢</span>
                    )}
                  </React.Fragment>
                ))}
              </div>
            </div>
          </div>

          <div className="col-lg-5">
            <div className="tech-grid-box">
              <h3
                className="fw-bold mb-4"
                style={{ fontSize: '18px', color: '#0f172a' }}
              >
                Technologies I Work With
              </h3>
              <div className="tech-mini-grid">
                {miniTechIcons.map((tech, index) => (
                  <div key={index} className="tech-mini-item" title={tech.title}>
                    <img src={tech.icon} alt={tech.title} />
                  </div>
                ))}
              </div>
            </div>
          </div>
        </div>

        {/* 3. Bottom Blue Call-To-Action Banner */}
        <div className="blue-cta-banner">
          <div className="d-flex align-items-center gap-3">
            <div className="cta-icon-wrap">
              <i className="bi bi-send-fill"></i>
            </div>
            <div>
              <h3>Have a project in mind?</h3>
              <p>Let's build something amazing together.</p>
            </div>
          </div>
          <a
            href="#contact"
            className="btn btn-light rounded-pill px-4 py-2 text-primary fw-bold d-inline-flex align-items-center gap-2"
          >
            <span>Get In Touch</span> <i className="bi bi-arrow-right"></i>
          </a>
        </div>
      </div>
    </section>
  );
}
