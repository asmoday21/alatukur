@extends('guru.guru_master')

@section('guru')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<div class="edit-profile-container">
  <!-- Animated Background -->
  <div class="animated-background">
    <div class="floating-shape shape-1"></div>
    <div class="floating-shape shape-2"></div>
    <div class="floating-shape shape-3"></div>
    <div class="floating-shape shape-4"></div>
  </div>

  <!-- Main Container -->
  <div class="main-wrapper">
    <!-- Header Section -->
    <div class="page-header">
      <div class="header-content">
        <div class="header-icon">
          <i class="fas fa-user-edit"></i>
        </div>
        <h1 class="header-title">Edit Profil Guru</h1>
        <p class="header-subtitle">Perbarui informasi profil Anda dengan mudah</p>
      </div>
      
      <!-- Back Button -->
      <a href="{{ route('guru.profile') }}" class="back-button">
        <div class="back-icon">
          <i class="fas fa-arrow-left"></i>
        </div>
        <span>Kembali</span>
        <div class="button-glow"></div>
      </a>
    </div>

    <!-- Main Card -->
    <div class="profile-edit-card">
      <form method="POST" action="{{ route('guru.store.profile') }}" enctype="multipart/form-data" class="edit-form">
        @csrf
        
        <!-- Image Upload Section -->
        <div class="image-upload-section">
          <div class="upload-container">
            <div class="image-preview-wrapper">
              <img id="showImage" 
                   src="{{ isset($editData->profile_image) ? url('upload/guru_images/'.$editData->profile_image) : url('upload/default_profile.jpg') }}" 
                   alt="Profile Preview"
                   class="profile-preview">
              <div class="image-overlay">
                <i class="fas fa-camera"></i>
                <span>Ubah Foto</span>
              </div>
              <div class="upload-indicator">
                <div class="upload-circle"></div>
              </div>
            </div>
            
            <input type="file" id="image" name="profile_image" class="file-input" accept="image/*">
            <label for="image" class="upload-label">
              <i class="fas fa-cloud-upload-alt"></i>
              <span class="upload-text">Pilih Gambar Baru</span>
              <span class="upload-hint">PNG, JPG hingga 2MB</span>
            </label>
          </div>
        </div>

        <!-- Form Fields -->
        <div class="form-fields">
          
          <!-- Name Field -->
          <div class="form-group-enhanced">
            <div class="input-group-modern">
              <div class="input-icon-wrapper">
                <i class="fas fa-user input-icon"></i>
              </div>
              <div class="input-field-wrapper">
                <input type="text" 
                       id="inputName" 
                       name="name" 
                       value="{{ $editData->name }}" 
                       class="modern-input" 
                       required>
                <label for="inputName" class="floating-label">Nama Lengkap</label>
                <div class="input-border-animation"></div>
              </div>
              <div class="validation-icon">
                <i class="fas fa-check-circle"></i>
              </div>
            </div>
            <div class="field-feedback">
              <span class="feedback-text">Nama harus minimal 2 karakter</span>
            </div>
          </div>

          <!-- Email Field -->
          <div class="form-group-enhanced">
            <div class="input-group-modern">
              <div class="input-icon-wrapper">
                <i class="fas fa-envelope input-icon"></i>
              </div>
              <div class="input-field-wrapper">
                <input type="email" 
                       id="inputEmail" 
                       name="email" 
                       value="{{ $editData->email }}" 
                       class="modern-input" 
                       required>
                <label for="inputEmail" class="floating-label">Alamat Email</label>
                <div class="input-border-animation"></div>
              </div>
              <div class="validation-icon">
                <i class="fas fa-check-circle"></i>
              </div>
            </div>
            <div class="field-feedback">
              <span class="feedback-text">Masukkan email yang valid</span>
            </div>
          </div>

          <!-- Password Field (Optional) -->
          <div class="form-group-enhanced">
            <div class="input-group-modern">
              <div class="input-icon-wrapper">
                <i class="fas fa-lock input-icon"></i>
              </div>
              <div class="input-field-wrapper">
                <input type="password" 
                       id="inputPassword" 
                       name="password" 
                       class="modern-input">
                <label for="inputPassword" class="floating-label">Password Baru (Opsional)</label>
                <div class="input-border-animation"></div>
                <button type="button" class="password-toggle" onclick="togglePassword()">
                  <i class="fas fa-eye"></i>
                </button>
              </div>
              <div class="validation-icon">
                <i class="fas fa-check-circle"></i>
              </div>
            </div>
            <div class="field-feedback">
              <span class="feedback-text">Kosongkan jika tidak ingin mengubah password</span>
            </div>
          </div>

        </div>

        <!-- Action Buttons -->
        <div class="action-section">
          <button type="button" class="btn-cancel" onclick="resetForm()">
            <i class="fas fa-undo"></i>
            <span>Reset</span>
            <div class="btn-ripple"></div>
          </button>
          
          <button type="submit" class="btn-save">
            <i class="fas fa-save"></i>
            <span>Simpan Perubahan</span>
            <div class="btn-ripple"></div>
            <div class="btn-glow"></div>
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<style>
/* Root Variables */
:root {
  --primary-gradient: linear-gradient(135deg, #02178a 0%, #c70b59 100%);
  --secondary-gradient: linear-gradient(135deg, #366096 0%, #020202 100%);
  --success-gradient: linear-gradient(135deg, #366696 0%, #000000 100%);
  --danger-gradient: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
  --text-dark: #2d3748;
  --text-light: #718096;
  --bg-light: #f7fafc;
  --white: #ffffff;
  --shadow-light: rgba(0, 0, 0, 0.1);
  --shadow-medium: rgba(0, 0, 0, 0.15);
  --shadow-heavy: rgba(0, 0, 0, 0.25);
  --border-radius: 20px;
  --transition: all 0.3s cubic-bezier(0.4, 0.0, 0.2, 1);
}

/* Container Styles */
.edit-profile-container {
  min-height: 100vh;
  background: var(--primary-gradient);
  position: relative;
  padding: 2rem;
  overflow: hidden;
}

/* Animated Background */
.animated-background {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 1;
}

.floating-shape {
  position: absolute;
  border-radius: 50%;
  background: rgba(255, 255, 255, 0.1);
  animation: floatShape 15s ease-in-out infinite;
}

.shape-1 {
  width: 100px;
  height: 100px;
  top: 10%;
  left: 10%;
  animation-delay: 0s;
}

.shape-2 {
  width: 150px;
  height: 150px;
  top: 20%;
  right: 15%;
  animation-delay: 3s;
}

.shape-3 {
  width: 80px;
  height: 80px;
  bottom: 30%;
  left: 20%;
  animation-delay: 6s;
}

.shape-4 {
  width: 120px;
  height: 120px;
  bottom: 15%;
  right: 10%;
  animation-delay: 9s;
}

@keyframes floatShape {
  0%, 100% { 
    transform: translateY(0px) rotate(0deg) scale(1); 
    opacity: 0.3;
  }
  33% { 
    transform: translateY(-30px) rotate(120deg) scale(1.1); 
    opacity: 0.6;
  }
  66% { 
    transform: translateY(15px) rotate(240deg) scale(0.9); 
    opacity: 0.4;
  }
}

/* Main Wrapper */
.main-wrapper {
  max-width: 900px;
  margin: 0 auto;
  position: relative;
  z-index: 2;
}

/* Page Header */
.page-header {
  text-align: center;
  margin-bottom: 3rem;
  position: relative;
  animation: headerSlide 0.8s ease-out;
}

@keyframes headerSlide {
  from {
    opacity: 0;
    transform: translateY(-30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.header-content {
  margin-bottom: 2rem;
}

.header-icon {
  width: 80px;
  height: 80px;
  background: rgba(255, 255, 255, 0.2);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0 auto 1rem;
  backdrop-filter: blur(10px);
  border: 2px solid rgba(255, 255, 255, 0.3);
  animation: iconPulse 2s ease-in-out infinite;
}

@keyframes iconPulse {
  0%, 100% { transform: scale(1); }
  50% { transform: scale(1.05); }
}

.header-icon i {
  font-size: 2rem;
  color: var(--white);
}

.header-title {
  font-size: 2.5rem;
  font-weight: 700;
  color: var(--white);
  margin: 0 0 0.5rem 0;
  text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
}

.header-subtitle {
  font-size: 1.1rem;
  color: rgba(255, 255, 255, 0.8);
  margin: 0;
}

.back-button {
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
  background: rgba(255, 255, 255, 0.2);
  color: var(--white);
  padding: 0.75rem 1.5rem;
  border-radius: 50px;
  text-decoration: none;
  font-weight: 600;
  backdrop-filter: blur(10px);
  border: 2px solid rgba(255, 255, 255, 0.3);
  transition: var(--transition);
  position: relative;
  overflow: hidden;
}

.back-button:hover {
  background: rgba(255, 255, 255, 0.3);
  color: var(--white);
  transform: translateY(-2px);
}

.back-icon {
  transition: var(--transition);
}

.back-button:hover .back-icon {
  transform: translateX(-3px);
}

.button-glow {
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
  transition: var(--transition);
}

.back-button:hover .button-glow {
  left: 100%;
}

/* Main Card */
.profile-edit-card {
  background: var(--white);
  border-radius: var(--border-radius);
  box-shadow: 0 25px 50px var(--shadow-heavy);
  overflow: hidden;
  animation: cardEntrance 0.8s ease-out 0.2s both;
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

/* Image Upload Section */
.image-upload-section {
  background: linear-gradient(135deg, #f8f9fa, #e9ecef);
  padding: 3rem 2rem;
  text-align: center;
  position: relative;
}

.upload-container {
  position: relative;
  display: inline-block;
}

.image-preview-wrapper {
  position: relative;
  width: 180px;
  height: 180px;
  margin: 0 auto 2rem;
  cursor: pointer;
  transition: var(--transition);
}

.image-preview-wrapper:hover {
  transform: scale(1.05);
}

.profile-preview {
  width: 100%;
  height: 100%;
  border-radius: 50%;
  object-fit: cover;
  border: 6px solid var(--white);
  box-shadow: 0 15px 35px var(--shadow-medium);
  transition: var(--transition);
}

.image-overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.7);
  border-radius: 50%;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  opacity: 0;
  transition: var(--transition);
  color: var(--white);
}

.image-preview-wrapper:hover .image-overlay {
  opacity: 1;
}

.image-overlay i {
  font-size: 2rem;
  margin-bottom: 0.5rem;
}

.upload-indicator {
  position: absolute;
  bottom: 10px;
  right: 10px;
  width: 40px;
  height: 40px;
  background: var(--success-gradient);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  box-shadow: 0 5px 15px rgba(79, 172, 254, 0.4);
  opacity: 0;
  transform: scale(0);
  transition: var(--transition);
}

.upload-indicator.active {
  opacity: 1;
  transform: scale(1);
}

.upload-circle {
  width: 20px;
  height: 20px;
  border: 2px solid var(--white);
  border-top: 2px solid transparent;
  border-radius: 50%;
  animation: spin 1s linear infinite;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

.file-input {
  display: none;
}

.upload-label {
  display: inline-flex;
  flex-direction: column;
  align-items: center;
  gap: 0.5rem;
  background: var(--primary-gradient);
  color: var(--white);
  padding: 1rem 2rem;
  border-radius: 50px;
  cursor: pointer;
  font-weight: 600;
  transition: var(--transition);
  box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
}

.upload-label:hover {
  transform: translateY(-2px);
  box-shadow: 0 10px 25px rgba(102, 126, 234, 0.6);
  color: var(--white);
}

.upload-label i {
  font-size: 1.5rem;
}

.upload-text {
  font-size: 1rem;
}

.upload-hint {
  font-size: 0.8rem;
  opacity: 0.8;
}

/* Form Fields */
.form-fields {
  padding: 2rem;
}

.form-group-enhanced {
  margin-bottom: 2rem;
  animation: fieldSlide 0.6s ease-out both;
}

.form-group-enhanced:nth-child(1) { animation-delay: 0.1s; }
.form-group-enhanced:nth-child(2) { animation-delay: 0.2s; }
.form-group-enhanced:nth-child(3) { animation-delay: 0.3s; }

@keyframes fieldSlide {
  from {
    opacity: 0;
    transform: translateX(-20px);
  }
  to {
    opacity: 1;
    transform: translateX(0);
  }
}

.input-group-modern {
  position: relative;
  display: flex;
  align-items: center;
  background: var(--bg-light);
  border-radius: 15px;
  padding: 1rem;
  transition: var(--transition);
  border: 2px solid transparent;
}

.input-group-modern:focus-within {
  background: var(--white);
  border-color: #667eea;
  box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
  transform: translateY(-2px);
}

.input-icon-wrapper {
  width: 50px;
  height: 50px;
  background: var(--primary-gradient);
  border-radius: 12px;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-right: 1rem;
  transition: var(--transition);
}

.input-icon {
  color: var(--white);
  font-size: 1.2rem;
}

.input-field-wrapper {
  flex: 1;
  position: relative;
}

.modern-input {
  width: 100%;
  border: none;
  background: transparent;
  font-size: 1.1rem;
  color: var(--text-dark);
  font-weight: 600;
  outline: none;
  padding: 1rem 0 0.5rem;
  transition: var(--transition);
}

.floating-label {
  position: absolute;
  top: 1rem;
  left: 0;
  font-size: 1rem;
  color: var(--text-light);
  pointer-events: none;
  transition: var(--transition);
  font-weight: 500;
}

.modern-input:focus + .floating-label,
.modern-input:not(:placeholder-shown) + .floating-label {
  top: 0;
  font-size: 0.8rem;
  color: #667eea;
  font-weight: 600;
}

.input-border-animation {
  position: absolute;
  bottom: 0;
  left: 0;
  width: 0;
  height: 2px;
  background: var(--primary-gradient);
  transition: var(--transition);
  border-radius: 2px;
}

.input-group-modern:focus-within .input-border-animation {
  width: 100%;
}

.password-toggle {
  position: absolute;
  right: 0;
  top: 50%;
  transform: translateY(-50%);
  background: none;
  border: none;
  color: var(--text-light);
  cursor: pointer;
  padding: 0.5rem;
  border-radius: 8px;
  transition: var(--transition);
}

.password-toggle:hover {
  background: rgba(102, 126, 234, 0.1);
  color: #667eea;
}

.validation-icon {
  width: 40px;
  height: 40px;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-left: 1rem;
  opacity: 0;
  transition: var(--transition);
}

.input-group-modern.valid .validation-icon {
  opacity: 1;
  color: #10b981;
}

.field-feedback {
  margin-top: 0.5rem;
  padding-left: 4rem;
}

.feedback-text {
  font-size: 0.85rem;
  color: var(--text-light);
  transition: var(--transition);
}

.input-group-modern.error .feedback-text {
  color: #ef4444;
}

/* Action Section */
.action-section {
  display: flex;
  gap: 1rem;
  justify-content: center;
  padding: 2rem;
  background: var(--bg-light);
  animation: actionSlide 0.6s ease-out 0.4s both;
}

@keyframes actionSlide {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.btn-cancel,
.btn-save {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  padding: 1rem 2rem;
  border-radius: 15px;
  border: none;
  font-weight: 600;
  font-size: 1rem;
  cursor: pointer;
  transition: var(--transition);
  position: relative;
  overflow: hidden;
}

.btn-cancel {
  background: var(--white);
  color: var(--text-dark);
  border: 2px solid #e5e7eb;
  box-shadow: 0 5px 15px var(--shadow-light);
}

.btn-cancel:hover {
  background: #f9fafb;
  transform: translateY(-2px);
  box-shadow: 0 10px 25px var(--shadow-medium);
}

.btn-save {
  background: var(--success-gradient);
  color: var(--white);
  box-shadow: 0 5px 15px rgba(79, 172, 254, 0.4);
  position: relative;
}

.btn-save:hover {
  transform: translateY(-2px);
  box-shadow: 0 10px 25px rgba(79, 172, 254, 0.6);
}

.btn-glow {
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
  transition: var(--transition);
}

.btn-save:hover .btn-glow {
  left: 100%;
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

.btn-cancel:active .btn-ripple,
.btn-save:active .btn-ripple {
  width: 300px;
  height: 300px;
}

/* Progress Indicator */
.progress-indicator {
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 1.5rem;
  background: var(--white);
  animation: progressSlide 0.6s ease-out 0.5s both;
}

@keyframes progressSlide {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.progress-step {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 0.5rem;
  color: var(--text-light);
  transition: var(--transition);
}

.progress-step.active {
  color: #667eea;
}

.progress-step i {
  width: 40px;
  height: 40px;
  border: 2px solid currentColor;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: var(--transition);
}

.progress-step.active i {
  background: #667eea;
  color: var(--white);
}

.progress-line {
  width: 100px;
  height: 2px;
  background: #e5e7eb;
  margin: 0 2rem;
  position: relative;
}

.progress-line::after {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 0%;
  height: 100%;
  background: #667eea;
  transition: width 1s ease-in-out;
}

/* Responsive Design */
@media (max-width: 768px) {
  .edit-profile-container {
    padding: 1rem;
  }
  
  .header-title {
    font-size: 2rem;
  }
  
  .action-section {
    flex-direction: column;
  }
  
  .btn-cancel,
  .btn-save {
    width: 100%;
    justify-content: center;
  }
  
  .form-fields {
    padding: 1rem;
  }
}

/* Loading States */
.loading .upload-indicator {
  opacity: 1;
  transform: scale(1);
}

.form-submitting .btn-save {
  pointer-events: none;
  opacity: 0.7;
}

.form-submitting .btn-save i {
  animation: spin 1s linear infinite;
}

/* Success Animation */
@keyframes successPulse {
  0% { transform: scale(1); }
  50% { transform: scale(1.1); }
  100% { transform: scale(1); }
}

.success-animation {
  animation: successPulse 0.5s ease-in-out;
}
</style>

<script>
$(document).ready(function(){
  // Image Preview with Loading Animation
  $('#image').change(function(e){
    const file = e.target.files[0];
    if (file) {
      // Show loading indicator
      $('.upload-indicator').addClass('active');
      
      const reader = new FileReader();
      reader.onload = function(e){
        setTimeout(() => {
          $('#showImage').attr('src', e.target.result);
          $('.upload-indicator').removeClass('active');
          $('.image-preview-wrapper').addClass('success-animation');
          
          setTimeout(() => {
            $('.image-preview-wrapper').removeClass('success-animation');
          }, 500);
        }, 500);
      }
      reader.readAsDataURL(file);
    }
  });

  // Real-time Validation
  $('.modern-input').on('input blur', function() {
    const input = $(this);
    const group = input.closest('.input-group-modern');
    const value = input.val().trim();
    
    // Remove previous states
    group.removeClass('valid error');
    
    if (value) {
      if (input.attr('type') === 'email') {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (emailRegex.test(value)) {
          group.addClass('valid');
        } else {
          group.addClass('error');
        }
      } else if (input.attr('name') === 'name') {
        if (value.length >= 2) {
          group.addClass('valid');
        } else {
          group.addClass('error');
        }
      } else {
        group.addClass('valid');
      }
    }
  });

  // Form Submission with Animation
  $('.edit-form').on('submit', function(e) {
    e.preventDefault();
    
    // Add loading state
    $('body').addClass('form-submitting');
    $('.btn-save span').text('Menyimpan...');
    
    // Simulate form submission (replace with actual submission)
    setTimeout(() => {
      // Progress animation
      $('.progress-line::after').css('width', '100%');
      $('.progress-step').last().addClass('active');
      
      setTimeout(() => {
        // Actually submit the form
        this.submit();
      }, 1000);
    }, 1000);
  });

  // Initial validation check
  $('.modern-input').each(function() {
    if ($(this).val().trim()) {
      $(this).trigger('blur');
    }
  });
});

// Toggle Password Visibility
function togglePassword() {
  const passwordInput = document.getElementById('inputPassword');
  const toggleIcon = document.querySelector('.password-toggle i');
  
  if (passwordInput.type === 'password') {
    passwordInput.type = 'text';
    toggleIcon.classList.remove('fa-eye');
    toggleIcon.classList.add('fa-eye-slash');
  } else {
    passwordInput.type = 'password';
    toggleIcon.classList.remove('fa-eye-slash');
    toggleIcon.classList.add('fa-eye');
  }
}
// Reset Form
function resetForm() {
  $('.edit-form')[0].reset();
  $('#showImage').attr('src', '{{ isset($editData->profile_image) ? url('upload/guru_images/'.$editData->profile_image) : url('upload/default_profile.jpg') }}');
  $('.modern-input').trigger('blur');
}
</script>
@endsection