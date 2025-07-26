@extends('guru.guru_master')

@section('guru')
<div class="profile-container">
  <!-- Background Pattern -->
  <div class="background-pattern"></div>
  
  <!-- Main Profile Card -->
  <div class="profile-card">
    <!-- Header Section with Gradient -->
    <div class="profile-header">
      <div class="header-content">
        <div class="profile-badge">
          <i class="fas fa-chalkboard-teacher"></i>
        </div>
        <h1 class="profile-title">Profil Guru</h1>
        <div class="header-decoration"></div>
      </div>
    </div>

    <!-- Profile Photo Section -->
    <div class="photo-section">
      <div class="photo-container">
        <div class="photo-frame">
          <img src="{{ isset($editData->profile_image) ? url('upload/guru_images/' . $editData->profile_image) : url('upload/admin_images.jpg') }}" 
               alt="Profile Photo" 
               class="profile-photo"
               id="profilePhoto">
          <div class="photo-overlay">
            <i class="fas fa-camera"></i>
          </div>
        </div>
        <div class="photo-glow"></div>
      </div>
    </div>

    <!-- Content Section -->
    <div class="profile-content">
      <form class="profile-form">
        
        <!-- Name Field -->
        <div class="form-group-modern">
          <div class="input-container">
            <div class="input-icon">
              <i class="fas fa-user"></i>
            </div>
            <div class="input-wrapper">
              <label for="name" class="floating-label">Nama Lengkap</label>
              <input type="text" 
                     id="name" 
                     class="modern-input" 
                     value="{{ $editData->name }}" 
                     readonly>
              <div class="input-border"></div>
            </div>
            <div class="input-animation"></div>
          </div>
        </div>

        <!-- Email Field -->
        <div class="form-group-modern">
          <div class="input-container">
            <div class="input-icon">
              <i class="fas fa-envelope"></i>
            </div>
            <div class="input-wrapper">
              <label for="email" class="floating-label">Email Address</label>
              <input type="email" 
                     id="email" 
                     class="modern-input" 
                     value="{{ $editData->email }}" 
                     readonly>
              <div class="input-border"></div>
            </div>
            <div class="input-animation"></div>
          </div>
        </div>

        <!-- Action Buttons -->
        <div class="action-section">
          <a href="{{ route('guru.edit.profile') }}" class="btn-primary-modern">
            <span class="btn-text">Edit Profil</span>
            <div class="btn-icon">
              <i class="fas fa-edit"></i>
            </div>
            <div class="btn-ripple"></div>
          </a>
          <button type="button" class="btn-secondary-modern" onclick="shareProfile()">
            <span class="btn-text">Bagikan</span>
            <div class="btn-icon">
              <i class="fas fa-share-alt"></i>
            </div>
            <div class="btn-ripple"></div>
          </button>
        </div>

      </form>
    </div>
  </div>

  <!-- Floating Elements -->
  <div class="floating-element element-1"></div>
  <div class="floating-element element-2"></div>
  <div class="floating-element element-3"></div>
</div>

<style>
/* Root Variables */
:root {
  --primary-color: #111011;
  --secondary-color: #044cb1;
  --accent-color: #366696;
  --text-dark: #0a141e;
  --text-light: #718096;
  --bg-light: #045c771e;
  --white: #ffffff;
  --shadow-light: rgba(0, 0, 0, 0.1);
  --shadow-medium: rgba(0, 0, 0, 0.15);
  --shadow-heavy: rgba(0, 0, 0, 0.25);
  --border-radius: 20px;
  --transition: all 0.3s cubic-bezier(0.4, 0.0, 0.2, 1);
}

/* Container Styles */
.profile-container {
  min-height: 100vh;
  background: linear-gradient(135deg, #000000 0%, #366696 100%);
  position: relative;
  padding: 2rem;
  overflow: hidden;
}

.background-pattern {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-image: 
    radial-gradient(circle at 20% 50%, rgba(255, 255, 255, 0.1) 1px, transparent 1px),
    radial-gradient(circle at 80% 50%, rgba(255, 255, 255, 0.1) 1px, transparent 1px);
  background-size: 50px 50px;
  animation: backgroundFloat 20s ease-in-out infinite;
}

@keyframes backgroundFloat {
  0%, 100% { transform: translateY(0px) rotate(0deg); }
  50% { transform: translateY(-20px) rotate(2deg); }
}

/* Main Card */
.profile-card {
  max-width: 800px;
  margin: 0 auto;
  background: var(--white);
  border-radius: var(--border-radius);
  box-shadow: 0 25px 50px var(--shadow-heavy);
  position: relative;
  overflow: hidden;
  transform: translateY(0);
  transition: var(--transition);
  animation: cardEntrance 0.8s ease-out;
}

@keyframes cardEntrance {
  from {
    opacity: 0;
    transform: translateY(30px) scale(0.95);
  }
  to {
    opacity: 1;
    transform: translateY(0) scale(1);
  }
}

.profile-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 35px 70px var(--shadow-heavy);
}

/* Header Section */
.profile-header {
  background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
  padding: 3rem 2rem 2rem;
  position: relative;
  overflow: hidden;
}

.profile-header::before {
  content: '';
  position: absolute;
  top: -50%;
  left: -50%;
  width: 200%;
  height: 200%;
  background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.1), transparent);
  animation: shimmer 3s ease-in-out infinite;
}

@keyframes shimmer {
  0% { transform: translateX(-100%) translateY(-100%) rotate(45deg); }
  100% { transform: translateX(100%) translateY(100%) rotate(45deg); }
}

.header-content {
  text-align: center;
  position: relative;
  z-index: 2;
}

.profile-badge {
  width: 80px;
  height: 80px;
  background: rgba(255, 255, 255, 0.2);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0 auto 1.5rem;
  backdrop-filter: blur(10px);
  border: 2px solid rgba(255, 255, 255, 0.3);
  animation: badgePulse 2s ease-in-out infinite;
}

@keyframes badgePulse {
  0%, 100% { transform: scale(1); }
  50% { transform: scale(1.05); }
}

.profile-badge i {
  font-size: 2rem;
  color: var(--white);
}

.profile-title {
  color: var(--white);
  font-size: 2.5rem;
  font-weight: 700;
  margin: 0;
  text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
  animation: titleSlide 0.8s ease-out 0.2s both;
}

@keyframes titleSlide {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.header-decoration {
  width: 100px;
  height: 4px;
  background: linear-gradient(90deg, transparent, var(--white), transparent);
  margin: 1rem auto 0;
  border-radius: 2px;
  animation: decorationGlow 2s ease-in-out infinite alternate;
}

@keyframes decorationGlow {
  from { opacity: 0.5; }
  to { opacity: 1; }
}

/* Photo Section */
.photo-section {
  padding: 0 2rem;
  position: relative;
  z-index: 3;
  margin-top: -60px;
}

.photo-container {
  display: flex;
  justify-content: center;
  position: relative;
}

.photo-frame {
  position: relative;
  width: 160px;
  height: 160px;
  border-radius: 50%;
  background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
  padding: 6px;
  cursor: pointer;
  transition: var(--transition);
  animation: photoEntrance 0.8s ease-out 0.4s both;
}

@keyframes photoEntrance {
  from {
    opacity: 0;
    transform: scale(0.8) rotate(-10deg);
  }
  to {
    opacity: 1;
    transform: scale(1) rotate(0deg);
  }
}

.photo-frame:hover {
  transform: scale(1.05) rotate(2deg);
}

.profile-photo {
  width: 100%;
  height: 100%;
  border-radius: 50%;
  object-fit: cover;
  transition: var(--transition);
  border: 4px solid var(--white);
}

.photo-overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.5);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  opacity: 0;
  transition: var(--transition);
}

.photo-frame:hover .photo-overlay {
  opacity: 1;
}

.photo-overlay i {
  color: var(--white);
  font-size: 1.5rem;
}

.photo-glow {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 180px;
  height: 180px;
  border-radius: 50%;
  background: radial-gradient(circle, rgba(102, 126, 234, 0.3), transparent);
  opacity: 0;
  animation: glowPulse 3s ease-in-out infinite;
}

@keyframes glowPulse {
  0%, 100% { opacity: 0; transform: translate(-50%, -50%) scale(1); }
  50% { opacity: 1; transform: translate(-50%, -50%) scale(1.1); }
}

/* Content Section */
.profile-content {
  padding: 3rem 2rem 2rem;
}

/* Modern Form Groups */
.form-group-modern {
  margin-bottom: 2.5rem;
  animation: inputSlide 0.8s ease-out both;
}

.form-group-modern:nth-child(1) { animation-delay: 0.6s; }
.form-group-modern:nth-child(2) { animation-delay: 0.8s; }

@keyframes inputSlide {
  from {
    opacity: 0;
    transform: translateX(-30px);
  }
  to {
    opacity: 1;
    transform: translateX(0);
  }
}

.input-container {
  position: relative;
  display: flex;
  align-items: center;
  background: var(--bg-light);
  border-radius: 15px;
  padding: 1rem;
  transition: var(--transition);
  border: 2px solid transparent;
}

.input-container:hover {
  background: var(--white);
  box-shadow: 0 5px 15px var(--shadow-light);
  border-color: var(--primary-color);
}

.input-icon {
  width: 50px;
  height: 50px;
  background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
  border-radius: 12px;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-right: 1rem;
  transition: var(--transition);
}

.input-icon i {
  color: var(--white);
  font-size: 1.2rem;
}

.input-wrapper {
  flex: 1;
  position: relative;
}

.floating-label {
  font-size: 0.9rem;
  color: var(--text-light);
  margin-bottom: 0.5rem;
  display: block;
  font-weight: 500;
  transition: var(--transition);
}

.modern-input {
  width: 100%;
  border: none;
  background: transparent;
  font-size: 1.1rem;
  color: var(--text-dark);
  font-weight: 600;
  outline: none;
  padding: 0.5rem 0;
  transition: var(--transition);
}

.input-border {
  height: 2px;
  background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
  transform: scaleX(0);
  transition: var(--transition);
  margin-top: 0.5rem;
  border-radius: 2px;
}

.input-container:hover .input-border {
  transform: scaleX(1);
}

.input-animation {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  border-radius: 15px;
  background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
  opacity: 0;
  z-index: -1;
  transition: var(--transition);
}

.input-container:focus-within .input-animation {
  opacity: 0.1;
}

/* Stats Section */
.stats-container {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
  gap: 1.5rem;
  margin: 3rem 0;
  animation: statsSlide 0.8s ease-out 1s both;
}

@keyframes statsSlide {
  from {
    opacity: 0;
    transform: translateY(30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.stat-item {
  background: linear-gradient(135deg, var(--white), var(--bg-light));
  padding: 2rem 1.5rem;
  border-radius: 20px;
  display: flex;
  align-items: center;
  gap: 1rem;
  box-shadow: 0 5px 15px var(--shadow-light);
  transition: var(--transition);
  cursor: pointer;
  position: relative;
  overflow: hidden;
}

.stat-item::before {
  content: '';
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
  transition: var(--transition);
}

.stat-item:hover::before {
  left: 100%;
}

.stat-item:hover {
  transform: translateY(-5px);
  box-shadow: 0 15px 30px var(--shadow-medium);
}

.stat-icon {
  width: 60px;
  height: 60px;
  background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
  border-radius: 15px;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: var(--transition);
}

.stat-icon i {
  color: var(--white);
  font-size: 1.5rem;
}

.stat-content {
  flex: 1;
}

.stat-number {
  font-size: 2rem;
  font-weight: 700;
  color: var(--text-dark);
  margin-bottom: 0.25rem;
}

.stat-label {
  font-size: 0.9rem;
  color: var(--text-light);
  font-weight: 500;
}

/* Action Buttons */
.action-section {
  display: flex;
  gap: 1rem;
  justify-content: center;
  margin-top: 3rem;
  animation: buttonsSlide 0.8s ease-out 1.2s both;
}

@keyframes buttonsSlide {
  from {
    opacity: 0;
    transform: translateY(30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.btn-primary-modern,
.btn-secondary-modern {
  padding: 1rem 2rem;
  border-radius: 15px;
  border: none;
  font-weight: 600;
  font-size: 1rem;
  cursor: pointer;
  transition: var(--transition);
  position: relative;
  overflow: hidden;
  display: flex;
  align-items: center;
  gap: 0.5rem;
  text-decoration: none;
  z-index: 1;
}

.btn-primary-modern {
  background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
  color: var(--white);
  box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
}

.btn-secondary-modern {
  background: var(--white);
  color: var(--primary-color);
  border: 2px solid var(--primary-color);
  box-shadow: 0 5px 15px var(--shadow-light);
}

.btn-primary-modern:hover {
  transform: translateY(-2px);
  box-shadow: 0 10px 25px rgba(102, 126, 234, 0.6);
}

.btn-secondary-modern:hover {
  background: var(--primary-color);
  color: var(--white);
  transform: translateY(-2px);
}

.btn-text {
  position: relative;
  z-index: 2;
}

.btn-icon {
  transition: var(--transition);
}

.btn-ripple {
  position: absolute;
  top: 50%;
  left: 50%;
  width: 0;
  height: 0;
  border-radius: 50%;
  background: rgba(255, 255, 255, 0.3);
  transform: translate(-50%, -50%);
  transition: width 0.3s, height 0.3s;
}

.btn-primary-modern:active .btn-ripple,
.btn-secondary-modern:active .btn-ripple {
  width: 300px;
  height: 300px;
}

/* Floating Elements */
.floating-element {
  position: absolute;
  border-radius: 50%;
  background: rgba(255, 255, 255, 0.1);
  animation: float 6s ease-in-out infinite;
}

.element-1 {
  width: 80px;
  height: 80px;
  top: 10%;
  left: 10%;
  animation-delay: 0s;
}

.element-2 {
  width: 120px;
  height: 120px;
  top: 20%;
  right: 10%;
  animation-delay: 2s;
}

.element-3 {
  width: 100px;
  height: 100px;
  bottom: 20%;
  left: 15%;
  animation-delay: 4s;
}

@keyframes float {
  0%, 100% { transform: translateY(0px) rotate(0deg); }
  50% { transform: translateY(-20px) rotate(180deg); }
}

/* Responsive Design */
@media (max-width: 768px) {
  .profile-container {
    padding: 1rem;
  }
  
  .profile-title {
    font-size: 2rem;
  }
  
  .stats-container {
    grid-template-columns: 1fr;
  }
  
  .action-section {
    flex-direction: column;
  }
  
  .btn-primary-modern,
  .btn-secondary-modern {
    width: 100%;
    justify-content: center;
  }
}

/* Accessibility */
@media (prefers-reduced-motion: reduce) {
  *,
  *::before,
  *::after {
    animation-duration: 0.01ms !important;
    animation-iteration-count: 1 !important;
    transition-duration: 0.01ms !important;
  }
}
</style>

<script>
// Counter Animation for Stats
function animateCounters() {
  const counters = document.querySelectorAll('.stat-number');
  
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const counter = entry.target;
        const target = parseInt(counter.getAttribute('data-count'));
        const duration = 2000;
        const step = target / (duration / 16);
        let current = 0;
        
        const timer = setInterval(() => {
          current += step;
          counter.textContent = Math.floor(current);
          
          if (current >= target) {
            counter.textContent = target;
            clearInterval(timer);
          }
        }, 16);
        
        observer.unobserve(counter);
      }
    });
  });
  
  counters.forEach(counter => observer.observe(counter));
}

// Profile Photo Click Handler
document.addEventListener('DOMContentLoaded', function() {
  animateCounters();
  
  const profilePhoto = document.getElementById('profilePhoto');
  if (profilePhoto) {
    profilePhoto.addEventListener('click', function() {
      this.style.transform = 'scale(1.1) rotate(5deg)';
      setTimeout(() => {
        this.style.transform = 'scale(1) rotate(0deg)';
      }, 200);
    });
  }
});

// Share Profile Function
function shareProfile() {
  if (navigator.share) {
    navigator.share({
      title: 'Profil Guru',
      text: 'Lihat profil guru kami',
      url: window.location.href
    });
  } else {
    // Fallback for browsers that don't support Web Share API
    const url = window.location.href;
    navigator.clipboard.writeText(url).then(() => {
      alert('Link profil telah disalin ke clipboard!');
    });
  }
}

// Add smooth scrolling and enhanced interactions
document.querySelectorAll('.modern-input').forEach(input => {
  input.addEventListener('focus', function() {
    this.parentElement.parentElement.style.transform = 'scale(1.02)';
  });
  
  input.addEventListener('blur', function() {
    this.parentElement.parentElement.style.transform = 'scale(1)';
  });
});

// Add button click effects
document.querySelectorAll('.btn-primary-modern, .btn-secondary-modern').forEach(button => {
  button.addEventListener('click', function(e) {
    const rect = this.getBoundingClientRect();
    const x = e.clientX - rect.left;
    const y = e.clientY - rect.top;
    
    const ripple = this.querySelector('.btn-ripple');
    ripple.style.left = x + 'px';
    ripple.style.top = y + 'px';
    ripple.style.transform = 'translate(-50%, -50%)';
  });
});
</script>
@endsection