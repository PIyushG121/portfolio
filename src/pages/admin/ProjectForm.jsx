import React, { useState, useEffect, useRef } from 'react';
import { useNavigate, useParams, Link } from 'react-router-dom';
import AdminLayout from '../../components/admin/AdminLayout';
import { useProjects } from '../../context/ProjectContext';

export default function ProjectForm() {
  const { id } = useParams();
  const isEdit = Boolean(id);
  const { projects, addProject, updateProject } = useProjects();
  const navigate = useNavigate();

  const editorRef = useRef(null);
  const editorInstanceRef = useRef(null);

  const [form, setForm] = useState({
    title: '',
    category: 'Web Application',
    short_description: '',
    long_description: '',
    external_link: '',
    github_link: '',
    sort_order: 0,
    featured: false,
    image_path: 'assets/img/portfolio/app-1.jpg',
    tech_stack: 'React.js, Laravel, MySQL, Tailwind CSS',
  });

  useEffect(() => {
    if (isEdit) {
      const existing = projects.find((p) => p.id === Number(id));
      if (existing) {
        const loadedForm = {
          title: existing.title || '',
          category: existing.category || 'Web Application',
          short_description: existing.short_description || '',
          long_description: existing.long_description || '',
          external_link: existing.external_link || '',
          github_link: existing.github_link || '',
          sort_order: existing.sort_order || 0,
          featured: Boolean(existing.featured),
          image_path: existing.image_path || 'assets/img/portfolio/app-1.jpg',
          tech_stack: Array.isArray(existing.tech_stack)
            ? existing.tech_stack.join(', ')
            : existing.tech_stack || '',
        };
        setForm(loadedForm);
        if (editorInstanceRef.current && existing.long_description) {
          editorInstanceRef.current.setData(existing.long_description);
        }
      }
    }
  }, [id, isEdit, projects]);

  useEffect(() => {
    let active = true;

    const initCKEditor = () => {
      if (
        editorRef.current &&
        window.ClassicEditor &&
        !editorInstanceRef.current &&
        active
      ) {
        window.ClassicEditor.create(editorRef.current)
          .then((editor) => {
            if (!active) return;
            editorInstanceRef.current = editor;
            if (form.long_description) {
              editor.setData(form.long_description);
            }
            editor.model.document.on('change:data', () => {
              const data = editor.getData();
              setForm((prev) => ({ ...prev, long_description: data }));
            });
          })
          .catch((error) => {
            console.error('CKEditor initialization error:', error);
          });
      }
    };

    const loadScriptAndInit = () => {
      if (window.ClassicEditor) {
        initCKEditor();
      } else {
        const existingScript = document.getElementById('ckeditor-script');
        if (!existingScript) {
          const script = document.createElement('script');
          script.id = 'ckeditor-script';
          script.src = 'https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js';
          script.onload = () => {
            if (active) initCKEditor();
          };
          document.body.appendChild(script);
        } else {
          existingScript.addEventListener('load', () => {
            if (active) initCKEditor();
          });
        }
      }
    };

    loadScriptAndInit();

    return () => {
      active = false;
      if (editorInstanceRef.current) {
        editorInstanceRef.current.destroy().then(() => {
          editorInstanceRef.current = null;
        });
      }
    };
  }, []);

  const handleChange = (e) => {
    const { name, value, type, checked } = e.target;
    setForm((prev) => ({
      ...prev,
      [name]: type === 'checkbox' ? checked : value,
    }));
  };

  const handleSubmit = (e) => {
    e.preventDefault();
    if (isEdit) {
      updateProject(id, form);
    } else {
      addProject(form);
    }
    navigate('/admin/projects');
  };

  return (
    <AdminLayout>
      <div className="d-flex justify-content-between align-items-center mb-4">
        <div>
          <h1 className="h3 mb-1">{isEdit ? 'Edit Project' : 'Create Project'}</h1>
          <p className="text-muted mb-0">
            {isEdit
              ? 'Update the project details.'
              : 'Add a new project to your portfolio.'}
          </p>
        </div>
        <Link to="/admin/projects" className="btn btn-outline-secondary">
          Back to Projects
        </Link>
      </div>

      <div className="card border-0 shadow-sm">
        <div className="card-body p-4">
          <form onSubmit={handleSubmit}>
            <div className="row g-3">
              <div className="col-md-8">
                <label className="form-label font-semibold">Title</label>
                <input
                  type="text"
                  name="title"
                  className="form-control"
                  value={form.title}
                  onChange={handleChange}
                  required
                />
              </div>

              <div className="col-md-4">
                <label className="form-label font-semibold">Category</label>
                <input
                  type="text"
                  name="category"
                  className="form-control"
                  value={form.category}
                  onChange={handleChange}
                  placeholder="e.g. Web Application, AI / ML"
                  required
                />
              </div>

              <div className="col-12">
                <label className="form-label font-semibold">
                  Short Description
                </label>
                <textarea
                  name="short_description"
                  className="form-control"
                  rows="3"
                  value={form.short_description}
                  onChange={handleChange}
                  required
                ></textarea>
              </div>

              <div className="col-12">
                <label className="form-label font-semibold">
                  Long Description
                </label>
                <div className="project-editor text-dark">
                  <div ref={editorRef}>{form.long_description}</div>
                </div>
              </div>

              <div className="col-md-6">
                <label className="form-label font-semibold">
                  Tech Stack (comma separated)
                </label>
                <input
                  type="text"
                  name="tech_stack"
                  className="form-control"
                  value={form.tech_stack}
                  onChange={handleChange}
                />
              </div>

              <div className="col-md-6">
                <label className="form-label font-semibold">Image Path</label>
                <input
                  type="text"
                  name="image_path"
                  className="form-control"
                  value={form.image_path}
                  onChange={handleChange}
                  placeholder="assets/img/portfolio/app-1.jpg"
                />
              </div>

              <div className="col-md-6">
                <label className="form-label font-semibold">External Link</label>
                <input
                  type="url"
                  name="external_link"
                  className="form-control"
                  value={form.external_link}
                  onChange={handleChange}
                />
              </div>

              <div className="col-md-6">
                <label className="form-label font-semibold">GitHub Link</label>
                <input
                  type="url"
                  name="github_link"
                  className="form-control"
                  value={form.github_link}
                  onChange={handleChange}
                />
              </div>

              <div className="col-md-4">
                <label className="form-label font-semibold">Sort Order</label>
                <input
                  type="number"
                  name="sort_order"
                  className="form-control"
                  value={form.sort_order}
                  onChange={handleChange}
                  min="0"
                />
              </div>

              <div className="col-md-4 d-flex align-items-end">
                <div className="form-check mb-2">
                  <input
                    className="form-check-input"
                    type="checkbox"
                    id="featured"
                    name="featured"
                    checked={form.featured}
                    onChange={handleChange}
                  />
                  <label className="form-check-label font-semibold" htmlFor="featured">
                    Featured Project
                  </label>
                </div>
              </div>

              <div className="col-12 mt-4">
                <button type="submit" className="btn btn-primary px-4 py-2">
                  {isEdit ? 'Update Project' : 'Save Project'}
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </AdminLayout>
  );
}
