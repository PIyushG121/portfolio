import React, { useState, useMemo } from 'react';
import { services, processSteps, miniTechIcons } from '../data/services';
import { clientProjects } from '../data/clientProjects';

export default function Services() {
  const [activeClientFilter, setActiveClientFilter] = useState('all');

  const categories = [
    { id: 'all', label: 'All Projects' },
    { id: 'FinTech', label: 'FinTech' },
    { id: 'Publishing', label: 'Publishing & AI' },
    { id: 'EdTech', label: 'EdTech & E-Commerce' },
    { id: 'Travel', label: 'Travel & Hospitality' },
    { id: 'Healthcare', label: 'Healthcare' },
    { id: 'Agency', label: 'Agency & Others' }
  ];

  const filteredClientProjects = useMemo(() => {
    if (activeClientFilter === 'all') return clientProjects;
    return clientProjects.filter((item) => {
      if (activeClientFilter === 'Agency') {
        return item.category.includes('Agency') || item.category.includes('NGO') || item.category.includes('Architecture');
      }
      return item.category.toLowerCase().includes(activeClientFilter.toLowerCase());
    });
  }, [activeClientFilter]);

  return (
    <section id="services" className="services section">
      <div className="container" data-aos="fade-up">
        {/* 1. Featured Client Work & Production Projects */}
        {clientProjects && clientProjects.length > 0 && (
          <div className="section-card-box mb-4">
            <div className="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-3">
              <div className="about-card-title m-0">
                <i className="bi bi-briefcase-fill"></i>
                <span>Client Projects & Production Work ({clientProjects.length})</span>
              </div>
              <span className="badge bg-primary-subtle text-primary border border-primary-subtle px-3 py-1 rounded-pill fw-semibold">
                <i className="bi bi-broadcast me-1"></i> Live Production Systems
              </span>
            </div>

            {/* Client Category Filter Tabs */}
            <div className="d-flex flex-wrap gap-2 mb-4 pb-2">
              {categories.map((cat) => {
                const count =
                  cat.id === 'all'
                    ? clientProjects.length
                    : cat.id === 'Agency'
                    ? clientProjects.filter((p) => p.category.includes('Agency') || p.category.includes('NGO') || p.category.includes('Architecture')).length
                    : clientProjects.filter((p) => p.category.toLowerCase().includes(cat.id.toLowerCase())).length;

                const isActive = activeClientFilter === cat.id;

                return (
                  <button
                    key={cat.id}
                    type="button"
                    className={`btn btn-sm rounded-pill px-3 py-1 fw-semibold ${
                      isActive
                        ? 'btn-primary text-white shadow-sm'
                        : 'btn-outline-secondary border-opacity-25 bg-white text-dark'
                    }`}
                    onClick={() => setActiveClientFilter(cat.id)}
                  >
                    {cat.label} <span className="opacity-75 ms-1">({count})</span>
                  </button>
                );
              })}
            </div>

            {/* Client Projects 2-Column Grid */}
            <div className="row g-4">
              {filteredClientProjects.map((item) => (
                <div key={item.id} className="col-lg-6 col-12">
                  <div className="client-work-card">
                    <div className="client-work-img-wrap">
                      <img src={item.image} alt={item.title} loading="lazy" />
                      <span className="client-work-badge">
                        <i className="bi bi-patch-check-fill text-primary me-1"></i>
                        {item.client}
                      </span>
                    </div>

                    <div className="client-work-body">
                      <div className="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-2">
                        <span className="client-work-category">{item.category}</span>
                        {item.timeline && (
                          <span className="client-work-timeline">
                            <i className="bi bi-calendar3 me-1"></i>
                            {item.timeline}
                          </span>
                        )}
                      </div>

                      <h4 className="client-work-title">{item.title}</h4>
                      <p className="client-work-desc">{item.subtitle}</p>

                      {item.highlights && item.highlights.length > 0 && (
                        <ul className="client-work-highlights">
                          {item.highlights.slice(0, 2).map((hl, hIndex) => (
                            <li key={hIndex}>
                              <i className="bi bi-check2-circle text-primary me-1"></i>
                              {hl}
                            </li>
                          ))}
                        </ul>
                      )}

                      <div className="d-flex align-items-center justify-content-between flex-wrap gap-2 mt-auto pt-3 border-top">
                        <div className="client-work-tags">
                          {item.tags.slice(0, 3).map((tag, tIndex) => (
                            <span key={tIndex} className="service-tech-tag">
                              {tag}
                            </span>
                          ))}
                          {item.tags.length > 3 && (
                            <span className="service-tech-tag text-muted">
                              +{item.tags.length - 3}
                            </span>
                          )}
                        </div>

                        <div className="d-flex align-items-center gap-1.5">
                          {item.exampleUrl && (
                            <a
                              href={item.exampleUrl}
                              target="_blank"
                              rel="noreferrer"
                              className="btn btn-outline-primary btn-sm rounded-pill px-2.5 py-1.5 fw-semibold d-inline-flex align-items-center gap-1"
                              title="Live Client Deployment Example"
                            >
                              <span>Demo Site</span>
                              <i className="bi bi-box-arrow-up-right"></i>
                            </a>
                          )}
                          {item.liveDemoUrl && (
                            <a
                              href={item.liveDemoUrl}
                              target="_blank"
                              rel="noreferrer"
                              className="btn btn-primary btn-sm rounded-pill px-3 py-1.5 fw-semibold d-inline-flex align-items-center gap-1.5"
                            >
                              <span>Live Site</span>
                              <i className="bi bi-box-arrow-up-right"></i>
                            </a>
                          )}
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              ))}
            </div>
          </div>
        )}

        {/* 2. Services & Solutions Card */}
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
