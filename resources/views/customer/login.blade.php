<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>FreeDoctor Login & Register</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap');

    /* Reset and base */
    * {
      box-sizing: border-box;
    }
    body, html {
      margin: 0;
      height: 100%;
      font-family: 'Inter', sans-serif;
      background: linear-gradient(90deg, #5a4de8, #7a5de8);
      display: flex;
      justify-content: center;
      align-items: center;
      color: white;
    }

    /* Container */
    .login-card {
      background: rgba(33, 27, 69, 0.9);
      border-radius: 12px;
      width: 360px;
      padding: 32px 24px 40px;
      box-shadow: 0 8px 24px rgba(90, 77, 232, 0.5);
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    /* Icon */
    .icon-circle {
      background: #f5c518;
      width: 56px;
      height: 56px;
      border-radius: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
      margin-bottom: 16px;
    }
    .icon-circle svg {
      width: 28px;
      height: 28px;
      fill: #2a1a00;
    }

    /* Title and subtitle */
    .title {
      font-weight: 700;
      font-size: 1.5rem;
      margin-bottom: 4px;
      user-select: none;
    }
    .subtitle {
      font-weight: 400;
      font-size: 0.875rem;
      color: #cfcce0;
      margin-bottom: 24px;
      user-select: none;
      text-align: center;
    }

    /* Tabs */
    .tabs {
      display: flex;
      background: #1f1a3f;
      border-radius: 8px;
      overflow: hidden;
      margin-bottom: 24px;
      width: 100%;
      user-select: none;
    }
    .tab {
      flex: 1;
      text-align: center;
      padding: 8px 0;
      cursor: pointer;
      font-weight: 600;
      font-size: 0.875rem;
      color: #b0aee0;
      transition: background 0.3s, color 0.3s;
      border: none;
      outline: none;
    }
    .tab.active {
      background: linear-gradient(90deg, #7a5de8, #5a4de8);
      color: white;
    }

    /* Form */
    form {
      width: 100%;
      display: none;
      flex-direction: column;
      gap: 16px;
    }
    form.active {
      display: flex;
    }

    label {
      display: flex;
      align-items: center;
      gap: 8px;
      font-size: 0.875rem;
      font-weight: 500;
      color: #b0aee0;
      user-select: none;
    }
    label svg {
      width: 16px;
      height: 16px;
      fill: #b0aee0;
      flex-shrink: 0;
    }

    input[type="email"],
    input[type="password"],
    input[type="text"],
    input[type="tel"] {
      width: 100%;
      padding: 10px 12px;
      border-radius: 8px;
      border: none;
      background: #2a254f;
      color: white;
      font-size: 1rem;
      outline: none;
      transition: background 0.3s;
    }
    input[type="email"]::placeholder,
    input[type="password"]::placeholder,
    input[type="text"]::placeholder,
    input[type="tel"]::placeholder {
      color: #6b658f;
    }
    input[type="email"]:focus,
    input[type="password"]:focus,
    input[type="text"]:focus,
    input[type="tel"]:focus {
      background: #3a3570;
    }

    /* Submit button */
    button[type="submit"] {
      margin-top: 8px;
      background: linear-gradient(90deg, #7a5de8, #5a4de8);
      border: none;
      border-radius: 8px;
      color: white;
      font-weight: 600;
      font-size: 1rem;
      padding: 12px;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      user-select: none;
      transition: background 0.3s;
    }
    button[type="submit"]:hover {
      background: linear-gradient(90deg, #5a4de8, #7a5de8);
    }
    button svg {
      width: 18px;
      height: 18px;
      fill: white;
      flex-shrink: 0;
    }

    /* Error message */
    .error-message {
      color: #ff6b6b;
      font-size: 0.875rem;
      font-weight: 600;
      user-select: none;
    }
  </style>
</head>
<body>
  <div class="login-card" role="main" aria-label="Login and Registration form">
    <div class="icon-circle" aria-hidden="true">
      <!-- Doctor icon -->
      <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
        <path d="M12 2a3 3 0 0 0-3 3v2H7a2 2 0 0 0-2 2v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2v-7a2 2 0 0 0-2-2h-2V5a3 3 0 0 0-3-3zm-1 5V5a1 1 0 1 1 2 0v2h-2zm-3 3h8v5H8v-5z"/>
      </svg>
    </div>
    <h1 class="title">Welcome to FreeDoctor</h1>
    <p class="subtitle">Sign in to your account or create a new one.</p>

    <div class="tabs" role="tablist" aria-label="Sign in or Sign up">
      <button class="tab active" role="tab" aria-selected="true" aria-controls="signin-panel" id="signin-tab" tabindex="0">Sign In</button>
      <button class="tab" role="tab" aria-selected="false" aria-controls="signup-panel" id="signup-tab" tabindex="-1">Sign Up</button>
    </div>

    <form id="signin-panel" class="active" role="tabpanel" aria-labelledby="signin-tab" aria-hidden="false" novalidate>
      <label for="email-signin">
        <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
          <path d="M20 4H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2zm0 2l-8 5-8-5V6l8 5 8-5v2z"/>
        </svg>
        Email
      </label>
      <input type="email" id="email-signin" name="email-signin" placeholder="you@example.com" required autocomplete="email" />

      <label for="password-signin">
        <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
          <path d="M12 17a2 2 0 0 0 2-2v-3a2 2 0 0 0-4 0v3a2 2 0 0 0 2 2zm6-6v-2a6 6 0 0 0-12 0v2H4v10h16V11h-2zm-6-4a4 4 0 0 1 4 4v2H8v-2a4 4 0 0 1 4-4z"/>
        </svg>
        Password
      </label>
      <input type="password" id="password-signin" name="password-signin" placeholder="********" required autocomplete="current-password" />

      <button type="submit" aria-label="Sign In">
        <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
          <path d="M10 17l5-5-5-5v10zM5 19h2v-2H5v2zm0-10h2V7H5v2z"/>
        </svg>
        Sign In
      </button>
    </form>

    <form id="signup-panel" role="tabpanel" aria-labelledby="signup-tab" aria-hidden="true" novalidate>
      <label for="name-signup">
        <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
          <path d="M20 4H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2zm0 2l-8 5-8-5V6l8 5 8-5v2z"/>
        </svg>
        Name
      </label>
      <input type="text" id="name-signup" name="name-signup" placeholder="Your Name" required autocomplete="name" />

     
    <label for="email-signup">
        <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
          <path d="M20 4H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2zm0 2l-8 5-8-5V6l8 5 8-5v2z"/>
        </svg>
        Email
      </label>
      <input type="email" id="email-signup" name="email-signup" placeholder="you@example.com" required autocomplete="email" />

      <label for="phone-signup">
        <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
          <path d="M6.62 10.79a15.053 15.053 0 0 0 6.59 6.59l2.2-2.2a1 1 0 0 1 1.11-.21c1.21.49 2.53.76 3.88.76a1 1 0 0 1 1 1v3.5a1 1 0 0 1-1 1C10.07 21.5 2.5 13.93 2.5 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1c0 1.35.27 2.67.76 3.88a1 1 0 0 1-.14 1.11l-2.2 2.2z"/>
        </svg>
        Phone Number
      </label>
      <input type="tel" id="phone-signup" name="phone-signup" placeholder="+1 234 567 8900" pattern="\\+?[0-9\\s\\-]{7,15}" required autocomplete="tel" />

      <label for="password-signup">
        <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
          <path d="M12 17a2 2 0 0 0 2-2v-3a2 2 0 0 0-4 0v3a2 2 0 0 0 2 2zm6-6v-2a6 6 0 0 0-12 0v2H4v10h16V11h-2zm-6-4a4 4 0 0 1 4 4v2H8v-2a4 4 0 0 1 4-4z"/>
        </svg>
        Password
      </label>
      <input type="password" id="password-signup" name="password-signup" placeholder="********" required autocomplete="new-password" />

      <label for="confirm-password-signup">
        <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
          <path d="M9 16.17l-3.88-3.88-1.41 1.41L9 19 20.3 7.71l-1.41-1.41z"/>
        </svg>
        Confirm Password
      </label>
      <input type="password" id="confirm-password-signup" name="confirm-password-signup" placeholder="********" required autocomplete="new-password" />

      <div class="error-message" id="signup-error" role="alert" aria-live="assertive"></div>

      <button type="submit" aria-label="Sign Up">
        <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
          <path d="M10 17l5-5-5-5v10zM5 19h2v-2H5v2zm0-10h2V7H5v2z"/>
        </svg>
        Sign Up
      </button>
    </form>
  </div>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  $(document).ready(function () {
    // Tab switching logic
    function switchToSignIn() {
      $('#signin-tab').addClass('active').attr({ 'aria-selected': 'true', tabindex: '0' });
      $('#signup-tab').removeClass('active').attr({ 'aria-selected': 'false', tabindex: '-1' });
      $('#signin-panel').addClass('active').attr('aria-hidden', 'false');
      $('#signup-panel').removeClass('active').attr('aria-hidden', 'true');
      $('#signup-error').text('');
    }

    function switchToSignUp() {
      $('#signup-tab').addClass('active').attr({ 'aria-selected': 'true', tabindex: '0' });
      $('#signin-tab').removeClass('active').attr({ 'aria-selected': 'false', tabindex: '-1' });
      $('#signup-panel').addClass('active').attr('aria-hidden', 'false');
      $('#signin-panel').removeClass('active').attr('aria-hidden', 'true');
      $('#signup-error').text('');
    }

    $('#signin-tab').on('click', switchToSignIn);
    $('#signup-tab').on('click', switchToSignUp);

    // Sign Up AJAX
    $('#signup-panel').on('submit', function (e) {
      e.preventDefault();
      const name = $('#name-signup').val().trim();
      const email = $('#email-signup').val().trim();
      const phone = $('#phone-signup').val().trim();
      const password = $('#password-signup').val();
      const confirmPassword = $('#confirm-password-signup').val();

      if (!name) {
        Swal.fire('Error', 'Name is required.', 'error');
        return;
      }
      if (!phone) {
        Swal.fire('Error', 'Phone number is required.', 'error');
        return;
      }
      if (!/^\+?[0-9\s\-]{7,15}$/.test(phone)) {
        Swal.fire('Error', 'Phone number format is invalid.', 'error');
        return;
      }
      if (!password) {
        Swal.fire('Error', 'Password is required.', 'error');
        return;
      }
      if (password !== confirmPassword) {
        Swal.fire('Error', 'Passwords do not match.', 'error');
        return;
      }

      $.ajax({
        url: '/customer/register',
        type: 'POST',
        data: {
          name: name,
          email: email,
          phone: phone,
          password: password,
          password_confirmation: confirmPassword
        },
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
          Swal.fire('Success', 'Registration successful!', 'success').then(() => {
            $('#signup-panel')[0].reset();
            switchToSignIn();
          });
        },
        error: function (xhr) {
          let error = 'Registration failed.';
          if (xhr.responseJSON && xhr.responseJSON.errors) {
            error = Object.values(xhr.responseJSON.errors)[0][0];
          } else if (xhr.responseJSON && xhr.responseJSON.message) {
            error = xhr.responseJSON.message;
          }
          Swal.fire('Error', error, 'error');
        }
      });
    });

    // Sign In AJAX
    $('#signin-panel').on('submit', function (e) {
      e.preventDefault();
      const email = $('#email-signin').val().trim();
      const password = $('#password-signin').val().trim();

      if (!email || !password) {
        Swal.fire('Error', 'Email and password are required.', 'error');
        return;
      }

      $.ajax({
        url: '/customer/login',
        type: 'POST',
        data: {
          email: email,
          password: password
        },
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
          Swal.fire('Success', 'Login successful!', 'success').then(() => {
            window.location.href = response.redirect || '/dashboard';
          });
        },
        error: function (xhr) {
          let message = xhr.responseJSON?.message || 'Login failed. Please try again.';
          Swal.fire('Error', message, 'error');
        }
      });
    });

    // Initialize with Sign In active
    switchToSignIn();
  });
</script>

</body>
</html>
