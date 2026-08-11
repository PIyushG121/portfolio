import React from 'react';
import { educations } from '../data/education';
import { experiences } from '../data/experience';

export default function Resume() {
  return (
    <section id="resume" className="resume section">
      <div className="container section-title" data-aos="fade-up">
        <h2>Resume</h2>
        <p>Experience and education displayed from structured data modules.</p>
      </div>

      <div className="container">
        <div className="row g-4">
          <div className="col-lg-6" data-aos="fade-up">
            <div className="resume-timeline-col">
              <div className="resume-header-badge">
                <div className="header-icon">
                  <i className="bi bi-mortarboard-fill"></i>
                </div>
                <h3>Education</h3>
              </div>
              {educations.map((edu, index) => (
                <div key={index} className="resume-card-wrap">
                  <div className="resume-card">
                    <h4 className="resume-card-title">{edu.degree}</h4>
                    <div className="resume-meta-row">
                      <span className="resume-date-badge">
                        <i className="bi bi-calendar3"></i> {edu.years}
                      </span>
                      <span className="resume-company">
                        <i className="bi bi-building"></i> {edu.institution}
                      </span>
                    </div>
                    {edu.description && (
                      <p className="resume-description-text">{edu.description}</p>
                    )}
                  </div>
                </div>
              ))}
            </div>
          </div>

          <div className="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <div className="resume-timeline-col">
              <div className="resume-header-badge">
                <div className="header-icon">
                  <i className="bi bi-briefcase-fill"></i>
                </div>
                <h3>Experience</h3>
              </div>
              {experiences.map((exp, index) => (
                <div key={index} className="resume-card-wrap">
                  <div className="resume-card">
                    <h4 className="resume-card-title">{exp.title}</h4>
                    <div className="resume-meta-row">
                      <span className="resume-date-badge">
                        <i className="bi bi-calendar3"></i> {exp.years}
                      </span>
                      <span className="resume-company">
                        <i className="bi bi-building-fill-gear"></i> {exp.company}
                      </span>
                    </div>
                    <ul className="resume-bullet-list">
                      {exp.bullets.map((bullet, bIndex) => (
                        <li key={bIndex}>
                          <i className="bi bi-check2-circle"></i>
                          <span>{bullet}</span>
                        </li>
                      ))}
                    </ul>
                  </div>
                </div>
              ))}
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}
