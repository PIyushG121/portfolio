import React, { useEffect, useRef } from 'react';
import Typed from 'typed.js';
import { settings } from '../data/settings';

export default function Hero() {
  const typedElementRef = useRef(null);

  useEffect(() => {
    const typed = new Typed(typedElementRef.current, {
      strings: [
        `${settings.tagline}`,
        'Laravel Developer',
        'AI Builder',
      ],
      typeSpeed: 50,
      backSpeed: 30,
      backDelay: 2000,
      loop: true,
    });

    return () => {
      typed.destroy();
    };
  }, []);

  return (
    <section id="hero" className="hero section dark-background">
      <img
        src={settings.hero_bg}
        alt="Hero background"
        data-aos="fade-in"
      />

      <div className="container" data-aos="fade-up" data-aos-delay="100">
        <h1>{settings.name}</h1>
        <p>
          I'm <span ref={typedElementRef} className="typed"></span>
        </p>
      </div>
    </section>
  );
}
