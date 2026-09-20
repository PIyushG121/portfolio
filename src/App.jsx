import React, { useEffect } from 'react';
import Header from './components/Header';
import Hero from './components/Hero';
import About from './components/About';
import Skills from './components/Skills';
import Resume from './components/Resume';
import Certifications from './components/Certifications';
import Portfolio from './components/Portfolio';
import Services from './components/Services';
import Contact from './components/Contact';
import Footer from './components/Footer';
import FloatingWhatsApp from './components/FloatingWhatsApp';

import './assets/css/home-styles.css';

export default function App() {
  useEffect(() => {
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
      <Footer />
      <FloatingWhatsApp />
    </>
  );
}
