import React, { createContext, useContext, useState, useEffect } from 'react';
import { projects as initialProjects } from '../data/projects';

const ProjectContext = createContext();

export function ProjectProvider({ children }) {
  const [projectsList, setProjectsList] = useState(() => {
    const saved = localStorage.getItem('portfolio_projects');
    if (saved) {
      try {
        return JSON.parse(saved);
      } catch (e) {
        return initialProjects;
      }
    }
    return initialProjects;
  });

  useEffect(() => {
    localStorage.setItem('portfolio_projects', JSON.stringify(projectsList));
  }, [projectsList]);

  const addProject = (project) => {
    const newProject = {
      ...project,
      id: Date.now(),
      sort_order: Number(project.sort_order) || 0,
      featured: Boolean(project.featured),
      tech_stack: typeof project.tech_stack === 'string'
        ? project.tech_stack.split(',').map((s) => s.trim())
        : project.tech_stack || ['React.js', 'Tailwind CSS'],
      filterCategory: project.category?.toLowerCase().includes('ai')
        ? 'filter-ai'
        : project.category?.toLowerCase().includes('tool')
        ? 'filter-tool'
        : 'filter-web',
    };
    setProjectsList((prev) => [newProject, ...prev]);
  };

  const updateProject = (id, updatedData) => {
    setProjectsList((prev) =>
      prev.map((proj) => (proj.id === Number(id) ? { ...proj, ...updatedData } : proj))
    );
  };

  const deleteProject = (id) => {
    setProjectsList((prev) => prev.filter((proj) => proj.id !== Number(id)));
  };

  return (
    <ProjectContext.Provider
      value={{ projects: projectsList, addProject, updateProject, deleteProject }}
    >
      {children}
    </ProjectContext.Provider>
  );
}

export function useProjects() {
  return useContext(ProjectContext);
}
