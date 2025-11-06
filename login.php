<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      padding: 20px;
    }

    .container {
      width: 100%;
      max-width: 420px;
    }

    .login-card {
      background-color: white;
      border-radius: 16px;
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
      padding: 40px;
      width: 100%;
      position: relative;
      overflow: hidden;
    }

    .login-header {
      text-align: center;
      margin-bottom: 35px;
    }

    .login-header h1 {
      color: #333;
      font-size: 32px;
      margin-bottom: 10px;
      font-weight: 700;
    }

    .login-header p {
      color: #666;
      font-size: 16px;
    }

    .login-options {
      display: flex;
      margin-bottom: 20px;
      border-radius: 8px;
      overflow: hidden;
      border: 1px solid #e1e5ee;
    }

    .login-option {
      flex: 1;
      text-align: center;
      padding: 12px;
      background-color: #f8f9fa;
      cursor: pointer;
      transition: all 0.3s;
      font-weight: 600;
      color: #666;
    }

    .login-option.active {
      background-color: #667eea;
      color: white;
    }

    .form-group {
      margin-bottom: 20px;
      position: relative;
    }

    .form-group label {
      display: block;
      margin-bottom: 8px;
      font-weight: 600;
      color: #444;
      font-size: 14px;
    }

    .input-with-icon {
      position: relative;
    }

    .input-icon {
      position: absolute;
      left: 16px;
      top: 50%;
      transform: translateY(-50%);
      color: #666;
      font-size: 18px;
    }

    .form-group input {
      width: 100%;
      padding: 14px 16px 14px 45px;
      border: 2px solid #e1e5ee;
      border-radius: 8px;
      font-size: 16px;
      transition: all 0.3s;
      outline: none;
    }

    .form-group input:focus {
      border-color: #667eea;
      box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    .password-container {
      position: relative;
    }

    .toggle-password {
      position: absolute;
      right: 15px;
      top: 50%;
      transform: translateY(-50%);
      background: none;
      border: none;
      color: #666;
      cursor: pointer;
      font-size: 14px;
    }

    .remember-forgot {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 25px;
    }

    .remember-me {
      display: flex;
      align-items: center;
    }

    .remember-me input {
      margin-right: 8px;
    }

    .forgot-password {
      color: #667eea;
      text-decoration: none;
      font-size: 14px;
      transition: color 0.3s;
    }

    .forgot-password:hover {
      text-decoration: underline;
    }

    .submit-btn {
      width: 100%;
      padding: 14px;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s;
      box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
      margin-bottom: 20px;
    }

    .submit-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
    }

    .divider {
      text-align: center;
      position: relative;
      margin: 25px 0;
      color: #999;
    }

    .divider::before {
      content: "";
      position: absolute;
      top: 50%;
      left: 0;
      right: 0;
      height: 1px;
      background-color: #e1e5ee;
      z-index: 1;
    }

    .divider span {
      background-color: white;
      padding: 0 15px;
      position: relative;
      z-index: 2;
    }

    .social-login {
      display: flex;
      justify-content: center;
      gap: 15px;
      margin-bottom: 25px;
    }

    .social-btn {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      border: 1px solid #e1e5ee;
      background-color: white;
      cursor: pointer;
      transition: all 0.3s;
      font-size: 20px;
    }

    .social-btn.google {
      color: #DB4437;
    }

    .social-btn.facebook {
      color: #4267B2;
    }

    .social-btn.twitter {
      color: #1DA1F2;
    }

    .social-btn:hover {
      transform: translateY(-3px);
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .signup-link {
      text-align: center;
      color: #666;
      font-size: 15px;
    }

    .signup-link a {
      color: #667eea;
      text-decoration: none;
      font-weight: 600;
      transition: color 0.3s;
    }

    .signup-link a:hover {
      text-decoration: underline;
    }

    @media (max-width: 480px) {
      .login-card {
        padding: 30px 20px;
      }

      .login-header h1 {
        font-size: 26px;
      }

      .remember-forgot {
        flex-direction: column;
        align-items: flex-start;
        gap: 10px;
      }
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="login-card">
      <div class="login-header">
        <h1>Welcome Back</h1>
        <p>Sign in to your account to continue</p>
      </div>

      <div class="login-options">
        <div class="login-option active" id="username-option">Username</div>
        <div class="login-option" id="email-option">Email</div>
      </div>

      <form>
        <div class="form-group" id="username-group">
          <label for="username">Username</label>
          <div class="input-with-icon">
            <span class="input-icon">👤</span>
            <input type="text" id="username" name="username" placeholder="Enter your username">
          </div>
        </div>

        <div class="form-group" id="email-group" style="display: none;">
          <label for="email">Email Address</label>
          <div class="input-with-icon">
            <span class="input-icon">✉️</span>
            <input type="email" id="email" name="email" placeholder="Enter your email">
          </div>
        </div>

        <div class="form-group">
          <label for="password">Password</label>
          <div class="input-with-icon password-container">
            <span class="input-icon">🔒</span>
            <input type="password" id="password" name="password" placeholder="Enter your password">
            <button type="button" class="toggle-password">Show</button>
          </div>
        </div>

        <div class="remember-forgot">
          <div class="remember-me">
            <input type="checkbox" id="remember">
            <label for="remember">Remember me</label>
          </div>
          <a href="#" class="forgot-password">Forgot password?</a>
        </div>

        <button type="submit" class="submit-btn">Sign In</button>

        <div class="divider">
          <span>Or continue with</span>
        </div>

        <div class="social-login">
          <div class="social-btn google">G</div>
          <div class="social-btn facebook">f</div>
          <div class="social-btn twitter">t</div>
        </div>

        <div class="signup-link">
          Don't have an account? <a href="#">Sign up</a>
        </div>
      </form>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script>
    // Toggle between username and email login
    document.getElementById('username-option').addEventListener('click', function () {
      this.classList.add('active');
      document.getElementById('email-option').classList.remove('active');
      document.getElementById('username-group').style.display = 'block';
      document.getElementById('email-group').style.display = 'none';
    });

    document.getElementById('email-option').addEventListener('click', function () {
      this.classList.add('active');
      document.getElementById('username-option').classList.remove('active');
      document.getElementById('email-group').style.display = 'block';
      document.getElementById('username-group').style.display = 'none';
    });

    // Toggle password visibility
    document.querySelector('.toggle-password').addEventListener('click', function () {
      const passwordInput = document.getElementById('password');
      const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
      passwordInput.setAttribute('type', type);
      this.textContent = type === 'password' ? 'Show' : 'Hide';
    });

    // Handle form submission
    const form = document.querySelector('form');
    form.addEventListener('submit', function (e) {
      e.preventDefault();
      const formData = new FormData(form);
      console.log(...formData);
      checkLogin(formData);


    });

    function checkLogin(formData) {
      $.ajax({
        url: 'api/check_login.php',
        data: formData,
        method: 'GET',
        success: function (response) {
          if (response.logged_in) {
            alert("Login successful!");
            window.location.href = 'index.php?username=' + response.user_id;
          }
          else {
            alert('Invalid credentials. Please try again.');
          }
        }
      });
    }
  </script>
</body>

</html>