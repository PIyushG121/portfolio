import React from 'react';
import {
  settings,
  aboutHighlights,
  whatIDo,
  techStackRow1,
  techStackRow2,
} from '../data/settings';
import { educations } from '../data/education';
import { projects } from '../data/projects';

export default function About() {
  const primaryEducation = educations[0];

  return (
    <section id="about" className="about about-modern section">
      <div className="container section-title" data-aos="fade-up">
        <h2>About Me</h2>
      </div>

      <div className="container" data-aos="fade-up" data-aos-delay="100">
        <div className="row gy-4 align-items-stretch mb-4">
          <div className="col-lg-7">
            <div className="about-copy pe-lg-4">
              <p>{settings.bio}</p>

              <div className="about-highlight-list">
                {aboutHighlights.map((highlight, index) => (
                  <div key={index} className="about-highlight">
                    <i className={highlight.icon}></i>
                    <span>{highlight.label}</span>
                  </div>
                ))}
              </div>
            </div>
          </div>
          <div className="col-lg-5">
            <div className="about-hero-card">
              <img src="assets/img/about.png" alt={`About ${settings.name}`} loading="lazy" />
              <div className="experience-badge">
                <strong>2+</strong>
                <span>Years of Experience</span>
              </div>
            </div>
          </div>
        </div>

        <div className="row gy-4 mb-4">
          <div className="col-lg-7">
            <div className="about-info-card h-100">
              <div className="about-card-title">
                <i className="bi bi-person-vcard"></i>
                <span>Personal Information</span>
              </div>

              <div className="about-detail-grid">
                <div className="about-detail-item">
                  <div className="about-detail-icon">
                    <i className="bi bi-mortarboard"></i>
                  </div>
                  <div>
                    <h5>Degree</h5>
                    <p>{settings.degree}</p>
                  </div>
                </div>
                <div className="about-detail-item">
                  <div className="about-detail-icon">
                    <i className="bi bi-envelope"></i>
                  </div>
                  <div>
                    <h5>Email</h5>
                    <p>{settings.email}</p>
                  </div>
                </div>
                <div className="about-detail-item">
                  <div className="about-detail-icon">
                    <i className="bi bi-building"></i>
                  </div>
                  <div>
                    <h5>University</h5>
                    <p>
                      {primaryEducation?.institution ||
                        'Shri Ramswaroop Memorial College of Engineering and Management'}
                    </p>
                  </div>
                </div>
                <div className="about-detail-item">
                  <div className="about-detail-icon">
                    <i className="bi bi-telephone"></i>
                  </div>
                  <div>
                    <h5>Phone</h5>
                    <p>{settings.phone}</p>
                  </div>
                </div>
                <div className="about-detail-item">
                  <div className="about-detail-icon">
                    <i className="bi bi-geo-alt"></i>
                  </div>
                  <div>
                    <h5>Location</h5>
                    <p>{settings.city}</p>
                  </div>
                </div>
                <div className="about-detail-item">
                  <div className="about-detail-icon">
                    <i className="bi bi-briefcase"></i>
                  </div>
                  <div>
                    <h5>Freelance</h5>
                    <p>{settings.freelance}</p>
                  </div>
                </div>
                <div className="about-detail-item">
                  <div className="about-detail-icon">
                    <i className="bi bi-globe"></i>
                  </div>
                  <div>
                    <h5>Languages</h5>
                    <p>{settings.languages}</p>
                  </div>
                </div>
                <div className="about-detail-item">
                  <div className="about-detail-icon">
                    <i className="bi bi-kanban"></i>
                  </div>
                  <div>
                    <h5>Projects</h5>
                    <p>
                      {settings.stat_projects_shipped || projects.length}{' '}
                      Projects Shipped
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div className="col-lg-5">
            <div className="about-services-card h-100">
              <div className="about-card-title">
                <i className="bi bi-folder2-open"></i>
                <span>What I Do</span>
              </div>

              {whatIDo.map((item, index) => (
                <div key={index} className="about-service-item">
                  <div className="about-service-icon">
                    <i className={item.icon}></i>
                  </div>
                  <div>
                    <h5>{item.title}</h5>
                    <p>{item.text}</p>
                  </div>
                </div>
              ))}
            </div>
          </div>
        </div>

        <div className="about-tech-card">
          <div className="about-card-title mb-3">
            <span className="icon-code">&lt;/&gt;</span>
            <span>Technologies & Tools</span>
          </div>

          <div className="marquee-container">
            <div className="marquee-row marquee-row-left">
              <div className="marquee-track">
                {[...techStackRow1, ...techStackRow1].map((tech, index) => (
                  <div key={index} className="tech-pill">
                    <img
                      src={tech.icon}
                      alt={tech.label}
                      width="22"
                      height="22"
                    />
                    <span>{tech.label}</span>
                  </div>
                ))}
              </div>
            </div>

            <div className="marquee-row marquee-row-right">
              <div className="marquee-track">
                {[...techStackRow2, ...techStackRow2].map((tech, index) => (
                  <div key={index} className="tech-pill">
                    <img
                      src={tech.icon}
                      alt={tech.label}
                      width="22"
                      height="22"
                    />
                    <span>{tech.label}</span>
                  </div>
                ))}
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}
