import React from 'react';
import { settings } from '../data/settings';

export default function FloatingWhatsApp() {
  return (
    <div className="floating_btn">
      <a
        target="_blank"
        rel="noreferrer"
        href={settings.whatsapp}
      >
        <div className="contact_icon">
          <i className="fa fa-whatsapp my-float"></i>
        </div>
      </a>
      <p className="text_icon">Talk to us?</p>
    </div>
  );
}
