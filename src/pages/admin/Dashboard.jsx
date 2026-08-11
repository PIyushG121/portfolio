import React from 'react';
import { Link } from 'react-router-dom';
import AdminLayout from '../../components/admin/AdminLayout';
import { useProjects } from '../../context/ProjectContext';

export default function Dashboard() {
  const { projects } = useProjects();

  const featuredCount = projects.filter((p) => p.featured).length;
  const recentMessages = [
    {
      name: 'Sahil Kumar',
      email: 'sahil@example.com',
      subject: 'Project Inquiry - Full Stack Web App',
      created_at: '10 Aug 2026',
    },
    {
      name: 'Rohan Sharma',
      email: 'rohan@example.com',
      subject: 'Freelance AI Automation Project',
      created_at: '08 Aug 2026',
    },
  ];

  return (
    <AdminLayout>
      <div className="d-flex justify-content-between align-items-center mb-4">
        <div>
          <h1 className="h3 mb-1">Dashboard</h1>
          <p className="text-muted mb-0">
            Manage portfolio content and view client inquiries.
          </p>
        </div>
        <Link to="/admin/projects" className="btn btn-primary">
          Manage Projects
        </Link>
      </div>

      <div className="row g-4 mb-4">
        <div className="col-md-4">
          <div className="card border-0 shadow-sm">
            <div className="card-body">
              <p className="text-muted mb-2 fw-semibold">Projects</p>
              <h2 className="mb-0 fw-bold">{projects.length}</h2>
            </div>
          </div>
        </div>
        <div className="col-md-4">
          <div className="card border-0 shadow-sm">
            <div className="card-body">
              <p className="text-muted mb-2 fw-semibold">Featured Projects</p>
              <h2 className="mb-0 fw-bold">{featuredCount}</h2>
            </div>
          </div>
        </div>
        <div className="col-md-4">
          <div className="card border-0 shadow-sm">
            <div className="card-body">
              <p className="text-muted mb-2 fw-semibold">Messages</p>
              <h2 className="mb-0 fw-bold">{recentMessages.length}</h2>
            </div>
          </div>
        </div>
      </div>

      <div className="card border-0 shadow-sm">
        <div className="card-body">
          <h2 className="h5 mb-3 fw-bold">Recent Messages</h2>
          <div className="table-responsive">
            <table className="table">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Subject</th>
                  <th>Received</th>
                </tr>
              </thead>
              <tbody>
                {recentMessages.map((msg, idx) => (
                  <tr key={idx}>
                    <td className="fw-semibold">{msg.name}</td>
                    <td>{msg.email}</td>
                    <td>{msg.subject}</td>
                    <td>{msg.created_at}</td>
                  </tr>
                ))}
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </AdminLayout>
  );
}
