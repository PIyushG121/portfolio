import React from 'react';
import { educations } from '../data/education';
import { experiences } from '../data/experience';

export default function Resume() {
  return (
    <section id="resume" className="resume section">
      <div className="container" data-aos="fade-up">
        <div className="row g-4">
          {/* Education Column */}
          <div className="col-lg-6">
            <div className="section-card-box h-100">
              <div className="about-card-title mb-4">
                <i className="bi bi-mortarboard"></i>
                <span>Education</span>
              </div>

              <div className="d-flex flex-column gap-3">
                {educations.map((edu, index) => (
                  <div key={index} className="resume-card">
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
                      <span className="resume-description-text">{edu.description}</span>
                    )}
                  </div>
                ))}
              </div>
            </div>
          </div>

          {/* Experience Column */}
          <div className="col-lg-6">
            <div className="section-card-box h-100">
              <div className="about-card-title mb-4">
                <i className="bi bi-briefcase"></i>
                <span>Experience</span>
              </div>

              <div className="d-flex flex-column gap-3">
                {experiences.map((exp, index) => (
                  <div key={index} className="resume-card">
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
                ))}
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}
