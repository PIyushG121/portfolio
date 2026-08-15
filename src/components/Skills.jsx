import React, { useState, useMemo } from 'react';
import { skills, skillCategories } from '../data/skills';

export default function Skills() {
  const [activeCategory, setActiveCategory] = useState('all');

  const filteredSkills = useMemo(() => {
    return skills.filter((skill) => {
      return activeCategory === 'all' || skill.category === activeCategory;
    });
  }, [activeCategory]);

  const getBadgeStyle = (badgeType) => {
    switch (badgeType) {
      case 'primary':
        return { background: '#eff6ff', color: '#2563eb', border: '1px solid #bfdbfe' };
      case 'danger':
        return { background: '#fef2f2', color: '#dc2626', border: '1px solid #fecaca' };
      case 'purple':
        return { background: '#faf5ff', color: '#9333ea', border: '1px solid #e9d5ff' };
      case 'success':
        return { background: '#f0fdf4', color: '#16a34a', border: '1px solid #bbf7d0' };
      case 'warning':
        return { background: '#fefce8', color: '#ca8a04', border: '1px solid #fef08a' };
      case 'info':
        return { background: '#f0f9ff', color: '#0284c7', border: '1px solid #bae6fd' };
      default:
        return { background: '#f8fafc', color: '#475569', border: '1px solid #e2e8f0' };
    }
  };

  return (
    <section id="skills" className="skills section modern-skills-section light-background">
      <div className="container section-title" data-aos="fade-up">
        <h2>Tech Stack & Skills</h2>
        <p>A categorized, production-tested toolkit for building robust web, mobile, and AI solutions.</p>
      </div>

      <div className="container" data-aos="fade-up" data-aos-delay="100">
        {/* Playful Stats Bar */}
        <div className="skills-highlight-banner mb-4">
          <div className="skill-stat-pill">
            <i className="bi bi-layers-fill text-primary"></i>
            <span><strong>10+</strong> Core Technologies</span>
          </div>
          <div className="skill-stat-pill">
            <i className="bi bi-phone-fill text-info"></i>
            <span><strong>Web & Mobile APK</strong> Architecture</span>
          </div>
          <div className="skill-stat-pill">
            <i className="bi bi-cpu-fill" style={{ color: '#9333ea' }}></i>
            <span><strong>AI & RAG</strong> Automation</span>
          </div>
          <div className="skill-stat-pill">
            <i className="bi bi-shield-check text-success"></i>
            <span><strong>Production-Proven</strong> Code</span>
          </div>
        </div>

        {/* Filter Tabs */}
        <div className="skills-toolbar mb-4">
          <div className="skills-category-tabs">
            {skillCategories.map((cat) => {
              const count =
                cat.id === 'all'
                  ? skills.length
                  : skills.filter((s) => s.category === cat.id).length;
              const isActive = activeCategory === cat.id;

              return (
                <button
                  key={cat.id}
                  type="button"
                  className={`skills-tab-btn ${isActive ? 'active' : ''}`}
                  onClick={() => setActiveCategory(cat.id)}
                >
                  <i className={cat.icon}></i>
                  <span>{cat.label}</span>
                  <span className="tab-count-badge">{count}</span>
                </button>
              );
            })}
          </div>
        </div>

        {/* Dynamic Interactive Cards Grid */}
        <div className="modern-skills-grid">
          {filteredSkills.map((skill) => {
            const badgeStyle = getBadgeStyle(skill.badgeType);

            return (
              <div key={skill.id} className="modern-skill-card">
                <div className="skill-top-bar">
                  <div className="skill-brand-wrap">
                    <div
                      className="skill-brand-icon"
                      style={{ backgroundColor: skill.iconBg }}
                    >
                      <img src={skill.icon} alt={skill.name} loading="lazy" />
                    </div>
                    <div>
                      <h4 className="skill-name">{skill.name}</h4>
                      <span className="skill-level-indicator">
                        <i className="bi bi-check-circle-fill"></i> {skill.level} Proficiency
                      </span>
                    </div>
                  </div>

                  <span className="skill-tag-badge" style={badgeStyle}>
                    {skill.badge}
                  </span>
                </div>

                <p className="skill-desc">{skill.tagline}</p>

                <div className="skill-chips-wrap">
                  {skill.tags.map((tag, tagIndex) => (
                    <span key={tagIndex} className="skill-chip">
                      {tag}
                    </span>
                  ))}
                </div>

                <div className="skill-card-footer">
                  <div className="skill-footer-dots">
                    <span className="dot filled"></span>
                    <span className="dot filled"></span>
                    <span className="dot filled"></span>
                    <span className="dot filled"></span>
                    <span className={`dot ${skill.level === 'Advanced' ? 'filled' : 'half'}`}></span>
                  </div>
                  <span className="skill-footer-meta">
                    <i className="bi bi-stars"></i> Production Ready
                  </span>
                </div>
              </div>
            );
          })}
        </div>

        {/* Playful Interactive Callout */}
        <div className="skills-interactive-callout mt-4">
          <div className="callout-left">
            <div className="callout-icon">
              <i className="bi bi-rocket-takeoff-fill"></i>
            </div>
            <div>
              <h5>Looking for a specific tech stack or custom integration?</h5>
              <p>I rapidly adapt to new APIs, frameworks, and architecture patterns.</p>
            </div>
          </div>
          <div className="callout-actions">
            <a href="#portfolio" className="btn-callout-secondary">
              <i className="bi bi-grid me-1"></i> View Projects
            </a>
            <a href="#contact" className="btn-callout-primary">
              <i className="bi bi-chat-dots-fill me-1"></i> Let&apos;s Build Together
            </a>
          </div>
        </div>
      </div>
    </section>
  );
}
