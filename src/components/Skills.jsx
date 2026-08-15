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
    <section id="skills" className="skills section">
      <div className="container" data-aos="fade-up">
        <div className="about-tech-card">
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
            <div className="about-card-title m-0">
              <span className="icon-code">&lt;/&gt;</span>
              <span>Tech Stack & Skills</span>
            </div>

            <div className="skills-toolbar m-0 p-0 border-0 shadow-none bg-transparent">
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
          </div>

          {/* Rich Skill Tiles Grid with Crisp Details */}
          <div className="row g-3">
            {filteredSkills.map((skill) => (
              <div key={skill.id} className="col-lg-6 col-md-12">
                <div className="skill-detail-tile">
                  <div>
                    <div className="d-flex align-items-center justify-content-between gap-2 mb-2">
                      <div className="d-flex align-items-center gap-2">
                        <div
                          className="skill-tile-icon"
                          style={{ backgroundColor: skill.iconBg || '#f1f5f9' }}
                        >
                          <img src={skill.icon} alt={skill.name} loading="lazy" />
                        </div>
                        <div>
                          <h5 className="skill-tile-title">{skill.name}</h5>
                          <span className="skill-tile-level">
                            <i className="bi bi-check-circle-fill text-success me-1"></i>
                            {skill.level} Proficiency
                          </span>
                        </div>
                      </div>
                      <span className="skill-pill-badge" style={getBadgeStyle(skill.badgeType)}>
                        {skill.badge}
                      </span>
                    </div>

                    <p className="skill-tile-desc">{skill.tagline}</p>
                  </div>

                  <div className="skill-tile-chips">
                    {skill.tags.map((tag, tIndex) => (
                      <span key={tIndex} className="skill-micro-chip">
                        {tag}
                      </span>
                    ))}
                  </div>
                </div>
              </div>
            ))}
          </div>


        </div>
      </div>
    </section>
  );
}
