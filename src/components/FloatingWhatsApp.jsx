import React from 'react';
import { settings } from '../data/settings';

export default function FloatingWhatsApp() {
  return (
    <div className="floating_btn">
      <a
        target="_blank"
        rel="noopener noreferrer"
        href={settings.whatsapp}
        aria-label="Chat with Piyush Gupta on WhatsApp"
        title="Chat on WhatsApp"
      >
        <div className="contact_icon">
          <i className="bi bi-whatsapp my-float" aria-hidden="true"></i>
        </div>
      </a>
      <p className="text_icon">Talk to us?</p>
    </div>
  );
}
