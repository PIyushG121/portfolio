import React, { useState, useEffect } from 'react';
import { projects, projectFilters } from '../data/projects';

export default function Portfolio() {
  const [activeFilter, setActiveFilter] = useState('*');
  const [selectedProject, setSelectedProject] = useState(null);

  // Close modal on ESC key press
  useEffect(() => {
    const handleKeyDown = (e) => {
      if (e.key === 'Escape') {
        setSelectedProject(null);
      }
    };
    if (selectedProject) {
      document.body.style.overflow = 'hidden';
      window.addEventListener('keydown', handleKeyDown);
    } else {
      document.body.style.overflow = 'unset';
    }
    return () => {
      document.body.style.overflow = 'unset';
      window.removeEventListener('keydown', handleKeyDown);
    };
  }, [selectedProject]);

  const filteredProjects = projects.filter((project) => {
    if (activeFilter === '*') return true;
    return project.filterCategory === activeFilter;
  });

  return (
    <section id="portfolio" className="portfolio section">
      <div className="container" data-aos="fade-up">
        <div className="section-card-box">
          {/* Header with Title & Filter Buttons */}
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
            <div className="about-card-title m-0">
              <i className="bi bi-collection-play"></i>
              <span>Featured Projects</span>
            </div>
            <div className="portfolio-filters-wrap m-0">
              {projectFilters.map((btn, index) => (
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
          {/* Projects Grid */}
          <div className="row g-4">
            {filteredProjects.length > 0 ? (
              filteredProjects.map((project) => (
                <div key={project.id} className="col-lg-4 col-md-6">
                  <div
                    className="project-card"
                    onClick={() => setSelectedProject(project)}
                  >
                    <div>
                      <div className="project-img-wrap">
                        <img src={project.image} alt={project.title} loading="lazy" />
                        <button
                          type="button"
                          className="project-external-btn border-0"
                          title="View Details"
                          aria-label={`View details for ${project.title}`}
                          onClick={(e) => {
                            e.stopPropagation();
                            setSelectedProject(project);
                          }}
                        >
                          <i className="bi bi-arrow-up-right"></i>
                        </button>
                      </div>

                      <div className="project-body">
                        <span className="project-category-badge">
                          {project.category}
                        </span>
                        <h4 className="project-title">{project.title}</h4>
                        <p className="project-short-desc">
                          {project.subtitle}
                        </p>
                        <div className="project-tech-list">
                          {project.tags.map((tech, tIndex) => (
                            <span key={tIndex} className="project-tech-pill">
                              {tech}
                            </span>
                          ))}
                        </div>
                      </div>
                    </div>

                    <div className="project-footer-actions">
                      <button
                        type="button"
                        className="project-action-btn text-primary"
                        onClick={(e) => {
                          e.stopPropagation();
                          setSelectedProject(project);
                        }}
                      >
                        <i className="bi bi-info-circle me-1"></i> Details
                      </button>

                      {project.liveDemoUrl && (
                        <>
                          <div className="project-action-divider"></div>
                          <a
                            href={project.liveDemoUrl}
                            target="_blank"
                            rel="noreferrer"
                            className="project-action-btn"
                            onClick={(e) => e.stopPropagation()}
                            aria-label={`Live demo of ${project.title}`}
                          >
                            <i className="bi bi-box-arrow-up-right"></i> Demo
                          </a>
                        </>
                      )}

                      {project.codeUrl && (
                        <>
                          <div className="project-action-divider"></div>
                          <a
                            href={project.codeUrl}
                            target="_blank"
                            rel="noreferrer"
                            className="project-action-btn"
                            onClick={(e) => e.stopPropagation()}
                            aria-label={`Source code for ${project.title}`}
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

      {/* Interactive Project Details Modal */}
      {selectedProject && (
        <div
          className="project-modal-backdrop"
          onClick={() => setSelectedProject(null)}
        >
          <div
            className="project-modal-dialog"
            onClick={(e) => e.stopPropagation()}
          >
            {/* Modal Header */}
            <div className="project-modal-header">
              <div>
                <span className="project-category-badge mb-1">
                  {selectedProject.category}
                </span>
                <h3 className="m-0 fw-bold" style={{ fontSize: '18px', color: '#0f172a' }}>
                  {selectedProject.title}
                </h3>
              </div>
              <button
                type="button"
                className="project-modal-close-btn"
                onClick={() => setSelectedProject(null)}
                aria-label="Close modal"
              >
                <i className="bi bi-x-lg"></i>
              </button>
            </div>

            {/* Modal Hero Banner */}
            <div className="project-modal-banner">
              <img src={selectedProject.image} alt={selectedProject.title} />
            </div>

            {/* Modal Body Content */}
            <div className="project-modal-body-content">
              {/* Meta Row */}
              <div className="project-modal-meta-row">
                {selectedProject.role && (
                  <span className="project-modal-meta-item">
                    <i className="bi bi-person-badge"></i>
                    <span><strong>Role:</strong> {selectedProject.role}</span>
                  </span>
                )}
                {selectedProject.timeline && (
                  <span className="project-modal-meta-item">
                    <i className="bi bi-calendar3"></i>
                    <span><strong>Timeline:</strong> {selectedProject.timeline}</span>
                  </span>
                )}
                <span className="project-modal-meta-item">
                  <i className="bi bi-tag"></i>
                  <span>{selectedProject.category}</span>
                </span>
              </div>

              {/* Tech Stack Pills */}
              <div className="mb-4">
                <h5 className="fw-bold mb-2" style={{ fontSize: '13.5px', color: '#334155', textTransform: 'uppercase', letterSpacing: '0.5px' }}>
                  Technologies Used:
                </h5>
                <div className="d-flex flex-wrap gap-2">
                  {selectedProject.tags.map((tag, tIndex) => (
                    <span key={tIndex} className="skill-micro-chip px-3 py-1">
                      {tag}
                    </span>
                  ))}
                </div>
              </div>

              {/* Rich HTML Details Section */}
              <div
                dangerouslySetInnerHTML={{ __html: selectedProject.detailsHtml }}
              />
            </div>

            {/* Modal Footer */}
            <div className="project-modal-footer">
              <button
                type="button"
                className="btn btn-outline-secondary btn-sm px-4 rounded-pill fw-semibold"
                onClick={() => setSelectedProject(null)}
              >
                Close
              </button>

              <div className="d-flex align-items-center gap-2">
                {selectedProject.codeUrl && (
                  <a
                    href={selectedProject.codeUrl}
                    target="_blank"
                    rel="noreferrer"
                    className="btn btn-outline-dark btn-sm px-3 rounded-pill fw-semibold"
                  >
                    <i className="bi bi-github me-1"></i> View Code
                  </a>
                )}
                {selectedProject.liveDemoUrl && (
                  <a
                    href={selectedProject.liveDemoUrl}
                    target="_blank"
                    rel="noreferrer"
                    className="btn btn-primary btn-sm px-4 rounded-pill fw-semibold"
                  >
                    <i className="bi bi-box-arrow-up-right me-1"></i> Live Demo
                  </a>
                )}
              </div>
            </div>
          </div>
        </div>
      )}
    </section>
  );
}
