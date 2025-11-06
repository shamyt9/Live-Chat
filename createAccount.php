<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Registration</title>
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

    .container {
      width: 100%;
      max-width: 450px;
    }

    .form-container {
      background-color: white;
      border-radius: 12px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
      padding: 40px;
      width: 100%;
    }

    .form-header {
      text-align: center;
      margin-bottom: 30px;
    }

    .form-header h1 {
      color: #333;
      font-size: 28px;
      margin-bottom: 8px;
    }

    .form-header p {
      color: #666;
      font-size: 16px;
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

    .form-group input {
      width: 100%;
      padding: 14px 16px;
      border: 2px solid #e1e5ee;
      border-radius: 8px;
      font-size: 16px;
      transition: all 0.3s;
      outline: none;
    }

    .form-group input:focus {
      border-color: #4d7cfe;
      box-shadow: 0 0 0 3px rgba(77, 124, 254, 0.1);
    }

    .form-group input:valid {
      border-color: #4CAF50;
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

    .form-footer {
      margin-top: 30px;
    }

    .submit-btn {
      width: 100%;
      padding: 14px;
      background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s;
      box-shadow: 0 4px 15px rgba(37, 117, 252, 0.3);
    }

    .submit-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(37, 117, 252, 0.4);
    }

    .form-links {
      text-align: center;
      margin-top: 20px;
    }

    .form-links a {
      color: #2575fc;
      text-decoration: none;
      font-size: 14px;
      transition: color 0.3s;
    }

    .form-links a:hover {
      text-decoration: underline;
    }

    .form-links span {
      color: #999;
      margin: 0 10px;
    }

    .password-requirements {
      margin-top: 5px;
      font-size: 12px;
      color: #666;
    }

    .requirement {
      display: flex;
      align-items: center;
      margin-bottom: 3px;
    }

    .requirement::before {
      content: "•";
      margin-right: 5px;
      color: #999;
    }

    .requirement.met::before {
      color: #4CAF50;
    }

    @media (max-width: 480px) {
      .form-container {
        padding: 30px 20px;
      }

      .form-header h1 {
        font-size: 24px;
      }
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="form-container">
      <div class="form-header">
        <h1>Create Account</h1>
        <p>Join our community today</p>
      </div>

      <form id="createAccount">
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" id="username" name="username" required>
        </div>

        <div class="form-group">
          <label for="email">Email Address</label>
          <input type="email" id="email" name="email" required>
        </div>

        <div class="form-group">
          <label for="name">Full Name</label>
          <input type="text" id="name" name="name" required>
        </div>

        <div class="form-group">
          <label for="password">Password</label>
          <div class="password-container">
            <input type="password" id="password" name="password" required>
            <button type="button" class="toggle-password">Show</button>
          </div>
          <div class="password-requirements">
            <div class="requirement">At least 8 characters</div>
            <div class="requirement">Contains a number</div>
            <div class="requirement">Contains a special character</div>
          </div>
        </div>

        <div class="form-footer">
          <button type="submit" class="submit-btn">Create Account</button>
          <div class="form-links">
            <a href="#">Already have an account?</a>
            <span>|</span>
            <a href="#">Forgot password?</a>
          </div>
        </div>
      </form>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    // Toggle password visibility
    document.querySelector('.toggle-password').addEventListener('click', function () {
      const passwordInput = document.getElementById('password');
      const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
      passwordInput.setAttribute('type', type);
      this.textContent = type === 'password' ? 'Show' : 'Hide';
    });

    const form = document.getElementById('createAccount');

    form.addEventListener('submit', function (e) {
      e.preventDefault();
      fetchFormData();
    });

    function fetchFormData() {
      const form = document.getElementById('createAccount');
      const formData = new FormData(form);

      $.ajax({
        url: './api/saveUser.php',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
          try {
            response = JSON.parse(response);
            if (response.status === 'success') {
              alert(' creating account: ' + response.message);

              window.location.href = 'login.php';
            }
            else {
              alert('Error creating account: ' + response.message);
            }
          }
          catch (e) {
            alert('An unexpected error occurred.');
          }

        }
      })
    }

  </script>
</body>

</html>