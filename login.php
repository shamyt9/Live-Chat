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
      background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
      padding: 20px;
    }

    .login-container {
      background-color: white;
      border-radius: 10px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
      width: 100%;
      max-width: 400px;
      padding: 40px;
    }

    .login-header {
      text-align: center;
      margin-bottom: 30px;
    }

    .login-header h1 {
      color: #333;
      font-size: 28px;
      margin-bottom: 10px;
    }

    .login-header p {
      color: #666;
      font-size: 14px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    label {
      display: block;
      margin-bottom: 8px;
      color: #555;
      font-weight: 500;
    }

    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 12px 15px;
      border: 1px solid #ddd;
      border-radius: 5px;
      font-size: 16px;
      transition: all 0.3s;
    }

    input[type="text"]:focus,
    input[type="password"]:focus {
      border-color: #2575fc;
      box-shadow: 0 0 0 2px rgba(37, 117, 252, 0.2);
      outline: none;
    }

    .error-message {
      color: #e74c3c;
      font-size: 14px;
      margin-top: 5px;
      display: none;
    }

    .remember-forgot {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }

    .remember-me {
      display: flex;
      align-items: center;
    }

    .remember-me input {
      margin-right: 8px;
    }

    .forgot-password {
      color: #2575fc;
      text-decoration: none;
      font-size: 14px;
    }

    .forgot-password:hover {
      text-decoration: underline;
    }

    .login-button {
      width: 100%;
      padding: 12px;
      background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
      color: white;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s;
    }

    .login-button:hover {
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(37, 117, 252, 0.4);
    }

    .signup-link {
      text-align: center;
      margin-top: 25px;
      color: #666;
      font-size: 14px;
    }

    .signup-link a {
      color: #2575fc;
      text-decoration: none;
      font-weight: 500;
    }

    .signup-link a:hover {
      text-decoration: underline;
    }

    @media (max-width: 480px) {
      .login-container {
        padding: 30px 20px;
      }

      .remember-forgot {
        flex-direction: column;
        align-items: flex-start;
      }

      .forgot-password {
        margin-top: 10px;
      }
    }
  </style>
</head>

<body>
  <div class="login-container">
    <div class="login-header">
      <h1>Welcome Back</h1>
      <p>Please sign in to your account</p>
    </div>

    <form id="loginForm">
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" placeholder="Enter your username" required>
        <div class="error-message" id="username-error">Please enter a valid username or email</div>
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required>
        <div class="error-message" id="password-error">Please enter your password</div>
      </div>

      <div class="remember-forgot">
        <div class="remember-me">
          <input type="checkbox" id="remember" name="remember">
          <label for="remember">Remember me</label>
        </div>
        <a href="#" class="forgot-password">Forgot password?</a>
      </div>

      <button type="submit" class="login-button">Sign In</button>

      <div class="signup-link">
        Don't have an account? <a href="createAccount.php">Sign up</a>
      </div>
    </form>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    document.getElementById('loginForm').addEventListener('submit', function (event) {
      event.preventDefault();

      const username = document.getElementById('username').value;
      const password = document.getElementById('password').value;
      const usernameError = document.getElementById('username-error');
      const passwordError = document.getElementById('password-error');

      // Reset error messages
      usernameError.style.display = 'none';
      passwordError.style.display = 'none';

      let isValid = true;

      // Validate username
      if (username.trim() === '') {
        usernameError.style.display = 'block';
        isValid = false;
      }

      // Validate password
      if (password === '') {
        passwordError.style.display = 'block';
        isValid = false;
      }

      if (isValid) {
        checkLogin(username, password);
      }
    });

    function checkLogin(username, password) {
      console.log(username, password);
      $.ajax({
        url: 'api/check_login.php',
        data: { username: username, password: password },
        method: 'POST',
        success: function (response) {
          console.log(response)
          if (response['logged_in']) {
            console.log("Login successful!");
            window.location.href = 'index.php?username=' + response.data;
          }
          else {
            alert('Invalid credentials. Please try again.');
            console.log(response.error);
          }
        },
        error: function (xhr, status, error) {
          console.error('AJAX error:', error);
          alert('Server error. Please try again.');
        }
      });
    }
  </script>
</body>

</html>