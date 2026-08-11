import React from 'react';
import { BrowserRouter, Routes, Route, Navigate } from 'react-router-dom';
import Header from './components/Header';
import Hero from './components/Hero';
import About from './components/About';
import Skills from './components/Skills';
import Resume from './components/Resume';
import Certifications from './components/Certifications';
import Portfolio from './components/Portfolio';
import Services from './components/Services';
import Contact from './components/Contact';
import FloatingWhatsApp from './components/FloatingWhatsApp';

import { AuthProvider, useAuth } from './context/AuthContext';
import { ProjectProvider } from './context/ProjectContext';

import Login from './pages/admin/Login';
import Dashboard from './pages/admin/Dashboard';
import ProjectList from './pages/admin/ProjectList';
import ProjectForm from './pages/admin/ProjectForm';

import './assets/css/home-styles.css';

function MainPortfolio() {
  React.useEffect(() => {
    if (window.AOS) {
      window.AOS.init({
        duration: 600,
        easing: 'ease-in-out',
        once: true,
        mirror: false,
      });
      window.AOS.refresh();
    }
  }, []);

  return (
    <>
      <Header />
      <main className="main">
        <Hero />
        <About />
        <Skills />
        <Resume />
        <Certifications />
        <Portfolio />
        <Services />
        <Contact />
      </main>
      <FloatingWhatsApp />
    </>
  );
}

function ProtectedRoute({ children }) {
  const { isAuthenticated } = useAuth();
  if (!isAuthenticated) {
    return <Navigate to="/login" replace />;
  }
  return children;
}

export default function App() {
  return (
    <AuthProvider>
      <ProjectProvider>
        <BrowserRouter>
          <Routes>
            {/* Public Portfolio Route */}
            <Route path="/" element={<MainPortfolio />} />

            {/* Admin Authentication & Management Routes */}
            <Route path="/login" element={<Login />} />
            <Route
              path="/admin"
              element={
                <ProtectedRoute>
                  <Dashboard />
                </ProtectedRoute>
              }
            />
            <Route
              path="/admin/projects"
              element={
                <ProtectedRoute>
                  <ProjectList />
                </ProtectedRoute>
              }
            />
            <Route
              path="/admin/projects/create"
              element={
                <ProtectedRoute>
                  <ProjectForm />
                </ProtectedRoute>
              }
            />
            <Route
              path="/admin/projects/edit/:id"
              element={
                <ProtectedRoute>
                  <ProjectForm />
                </ProtectedRoute>
              }
            />

            {/* Catch-all redirect to Home */}
            <Route path="*" element={<Navigate to="/" replace />} />
          </Routes>
        </BrowserRouter>
      </ProjectProvider>
    </AuthProvider>
  );
}
