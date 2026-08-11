import React from 'react';
import { skills } from '../data/skills';

export default function Skills() {
  return (
    <section id="skills" className="skills section light-background">
      <div className="container section-title" data-aos="fade-up">
        <h2>Skills</h2>
        <p>Core tools and technologies I use to ship quality work.</p>
      </div>

      <div className="container" data-aos="fade-up" data-aos-delay="100">
        <div className="skills-grid">
          {skills.map((skill, index) => (
            <div key={index} className="skill-card">
              <div className="skill-header">
                <div className="skill-title-wrap">
                  <img src={skill.icon} alt={skill.name} />
                  <span>{skill.name}</span>
                </div>
                <div className="skill-stats">
                  <span className="skill-percent">{skill.percent}%</span>
                  <span className="skill-level-badge">{skill.level}</span>
                </div>
              </div>
              <div className="skill-bar-wrap">
                <div
                  className="skill-bar-fill"
                  style={{ width: `${skill.percent}%` }}
                ></div>
              </div>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}
