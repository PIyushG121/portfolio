import React, { useState } from 'react';
import { settings } from '../data/settings';

export default function Contact() {
  const [formData, setFormData] = useState({
    name: '',
    email: '',
    subject: '',
    message: '',
  });

  const [status, setStatus] = useState({
    submitting: false,
    submitted: false,
    error: false,
    message: '',
  });

  const handleChange = (e) => {
    const { name, value } = e.target;
    setFormData((prev) => ({ ...prev, [name]: value }));
  };

  const handleSubmit = async (e) => {
    e.preventDefault();
    setStatus({ submitting: true, submitted: false, error: false, message: '' });

    try {
      // Real form submission via Web3Forms (or mailto fallback if network fails)
      const response = await fetch('https://api.web3forms.com/submit', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          Accept: 'application/json',
        },
        body: JSON.stringify({
          access_key: 'YOUR_WEB3FORMS_ACCESS_KEY', // Can be configured or defaults to direct mail response
          name: formData.name,
          email: formData.email,
          subject: formData.subject,
          message: formData.message,
          to: settings.email,
        }),
      });

      const result = await response.json();

      if (result.success || response.ok) {
        setStatus({
          submitting: false,
          submitted: true,
          error: false,
          message: 'Your message has been sent successfully. I will get back to you soon!',
        });
        setFormData({ name: '', email: '', subject: '', message: '' });
      } else {
        // Direct mailto fallback if key is unconfigured
        window.location.href = `mailto:${settings.email}?subject=${encodeURIComponent(
          formData.subject
        )}&body=${encodeURIComponent(
          `Name: ${formData.name}\nEmail: ${formData.email}\n\nMessage:\n${formData.message}`
        )}`;
        setStatus({
          submitting: false,
          submitted: true,
          error: false,
          message: 'Opened your mail client to send the message directly to Piyush!',
        });
      }
    } catch (err) {
      // Fallback to mailto client
      window.location.href = `mailto:${settings.email}?subject=${encodeURIComponent(
        formData.subject
      )}&body=${encodeURIComponent(
        `Name: ${formData.name}\nEmail: ${formData.email}\n\nMessage:\n${formData.message}`
      )}`;
      setStatus({
        submitting: false,
        submitted: true,
        error: false,
        message: 'Opened your mail app to complete sending.',
      });
    }
  };

  return (
    <section id="contact" className="contact section">
      <div className="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p>
          Have a project in mind or want to work together? Send me a message — I'll get back to you as soon as possible.
        </p>
      </div>

      <div className="container" data-aos="fade-up" data-aos-delay="100">
        <div className="row g-4">
          {/* Left Column: Info Card & Embedded Google Map */}
          <div className="col-lg-5">
            <div className="contact-info-card">
              <div className="contact-info-item">
                <div className="contact-info-icon">
                  <i className="bi bi-geo-alt"></i>
                </div>
                <div className="contact-info-content">
                  <h4>Location</h4>
                  <p>{settings.city}</p>
                </div>
              </div>

              <div className="contact-info-item">
                <div className="contact-info-icon">
                  <i className="bi bi-envelope"></i>
                </div>
                <div className="contact-info-content">
                  <h4>Email</h4>
                  <p>{settings.email}</p>
                </div>
              </div>

              <div className="contact-info-item">
                <div className="contact-info-icon">
                  <i className="bi bi-telephone"></i>
                </div>
                <div className="contact-info-content">
                  <h4>Phone</h4>
                  <p>{settings.phone}</p>
                </div>
              </div>
            </div>

            <div className="contact-map-card">
              <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14240.23157147585!2d80.8758804!3d26.8378942!2m3!1f0!0f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399bfc138eb15967%3A0xbca89547d639b70b!2sRajajipuram%2C%20Lucknow%2C%20Uttar%20Pradesh%20226017!5e0!3m2!1sen!2sin!4v1700000000000!5m2!1sen!2sin"
                width="100%"
                height="100%"
                allowFullScreen=""
                loading="lazy"
                referrerPolicy="no-referrer-when-downgrade"
                title="Google Map Location"
              ></iframe>
            </div>
          </div>

          {/* Right Column: Contact Form */}
          <div className="col-lg-7">
            <div className="contact-form-card">
              {status.submitted && (
                <div
                  className={`alert ${
                    status.error ? 'alert-danger' : 'alert-success'
                  } rounded-3 mb-4`}
                >
                  <i className="bi bi-check-circle-fill me-2"></i>
                  {status.message}
                </div>
              )}

              <form onSubmit={handleSubmit}>
                <div className="row g-3">
                  <div className="col-md-6">
                    <div className="contact-input-icon-wrap">
                      <i className="bi bi-person"></i>
                      <input
                        type="text"
                        name="name"
                        className="form-control py-3"
                        placeholder="Your Name"
                        value={formData.name}
                        onChange={handleChange}
                        required
                      />
                    </div>
                  </div>
                  <div className="col-md-6">
                    <div className="contact-input-icon-wrap">
                      <i className="bi bi-envelope"></i>
                      <input
                        type="email"
                        name="email"
                        className="form-control py-3"
                        placeholder="Your Email"
                        value={formData.email}
                        onChange={handleChange}
                        required
                      />
                    </div>
                  </div>
                  <div className="col-12">
                    <div className="contact-input-icon-wrap">
                      <i className="bi bi-tag"></i>
                      <input
                        type="text"
                        name="subject"
                        className="form-control py-3"
                        placeholder="Subject"
                        value={formData.subject}
                        onChange={handleChange}
                        required
                      />
                    </div>
                  </div>
                  <div className="col-12 textarea-col">
                    <div className="contact-input-icon-wrap textarea-wrap">
                      <i className="bi bi-chat-dots"></i>
                      <textarea
                        className="form-control pt-3"
                        name="message"
                        rows="7"
                        placeholder="Your Message"
                        value={formData.message}
                        onChange={handleChange}
                        required
                      ></textarea>
                    </div>
                  </div>
                  <div className="col-12 mt-4">
                    <button
                      type="submit"
                      className="btn btn-contact-submit"
                      disabled={status.submitting}
                    >
                      {status.submitting ? (
                        <>
                          <span
                            className="spinner-border spinner-border-sm me-2"
                            role="status"
                            aria-hidden="true"
                          ></span>
                          Sending...
                        </>
                      ) : (
                        <>
                          <i className="bi bi-send-fill me-2"></i> Send Message
                        </>
                      )}
                    </button>
                  </div>
                </div>
              </form>
              <div className="contact-security-text">
                <i className="bi bi-lock-fill text-success"></i> Your information is safe with me. I'll never share your details.
              </div>
            </div>
          </div>
        </div>

        {/* Bottom Banner */}
        <div className="contact-cta-soft-banner">
          <div className="d-flex align-items-center gap-3">
            <div className="cta-icon-wrap">
              <i className="bi bi-send-fill"></i>
            </div>
            <div>
              <h4>Let's build something amazing together!</h4>
              <p>
                I'm available for freelance projects, internships, and full-time opportunities.
              </p>
            </div>
          </div>
          <a
            href={`mailto:${settings.email}`}
            className="btn btn-light border-primary rounded-pill px-4 py-2 text-primary fw-semibold d-inline-flex align-items-center gap-2"
          >
            <span>Get In Touch</span> <i className="bi bi-arrow-right"></i>
          </a>
        </div>
      </div>
    </section>
  );
}
