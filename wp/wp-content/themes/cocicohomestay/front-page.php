<?php
/**
 * The front page template - Static AI-designed homepage
 * 
 * This homepage was created with PressMeGPT AI Theme Generator.
 * To make changes, visit: https://pressmegpt.com/project/c3b5582e-9b55-4076-a683-cd26f6eef032
 *
 * @package cocico-homestay-si-gn
 */

get_header();
?>

<style>
/* Theme Designer styles */
:root {
  --td-color-primary: #8B1A1A;
  --td-color-secondary: #7A6A4F;
  --td-color-background: #F5F0E8;
  --td-color-text: #7A6A4F;
  --td-color-heading: #8B1A1A;
  --td-color-link: #8B1A1A;
  --td-color-link-hover: #6a1313;
  --td-color-btn-primary-bg: #8B1A1A;
  --td-color-btn-primary-text: #FFFFFF;
  --td-color-btn-primary-hover: #721111;
  --td-color-btn-secondary-bg: #7A6A4F;
  --td-color-btn-secondary-text: #FFFFFF;
  --td-color-btn-secondary-hover: #60513e;
  --td-color-header-bg: #F5F0E8;
  --td-color-header-text: #7A6A4F;
  --td-color-footer-bg: #8B1A1A;
  --td-color-footer-text: #FFFFFF;
  --td-font-body: 'Inter', sans-serif;
  --td-font-heading: 'Cormorant Garamond', serif;
  --td-font-script: 'Great Vibes', cursive;
  --td-font-size-base: 16px;
  --td-heading-scale: 1.25;
}

/* Base Styles */
* {
  min-width: 0;
  box-sizing: border-box;
}

body {
  font-family: var(--td-font-body);
  color: var(--td-color-text);
  background-color: var(--td-color-background);
  margin: 0;
  line-height: 1.6;
}

h1, h2, h3, h4, h5, h6 {
  font-family: var(--td-font-heading);
  color: var(--td-color-heading);
  line-height: 1.1;
  letter-spacing: -0.02em;
}

img {
  max-width: 100%;
  height: auto;
  object-fit: cover;
  display: block;
}

a {
  color: var(--td-color-link);
  text-decoration: none;
}

a:hover {
  color: var(--td-color-link-hover);
}

.fse-group, .fse-section {
  overflow-x: hidden;
}

.fse-section {
  padding: 80px 0;
  position: relative;
  z-index: 1;
}

.fse-group {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 20px;
}

.fse-heading {
  margin-bottom: 20px;
  font-weight: 700;
}

.fse-heading.fse-hero-heading {
  font-size: clamp(3rem, 7vw, 5rem);
}

.fse-paragraph {
  margin-bottom: 15px;
}

.fse-button {
  display: inline-block;
  padding: 14px 28px;
  border-radius: 8px;
  text-decoration: none;
  font-weight: 500;
  cursor: pointer;
  transition: transform 0.3s ease, box-shadow 0.3s ease, filter 0.2s ease;
  border: none;
}

.fse-button-primary {
  background-color: var(--td-color-btn-primary-bg);
  color: var(--td-color-btn-primary-text);
}

.fse-button-primary:hover {
  filter: brightness(1.1);
  transform: translateY(-2px);
  box-shadow: 0 4px 15px rgba(0,0,0,0.1);
  text-decoration: none;
}

.fse-button-secondary {
  background-color: var(--td-color-btn-secondary-bg);
  color: var(--td-color-btn-secondary-text);
}

.fse-button-secondary:hover {
  filter: brightness(1.1);
  transform: translateY(-2px);
  box-shadow: 0 4px 15px rgba(0,0,0,0.1);
  text-decoration: none;
}

.fse-columns {
  display: flex;
  flex-wrap: wrap;
  gap: 30px;
}

.fse-column {
  flex: 1 1 300px;
  min-width: 0;
}

@media (max-width: 768px) {
  .fse-columns {
    flex-direction: column;
  }
  .fse-column {
    flex: 1 1 100%;
    width: 100%;
  }
}

/* Header */
.fse-header {
  padding: 15px 0;
  background: var(--td-color-header-bg);
  box-shadow: 0 2px 10px rgba(0,0,0,0.05);
}

.fse-header-content {
  display: flex;
  justify-content: space-between;
  align-items: center;
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 20px;
}

.fse-logo-area {
  display: flex;
  align-items: center;
  gap: 10px;
}

.fse-logo {
  height: 70px;
  width: auto;
  min-height: 60px;
}

.fse-site-title {
  font-size: 1.5rem;
  font-weight: 700;
  font-family: var(--td-font-heading);
  color: var(--td-color-primary);
}

.fse-main-nav {
  display: flex;
}

.fse-nav-menu {
  display: flex;
  gap: 30px;
  list-style: none;
  margin: 0;
  padding: 0;
  justify-content: center;
  align-items: center;
}

.fse-nav-menu a {
  text-decoration: none;
  color: var(--td-color-header-text);
  font-weight: 500;
  white-space: nowrap;
  transition: color 0.3s ease;
}

.fse-nav-menu a:hover {
  color: var(--td-color-primary);
}

.fse-toggle-button {
  display: none;
  background: none;
  border: none;
  font-size: 24px;
  cursor: pointer;
  color: var(--td-color-header-text);
}

.fse-header-actions {
  display: flex;
  gap: 15px;
}

.fse-main-nav.mobile-open {
  display: flex !important;
  position: absolute;
  top: 100%;
  left: 0;
  right: 0;
  background: var(--td-color-header-bg);
  flex-direction: column;
  padding: 20px;
  box-shadow: 0 4px 6px rgba(0,0,0,0.1);
  z-index: 100;
  transform-origin: top;
  animation: slideDown 0.3s ease-out forwards;
}

@keyframes slideDown {
  from { transform: scaleY(0); opacity: 0; }
  to { transform: scaleY(1); opacity: 1; }
}

.fse-main-nav.mobile-open .fse-nav-menu {
  flex-direction: column;
  gap: 15px;
  align-items: flex-start;
}

@media (max-width: 768px) {
  .fse-toggle-button {
    display: block;
    order: 3;
    margin-left: auto;
  }
  .fse-main-nav {
    display: none;
  }
  .fse-header-actions {
    display: none;
  }
  .fse-header-content {
    flex-wrap: wrap;
  }
}

/* Hero Section */
.fse-hero-section {
  padding: 100px 0;
  min-height: 85vh;
  display: flex;
  align-items: center;
  justify-content: center;
  text-align: center;
  position: relative;
  /* Gradient Mesh Background */
  background: radial-gradient(at 10% 20%, #F8E8D9 0%, #D4C6B1 50%, #A99E8F 100%);
  background-size: 200% 200%;
  animation: gradientAnimation 15s ease infinite;
}

@keyframes gradientAnimation {
  0% { background-position: 0% 50%; }
  50% { background-position: 100% 50%; }
  100% { background-position: 0% 50%; }
}

.fse-hero-grain-overlay {
  position: absolute;
  top: 0; left: 0; width: 100%; height: 100%;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.65' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.08'/%3E%3C/svg%3E");
  pointer-events: none;
  z-index: 2;
}

.fse-hero-content {
  position: relative;
  z-index: 3;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100%;
}

.fse-hero-glass-panel {
  background: rgba(255,255,255,0.1);
  backdrop-filter: blur(20px);
  border: 1px solid rgba(255,255,255,0.2);
  border-radius: 15px;
  padding: 40px 60px;
  box-shadow: 0 8px 30px rgba(0,0,0,0.15);
  max-width: 800px;
  width: 100%;
  color: #fff;
}

.fse-hero-glass-panel .fse-heading, .fse-hero-glass-panel .fse-paragraph {
  color: #fff;
}

.fse-hero-subheading {
  font-size: 1.25rem;
  margin-bottom: 30px;
  font-weight: 300;
  opacity: 0.9;
}

.fse-hero-buttons {
  display: flex;
  justify-content: center;
  gap: 20px;
  margin-top: 30px;
  flex-wrap: wrap;
}

@media (max-width: 480px) {
  .fse-hero-buttons {
    flex-direction: column;
    align-items: center;
  }
  .fse-hero-buttons .fse-button {
    width: 100%;
    max-width: 280px;
    text-align: center;
  }
  .fse-hero-glass-panel {
    padding: 30px;
  }
}

/* About Section */
.fse-about-section {
  background-color: var(--td-color-background);
  text-align: center;
}

.fse-about-content h2 {
  font-size: clamp(2.2rem, 5vw, 3rem);
  margin-bottom: 25px;
}

.fse-about-content > .fse-paragraph {
  max-width: 800px;
  margin-left: auto;
  margin-right: auto;
  font-size: 1.1rem;
  margin-bottom: 50px;
}

.fse-about-features {
  justify-content: center;
  margin-top: 40px;
}

.fse-about-features .fse-column {
  background: rgba(255,255,255,0.7);
  backdrop-filter: blur(10px);
  border: 1px solid rgba(255,255,255,0.3);
  border-radius: 12px;
  padding: 30px;
  text-align: center;
  box-shadow: 0 4px 20px rgba(0,0,0,0.05);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.fse-about-features .fse-column:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 25px rgba(0,0,0,0.1);
}

.fse-feature-icon {
  font-size: 3rem;
  color: var(--td-color-primary);
  margin-bottom: 20px;
}

.fse-about-features h3 {
  font-size: 1.5rem;
  margin-bottom: 15px;
}

/* Branches Section */
.fse-branch-section {
  background: radial-gradient(at 80% 20%, #FFE0CC 0%, #D8C3AE 50%, #B8A89A 100%);
  background-size: 200% 200%;
  animation: gradientAnimation 15s ease infinite reverse;
  color: #333;
}

.fse-branch-section .fse-heading {
  color: var(--td-color-primary);
}

.fse-branch-section .fse-section-subheading {
  color: var(--td-color-secondary);
  font-size: 1.1rem;
  margin-bottom: 40px;
  text-align: center;
}

.fse-branches-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 30px;
}

.fse-branch-card {
  background: rgba(255,255,255,0.8);
  backdrop-filter: blur(8px);
  border: 1px solid rgba(255,255,255,0.4);
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 4px 30px rgba(0,0,0,0.08);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.fse-branch-card:hover {
  transform: translateY(-8px);
  box-shadow: 0 8px 40px rgba(0,0,0,0.12);
}

.fse-branch-card .fse-image {
  width: 100%;
  height: 250px;
  object-fit: cover;
}

.fse-branch-card .fse-card-content {
  padding: 25px;
  text-align: left;
}

.fse-branch-card .fse-heading {
  font-size: 1.5rem;
  margin-top: 0;
  margin-bottom: 15px;
  color: var(--td-color-primary);
}

.fse-branch-card .fse-paragraph {
  color: var(--td-color-text);
  margin-bottom: 20px;
}

@media (max-width: 992px) {
  .fse-branches-grid {
    grid-template-columns: repeat(2, 1fr);
  }
}

@media (max-width: 576px) {
  .fse-branches-grid {
    grid-template-columns: 1fr;
  }
}

/* Rooms Section */
.fse-rooms-section {
  background-color: var(--td-color-background);
  text-align: center;
}

.fse-rooms-section .fse-heading {
  color: var(--td-color-primary);
}

.fse-rooms-section .fse-section-subheading {
  color: var(--td-color-secondary);
  font-size: 1.1rem;
  margin-bottom: 40px;
}

.fse-rooms-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 30px;
  margin-bottom: 50px;
}

.fse-room-card {
  background: rgba(255,255,255,0.7);
  backdrop-filter: blur(8px);
  border: 1px solid rgba(255,255,255,0.4);
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 4px 30px rgba(0,0,0,0.08);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.fse-room-card:hover {
  transform: translateY(-8px);
  box-shadow: 0 8px 40px rgba(0,0,0,0.12);
}

.fse-room-card .fse-image {
  width: 100%;
  height: 220px;
  object-fit: cover;
}

.fse-room-card .fse-card-content {
  padding: 25px;
  text-align: left;
}

.fse-room-card .fse-heading {
  font-size: 1.4rem;
  margin-top: 0;
  margin-bottom: 10px;
  color: var(--td-color-primary);
}

.fse-room-card .fse-paragraph {
  color: var(--td-color-text);
  margin-bottom: 15px;
  font-size: 0.95rem;
}

.fse-room-price {
  display: block;
  font-size: 1.2rem;
  font-weight: 700;
  color: var(--td-color-primary);
  margin-bottom: 20px;
}

.fse-cta-centered {
  text-align: center;
}

@media (max-width: 992px) {
  .fse-rooms-grid {
    grid-template-columns: repeat(2, 1fr);
  }
}

@media (max-width: 576px) {
  .fse-rooms-grid {
    grid-template-columns: 1fr;
  }
}

/* Testimonials Section */
.fse-testimonials-section {
  background: radial-gradient(at 10% 90%, #F5F0E8 0%, #E8E0D4 50%, #D4C6B1 100%);
  background-size: 200% 200%;
  animation: gradientAnimation 20s ease infinite;
  text-align: center;
}

.fse-testimonials-section .fse-heading {
  color: var(--td-color-primary);
}

.fse-testimonials-section .fse-section-subheading {
  color: var(--td-color-secondary);
  font-size: 1.1rem;
  margin-bottom: 50px;
}

.fse-testimonials-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 30px;
}

.fse-testimonial-card {
  background: rgba(255,255,255,0.7);
  backdrop-filter: blur(8px);
  border: 1px solid rgba(255,255,255,0.4);
  border-radius: 12px;
  padding: 30px;
  box-shadow: 0 4px 30px rgba(0,0,0,0.08);
  text-align: center;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.fse-testimonial-card:hover {
  transform: translateY(-8px);
  box-shadow: 0 8px 40px rgba(0,0,0,0.12);
}

.fse-testimonial-rating {
  color: var(--td-color-primary);
  margin-bottom: 15px;
  font-size: 1.2rem;
}

.fse-testimonial-card .fse-paragraph {
  font-style: italic;
  margin-bottom: 25px;
  color: var(--td-color-text);
}

.fse-testimonial-author {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 10px;
}

.fse-testimonial-author .fse-image {
  width: 70px;
  height: 70px;
  border-radius: 50%;
  object-fit: cover;
  border: 2px solid var(--td-color-primary);
}

.fse-author-name {
  font-weight: 500;
  color: var(--td-color-heading);
  font-family: var(--td-font-heading);
  font-size: 1.1rem;
}

@media (max-width: 992px) {
  .fse-testimonials-grid {
    grid-template-columns: repeat(2, 1fr);
  }
}

@media (max-width: 576px) {
  .fse-testimonials-grid {
    grid-template-columns: 1fr;
  }
}

/* CTA Banner */
.fse-cta-banner {
  background: linear-gradient(135deg, var(--td-color-primary) 0%, #A99E8F 100%);
  padding: 100px 0;
  text-align: center;
  color: #fff;
  position: relative;
  overflow: hidden;
}

.fse-cta-overlay {
  position: absolute;
  top: 0; left: 0; right: 0; bottom: 0;
  background: rgba(0,0,0,0.15);
  z-index: 1;
}

.fse-cta-grain-overlay {
  position: absolute;
  top: 0; left: 0; width: 100%; height: 100%;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.65' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.08'/%3E%3C/svg%3E");
  pointer-events: none;
  z-index: 2;
}

.fse-cta-content {
  position: relative;
  z-index: 3;
  max-width: 800px;
  margin-left: auto;
  margin-right: auto;
}

.fse-cta-content .fse-heading {
  color: #fff;
  font-size: clamp(2rem, 5vw, 3.5rem);
}

.fse-cta-content .fse-paragraph {
  color: rgba(255,255,255,0.9);
  font-size: 1.15rem;
  margin-bottom: 40px;
}

/* Footer */
.fse-footer {
  background: var(--td-color-footer-bg);
  padding: 60px 0 20px;
  color: var(--td-color-footer-text);
}

.fse-footer-content {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 20px;
}

.fse-footer-columns {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
  gap: 40px;
  margin-bottom: 40px;
}

.fse-footer-columns .fse-column {
  text-align: left;
}

.fse-footer-columns .fse-column h4 {
  margin-bottom: 15px;
  font-size: 1.1rem;
  color: var(--td-color-footer-text);
  text-align: left;
  font-family: var(--td-font-heading);
}

.fse-footer-logo {
  height: 40px;
  width: auto;
  margin-bottom: 15px;
  filter: brightness(0) invert(1);
}

.fse-footer-menu {
  list-style: none;
  padding: 0;
  margin: 0;
  text-align: left;
}

.fse-footer-menu li {
  margin-bottom: 10px;
}

.fse-footer-menu a {
  color: var(--td-color-footer-text);
  text-decoration: none;
  transition: color 0.3s ease;
}

.fse-footer-menu a:hover {
  color: rgba(255,255,255,0.7);
}

.fse-contact-list {
  list-style: none;
  padding: 0;
  margin: 0;
  text-align: left;
}

.fse-contact-list li {
  margin-bottom: 12px;
  display: flex;
  align-items: flex-start;
  gap: 10px;
  justify-content: flex-start;
  line-height: 1.4;
}

.fse-contact-list i {
  width: 20px;
  color: var(--td-color-footer-text);
  flex-shrink: 0;
  font-size: 1rem;
  padding-top: 3px;
}

.fse-footer-bottom {
  border-top: 1px solid rgba(255,255,255,0.15);
  padding-top: 20px;
  text-align: center;
}

.fse-copyright {
  font-size: 14px;
  text-align: center;
  color: rgba(255,255,255,0.8);
}

@media (max-width: 768px) {
  .fse-footer-columns {
    grid-template-columns: 1fr;
    gap: 30px;
  }
  .fse-footer-columns .fse-column {
    text-align: center;
  }
  .fse-footer-columns .fse-column h4 {
    text-align: center;
  }
  .fse-footer-menu {
    text-align: center;
  }
  .fse-contact-list li {
    justify-content: center;
  }
}

/* Animations */
.animate-on-scroll {
  opacity: 0;
  transform: translateY(20px);
  transition: opacity 0.6s ease-out, transform 0.6s ease-out;
}

.animate-on-scroll.is-visible {
  opacity: 1;
  transform: translateY(0);
}

.animate-slide-left {
  opacity: 0;
  transform: translateX(-50px);
  transition: opacity 0.6s ease-out, transform 0.6s ease-out;
}

.animate-slide-left.is-visible {
  opacity: 1;
  transform: translateX(0);
}

.animate-slide-right {
  opacity: 0;
  transform: translateX(50px);
  transition: opacity 0.6s ease-out, transform 0.6s ease-out;
}

.animate-slide-right.is-visible {
  opacity: 1;
  transform: translateX(0);
}

.animate-scale {
  opacity: 0;
  transform: scale(0.9);
  transition: opacity 0.6s ease-out, transform 0.6s ease-out;
}

.animate-scale.is-visible {
  opacity: 1;
  transform: scale(1);
}

/* === Scroll Reveal Animation System === */
@keyframes fadeSlideUp {
  from { opacity: 0; transform: translateY(30px); }
  to { opacity: 1; transform: translateY(0); }
}
@keyframes fadeSlideLeft {
  from { opacity: 0; transform: translateX(-30px); }
  to { opacity: 1; transform: translateX(0); }
}
@keyframes fadeSlideRight {
  from { opacity: 0; transform: translateX(30px); }
  to { opacity: 1; transform: translateX(0); }
}
@keyframes scaleIn {
  from { opacity: 0; transform: scale(0.95); }
  to { opacity: 1; transform: scale(1); }
}
.animate-on-scroll { opacity: 0; }
.animate-slide-left { opacity: 0; }
.animate-slide-right { opacity: 0; }
.animate-scale { opacity: 0; }
.animate-on-scroll.visible { animation: fadeSlideUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
.animate-slide-left.visible { animation: fadeSlideLeft 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
.animate-slide-right.visible { animation: fadeSlideRight 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
.animate-scale.visible { animation: scaleIn 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
/* Hover micro-interactions — buttons only lighten slightly, no underline, no text color change */
.fse-button { transition: transform 0.3s ease, box-shadow 0.3s ease, filter 0.2s ease; }
.fse-button:hover { transform: translateY(-2px); box-shadow: 0 6px 20px rgba(0,0,0,0.15); filter: brightness(1.1); text-decoration: none !important; }
.fse-button:hover * { text-decoration: none !important; color: inherit !important; }

</style>

<div class="theme-designer-homepage">
<!DOCTYPE html>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cocico Homestay Sài Gòn</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;700&family=Inter:wght@300;400;500;700&family=Great+Vibes&display=swap" rel="stylesheet">


    

    <main>
        <section class="fse-section fse-hero-section">
            <div class="fse-group fse-hero-content animate-on-scroll">
                <div class="fse-hero-glass-panel">
                    <h1 class="fse-heading fse-hero-heading">Trải nghiệm tinh hoa Sài Gòn<br>tại tổ ấm Cocico</h1>
                    <p class="fse-paragraph fse-hero-subheading">Không gian sống đẳng cấp, dịch vụ chu đáo và vị trí lý tưởng.</p>
                    <div class="fse-hero-buttons">
                        <a href="#branches" class="fse-button fse-button-primary animate-on-scroll">Xem phòng</a>
                        <a href="#about" class="fse-button fse-button-secondary animate-on-scroll" style="animation-delay: 0.1s;">Về Cocico</a>
                    </div>
                </div>
            </div>
            <div class="fse-hero-grain-overlay"></div>
        </section>

        <section class="fse-section fse-about-section" id="about">
          <div class="fse-group fse-about-content">
            <h2 class="fse-heading animate-on-scroll">Chào mừng đến với Cocico Homestay</h2>
            <p class="fse-paragraph animate-on-scroll">Cocico Homestay Sài Gòn tự hào mang đến những căn hộ dịch vụ cao cấp, được thiết kế tinh tế với sự pha trộn hài hòa giữa nét kiến trúc truyền thống và tiện nghi hiện đại. Mỗi chi nhánh là một tác phẩm nghệ thuật, nơi bạn có thể cảm nhận nhịp sống sôi động của thành phố mà vẫn giữ được sự riêng tư và thoải mái như ở nhà.</p>
            <div class="fse-columns fse-about-features">
              <div class="fse-column animate-on-scroll" style="animation-delay: 0s;">
                <i class="fas fa-bed fse-feature-icon"></i>
                <h3 class="fse-heading">Không gian độc đáo</h3>
                <p class="fse-paragraph">Mỗi phòng được thiết kế khác biệt, mang đậm dấu ấn riêng.</p>
              </div>
              <div class="fse-column animate-on-scroll" style="animation-delay: 0.1s;">
                <i class="fas fa-concierge-bell fse-feature-icon"></i>
                <h3 class="fse-heading">Dịch vụ tận tâm</h3>
                <p class="fse-paragraph">Đội ngũ chuyên nghiệp luôn sẵn sàng phục vụ 24/7.</p>
              </div>
              <div class="fse-column animate-on-scroll" style="animation-delay: 0.2s;">
                <i class="fas fa-map-marked-alt fse-feature-icon"></i>
                <h3 class="fse-heading">Vị trí đắc địa</h3>
                <p class="fse-paragraph">Gần các điểm tham quan và khu ẩm thực nổi tiếng.</p>
              </div>
            </div>
          </div>
        </section>

        <section class="fse-section fse-branch-section" id="branches">
            <div class="fse-group">
                <h2 class="fse-heading animate-on-scroll">Các Chi Nhánh Của Cocico Homestay</h2>
                <p class="fse-paragraph fse-section-subheading animate-on-scroll">Khám phá các địa điểm tuyệt vời của chúng tôi tại Sài Gòn.</p>
                <div class="fse-columns fse-branches-grid">
                    <div class="fse-column fse-branch-card animate-on-scroll" style="animation-delay: 0s;">
                        <img src="https://placehold.co/600x400/EEE/8B1A1A?text=Image+1" alt="Chi nhánh Quận 1" class="fse-image">
                        <div class="fse-card-content">
                            <h3 class="fse-heading">Chi nhánh Quận 1</h3>
                            <p class="fse-paragraph">Trung tâm sôi động, tiện lợi di chuyển tới các điểm du lịch.</p>
                            <a href="#" class="fse-button fse-button-secondary">Xem chi tiết</a>
                        </div>
                    </div>
                    <div class="fse-column fse-branch-card animate-on-scroll" style="animation-delay: 0.1s;">
                        <img src="https://placehold.co/600x400/EEE/8B1A1A?text=Image+2" alt="Chi nhánh Quận 3" class="fse-image">
                        <div class="fse-card-content">
                            <h3 class="fse-heading">Chi nhánh Quận 3</h3>
                            <p class="fse-paragraph">Khu vực yên tĩnh, gần các quán cà phê độc đáo và nhà hàng.</p>
                            <a href="#" class="fse-button fse-button-secondary">Xem chi tiết</a>
                        </div>
                    </div>
                    <div class="fse-column fse-branch-card animate-on-scroll" style="animation-delay: 0.2s;">
                        <img src="https://placehold.co/600x400/EEE/8B1A1A?text=3" alt="Chi nhánh Bình Thạnh" class="fse-image">
                        <div class="fse-card-content">
                            <h3 class="fse-heading">Chi nhánh Bình Thạnh</h3>
                            <p class="fse-paragraph">Thiết kế hiện đại, nhiều lựa chọn giải trí về đêm.</p>
                            <a href="#" class="fse-button fse-button-secondary">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="fse-section fse-rooms-section">
            <div class="fse-group">
                <h2 class="fse-heading animate-on-scroll">Phòng Nổi Bật</h2>
                <p class="fse-paragraph fse-section-subheading animate-on-scroll">Tuyển chọn những căn phòng được yêu thích nhất của chúng tôi.</p>
                <div class="fse-columns fse-rooms-grid">
                    <div class="fse-column fse-room-card animate-on-scroll" style="animation-delay: 0s;">
                        <img src="https://placehold.co/600x400/EEE/8B1A1A?text=Image+4" alt="Phòng Elegant Suite" class="fse-image">
                        <div class="fse-card-content">
                            <h3 class="fse-heading">Elegant Suite</h3>
                            <p class="fse-paragraph">Sự kết hợp hoàn hảo giữa sang trọng và tiện nghi hiện đại.</p>
                            <span class="fse-room-price">Từ 850.000 VNĐ/đêm</span>
                            <a href="#" class="fse-button fse-button-primary">Đặt ngay</a>
                        </div>
                    </div>
                    <div class="fse-column fse-room-card animate-on-scroll" style="animation-delay: 0.1s;">
                        <img src="https://placehold.co/600x400/EEE/8B1A1A?text=Image+5" alt="Phòng Urban Retreat" class="fse-image">
                        <div class="fse-card-content">
                            <h3 class="fse-heading">Urban Retreat</h3>
                            <p class="fse-paragraph">Thiết kế tối giản, không gian thoáng đãng giữa lòng thành phố.</p>
                            <span class="fse-room-price">Từ 700.000 VNĐ/đêm</span>
                            <a href="#" class="fse-button fse-button-primary">Đặt ngay</a>
                        </div>
                    </div>
                    <div class="fse-column fse-room-card animate-on-scroll" style="animation-delay: 0.2s;">
                        <img src="https://placehold.co/600x400/EEE/8B1A1A?text=Image+6" alt="Phòng Cozy Nook" class="fse-image">
                        <div class="fse-card-content">
                            <h3 class="fse-heading">Cozy Nook</h3>
                            <p class="fse-paragraph">Góc nhỏ ấm cúng, lý tưởng cho những chuyến đi một mình.</p>
                            <span class="fse-room-price">Từ 550.000 VNĐ/đêm</span>
                            <a href="#" class="fse-button fse-button-primary">Đặt ngay</a>
                        </div>
                    </div>
                </div>
                <div class="fse-cta-centered animate-on-scroll">
                  <a href="#" class="fse-button fse-button-secondary">Xem tất cả các phòng</a>
                </div>
            </div>
        </section>

        <section class="fse-section fse-testimonials-section">
            <div class="fse-group">
                <h2 class="fse-heading animate-on-scroll">Khách Hàng Nói Gì Về Chúng Tôi</h2>
                <p class="fse-paragraph fse-section-subheading animate-on-scroll">Những trải nghiệm đáng nhớ tại Cocico Homestay Sài Gòn.</p>
                <div class="fse-columns fse-testimonials-grid">
                    <div class="fse-column fse-testimonial-card animate-on-scroll" style="animation-delay: 0s;">
                        <div class="fse-testimonial-rating">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                        </div>
                        <p class="fse-paragraph">"Cocico thật sự vượt ngoài mong đợi! Phòng ốc sạch sẽ, đẹp mắt, tiện nghi đủ đầy. Vị trí rất thuận lợi để khám phá Sài Gòn. Chắc chắn sẽ quay lại!"</p>
                        <div class="fse-testimonial-author">
                            <img src="https://placehold.co/100x100/EEE/8B1A1A?text=Avatar+1" alt="Khách hàng 1" class="fse-image">
                            <span class="fse-author-name">Nguyễn Thị A</span>
                        </div>
                    </div>
                    <div class="fse-column fse-testimonial-card animate-on-scroll" style="animation-delay: 0.1s;">
                        <div class="fse-testimonial-rating">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                        </div>
                        <p class="fse-paragraph">"Dịch vụ tuyệt vời, nhân viên thân thiện và rất nhiệt tình. Tôi đặc biệt thích không gian yên bình và thiết kế độc đáo của căn phòng. Rất đáng tiền!"</p>
                        <div class="fse-testimonial-author">
                            <img src="https://placehold.co/100x100/EEE/8B1A1A?text=Avatar+2" alt="Khách hàng 2" class="fse-image">
                            <span class="fse-author-name">Lê Văn B</span>
                        </div>
                    </div>
                    <div class="fse-column fse-testimonial-card animate-on-scroll" style="animation-delay: 0.2s;">
                        <div class="fse-testimonial-rating">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                        </div>
                        <p class="fse-paragraph">"Lần đầu tiên trải nghiệm homestay và Cocico đã không làm tôi thất vọng. Mọi thứ từ thái độ phục vụ đến chất lượng phòng đều hoàn hảo. Khuyến khích mọi người!"</p>
                        <div class="fse-testimonial-author">
                            <img src="https://placehold.co/100x100/EEE/8B1A1A?text=Avatar+3" alt="Khách hàng 3" class="fse-image">
                            <span class="fse-author-name">Trần Thị C</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="fse-section fse-cta-banner">
          <div class="fse-cta-overlay"></div>
            <div class="fse-group fse-cta-content animate-on-scroll">
                <h2 class="fse-heading">Sẵn Sàng Cho Kỳ Nghỉ Đáng Nhớ Của Bạn?</h2>
                <p class="fse-paragraph">Khám phá ngay các chi nhánh và phòng của chúng tôi để đặt chỗ, bắt đầu hành trình tuyệt vời tại Sài Gòn.</p>
                <a href="#" class="fse-button fse-button-primary animate-on-scroll">Tìm Homestay ngay</a>
            </div>
            <div class="fse-cta-grain-overlay"></div>
        </section>
    </main>
</div>

<?php
get_footer();
