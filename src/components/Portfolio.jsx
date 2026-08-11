import React, { useState } from 'react';
import { projects } from '../data/projects';

export default function Portfolio() {
  const [activeFilter, setActiveFilter] = useState('*');

  const filterButtons = [
    { label: 'All Projects', filter: '*' },
    { label: 'Web Apps', filter: 'filter-web' },
    { label: 'AI / ML', filter: 'filter-ai' },
    { label: 'Tools', filter: 'filter-tool' },
    { label: 'Others', filter: 'filter-other' },
  ];

  const filteredProjects = projects.filter((project) => {
    if (activeFilter === '*') return true;
    return project.filterCategory === activeFilter;
  });

  return (
    <section id="portfolio" className="portfolio section light-background">
      <div className="container section-title" data-aos="fade-up">
        <div className="d-flex justify-content-between align-items-center flex-wrap gap-3">
          <div>
            <h2>Portfolio</h2>
            <p>Projects showcasing full-stack applications, AI tools, and system solutions.</p>
          </div>
          <div className="portfolio-filters-wrap">
            {filterButtons.map((btn, index) => (
              <button
                key={index}
                className={`portfolio-filter-btn ${
                  activeFilter === btn.filter ? 'active' : ''
                }`}
                onClick={() => setActiveFilter(btn.filter)}
              >
                {btn.label}
              </button>
            ))}
          </div>
        </div>
      </div>

      <div className="container" data-aos="fade-up" data-aos-delay="100">
        <div className="row g-4">
          {filteredProjects.length > 0 ? (
            filteredProjects.map((project) => (
              <div key={project.id} className="col-lg-4 col-md-6">
                <div className="project-card">
                  <div>
                    <div className="project-img-wrap">
                      <img src={project.image_path} alt={project.title} />
                      {project.external_link && (
                        <a
                          href={project.external_link}
                          target="_blank"
                          rel="noreferrer"
                          className="project-external-btn"
                          title="Live Preview"
                        >
                          <i className="bi bi-box-arrow-up-right"></i>
                        </a>
                      )}
                    </div>
                    <div className="project-body">
                      <span className="project-category-badge">
                        {project.category}
                      </span>
                      <h3 className="project-title">{project.title}</h3>
                      <p className="project-short-desc">
                        {project.short_description}
                      </p>
                      <div className="project-tech-list">
                        {project.tech_stack.map((tech, tIndex) => (
                          <span key={tIndex} className="project-tech-pill">
                            {tech}
                          </span>
                        ))}
                      </div>
                    </div>
                  </div>
                  <div className="project-footer-actions">
                    <a
                      href={project.external_link || '#'}
                      target="_blank"
                      rel="noreferrer"
                      className="project-action-btn"
                    >
                      <span>View Details</span> <i className="bi bi-arrow-right"></i>
                    </a>
                    <div className="project-action-divider"></div>
                    <a
                      href={project.github_link || 'https://github.com/piyush-gupta2003'}
                      target="_blank"
                      rel="noreferrer"
                      className="project-action-btn text-dark"
                    >
                      <i className="bi bi-github"></i> <span>GitHub</span>
                    </a>
                  </div>
                </div>
              </div>
            ))
          ) : (
            <div className="col-12">
              <p className="text-center text-muted">
                No projects matching this filter.
              </p>
            </div>
          )}
        </div>

        {/* Call-To-Action Banner */}
        <div className="cta-project-box">
          <div className="d-flex align-items-center gap-3">
            <div className="cta-icon-folder">
              <i className="bi bi-folder2-open"></i>
            </div>
            <div className="cta-text">
              <h4>Have a project in mind?</h4>
              <p>Let's build something amazing together.</p>
            </div>
          </div>
          <a
            href="#contact"
            className="btn btn-primary rounded-pill px-4 py-2 fw-semibold d-inline-flex align-items-center gap-2"
          >
            <i className="bi bi-send-fill"></i> <span>Get In Touch</span>
          </a>
        </div>
      </div>
    </section>
  );
}
