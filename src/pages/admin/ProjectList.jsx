import React, { useState } from 'react';
import { Link } from 'react-router-dom';
import AdminLayout from '../../components/admin/AdminLayout';
import { useProjects } from '../../context/ProjectContext';

export default function ProjectList() {
  const { projects, deleteProject } = useProjects();
  const [searchTerm, setSearchTerm] = useState('');

  const filteredProjects = projects.filter(
    (p) =>
      p.title.toLowerCase().includes(searchTerm.toLowerCase()) ||
      p.category.toLowerCase().includes(searchTerm.toLowerCase()) ||
      p.short_description.toLowerCase().includes(searchTerm.toLowerCase())
  );

  const handleDelete = (id) => {
    if (window.confirm('Delete this project?')) {
      deleteProject(id);
    }
  };

  return (
    <AdminLayout>
      <div className="d-flex justify-content-between align-items-center mb-4">
        <div>
          <h1 className="h3 mb-1">Projects</h1>
          <p className="text-muted mb-0">
            Create and manage the portfolio cards shown on the public site.
          </p>
        </div>
        <Link to="/admin/projects/create" className="btn btn-primary">
          Add Project
        </Link>
      </div>

      <div className="card border-0 shadow-sm">
        <div className="card-body">
          <div className="mb-3">
            <input
              type="text"
              className="form-control"
              placeholder="Search projects, categories, descriptions..."
              value={searchTerm}
              onChange={(e) => setSearchTerm(e.target.value)}
            />
          </div>

          <table className="table table-striped table-hover align-middle mb-0">
            <thead>
              <tr>
                <th>Project</th>
                <th>Category</th>
                <th>Featured</th>
                <th>Sort</th>
                <th className="text-end">Actions</th>
              </tr>
            </thead>
            <tbody>
              {filteredProjects.length > 0 ? (
                filteredProjects.map((project) => (
                  <tr key={project.id}>
                    <td>
                      <div className="fw-semibold">{project.title}</div>
                      <div className="small text-muted">
                        {project.short_description}
                      </div>
                    </td>
                    <td>{project.category}</td>
                    <td>{project.featured ? 'Yes' : 'No'}</td>
                    <td>{project.sort_order ?? 0}</td>
                    <td className="text-end">
                      <Link
                        to={`/admin/projects/edit/${project.id}`}
                        className="btn btn-sm btn-outline-primary me-2"
                      >
                        Edit
                      </Link>
                      <button
                        onClick={() => handleDelete(project.id)}
                        className="btn btn-sm btn-outline-danger"
                      >
                        Delete
                      </button>
                    </td>
                  </tr>
                ))
              ) : (
                <tr>
                  <td colSpan="5" className="text-center text-muted py-4">
                    No projects found.
                  </td>
                </tr>
              )}
            </tbody>
          </table>
        </div>
      </div>
    </AdminLayout>
  );
}
