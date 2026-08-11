import React from 'react';
import { Link, useNavigate } from 'react-router-dom';
import { useAuth } from '../../context/AuthContext';

export default function AdminLayout({ children, title, status }) {
  const { logout } = useAuth();
  const navigate = useNavigate();

  const handleLogout = (e) => {
    e.preventDefault();
    logout();
    navigate('/login');
  };

  return (
    <div className="admin-wrapper">
      <nav className="navbar navbar-expand-lg navbar-dark bg-dark">
        <div className="container">
          <Link className="navbar-brand fw-bold" to="/admin">
            Portfolio Admin
          </Link>
          <div className="d-flex align-items-center gap-3">
            <Link
              className="btn btn-outline-light btn-sm"
              to="/"
              target="_blank"
              rel="noreferrer"
            >
              View Site
            </Link>
            <button
              className="btn btn-light btn-sm"
              onClick={handleLogout}
              type="button"
            >
              Logout
            </button>
          </div>
        </div>
      </nav>

      <div className="container py-4">
        {status && <div className="alert alert-success">{status}</div>}
        {children}
      </div>
    </div>
  );
}
