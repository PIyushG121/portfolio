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
    <section id="portfolio" className="portfolio section">
      <div className="container" data-aos="fade-up">
        <div className="section-card-box">
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
            <div className="about-card-title m-0">
              <i className="bi bi-collection-play"></i>
              <span>Featured Projects</span>
            </div>
            <div className="portfolio-filters-wrap m-0">
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

          <div className="row g-4">
            {filteredProjects.length > 0 ? (
              filteredProjects.map((project) => (
                <div key={project.id} className="col-lg-4 col-md-6">
                  <div className="project-card">
                    <div>
                      <div className="project-img-wrap">
                        <img src={project.image_path} alt={project.title} loading="lazy" />
                        {project.external_link && (
                          <a
                            href={project.external_link}
                            target="_blank"
                            rel="noreferrer"
                            className="project-external-btn"
                            title="Live Preview"
                          >
                            <i className="bi bi-arrow-up-right"></i>
                          </a>
                        )}
                      </div>
                      <div className="project-body">
                        <span className="project-category-badge">
                          {project.category}
                        </span>
                        <h4 className="project-title">{project.title}</h4>
                        <p className="project-short-desc">
                          {project.short_description || project.description}
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
                      {project.external_link ? (
                        <a
                          href={project.external_link}
                          target="_blank"
                          rel="noreferrer"
                          className="project-action-btn"
                        >
                          <i className="bi bi-box-arrow-up-right"></i> Live Demo
                        </a>
                      ) : (
                        <span className="project-action-btn text-muted" style={{ cursor: 'default' }}>
                          <i className="bi bi-code-slash"></i> Internal Build
                        </span>
                      )}

                      {project.github_link && (
                        <>
                          <div className="project-action-divider"></div>
                          <a
                            href={project.github_link}
                            target="_blank"
                            rel="noreferrer"
                            className="project-action-btn"
                          >
                            <i className="bi bi-github"></i> Code
                          </a>
                        </>
                      )}
                    </div>
                  </div>
                </div>
              ))
            ) : (
              <div className="col-12 text-center py-5">
                <p className="text-muted">No projects found in this category.</p>
              </div>
            )}
          </div>

          {/* CTA Banner */}
          <div className="cta-project-box">
            <div className="cta-icon-folder">
              <i className="bi bi-folder-plus"></i>
            </div>
            <div className="cta-text">
              <h4>Have a project in mind?</h4>
              <p>Let&apos;s turn your ideas into functional, production-ready software.</p>
            </div>
            <a href="#contact" className="btn btn-primary btn-sm px-3 py-2 rounded-pill fw-semibold">
              Get in Touch
            </a>
          </div>
        </div>
      </div>
    </section>
  );
}
