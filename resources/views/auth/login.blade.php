<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap");

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Roboto', sans-serif;
    }

    body {
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      background: linear-gradient(135deg, #1a2a6c, #b21f1f);
      overflow: hidden;
    }

    .login-container {
      width: 360px;
      padding: 40px;
      background: rgba(255, 255, 255, 0.9);
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      text-align: center;
    }

    .login-container h2 {
      font-size: 1.8rem;
      margin-bottom: 20px;
      color: #333;
    }

    .login-container .input-group {
      position: relative;
      margin-bottom: 20px;
    }

    .login-container .input-group input {
      width: 100%;
      padding: 10px;
      border: 2px solid #ddd;
      border-radius: 5px;
      outline: none;
      font-size: 16px;
      color: #333;
      background-color: #f9f9f9;
    }

    .login-container .input-group input:focus {
      border-color: #007bff;
      background-color: #fff;
    }

    .login-container .input-group label {
      position: absolute;
      top: 50%;
      left: 10px;
      transform: translateY(-50%);
      font-size: 16px;
      color: #aaa;
      pointer-events: none;
      transition: 0.3s ease;
    }

    .login-container .input-group input:focus ~ label,
    .login-container .input-group input:not(:placeholder-shown) ~ label {
      top: 5px;
      font-size: 12px;
      color: #007bff;
    }

    .login-container .actions {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }

    .login-container .actions label {
      display: flex;
      align-items: center;
    }

    .login-container .actions a {
      color: #007bff;
      text-decoration: none;
      font-size: 14px;
    }

    .login-container .actions a:hover {
      text-decoration: underline;
    }

    .login-container button {
      background: #007bff;
      color: #fff;
      border: none;
      padding: 12px 20px;
      cursor: pointer;
      border-radius: 5px;
      font-size: 16px;
      font-weight: 500;
      transition: background-color 0.3s ease;
    }

    .login-container button:hover {
      background-color: #0056b3;
    }

    .login-container .register {
      margin-top: 20px;
      font-size: 14px;
      color: #555;
    }

    .login-container .register a {
      color: #007bff;
      text-decoration: none;
    }

    .login-container .register a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <form action="{{ route('login') }}" method="POST">
      @csrf
      <h2>Login</h2>
      <div class="input-group">
        <input type="text" name="email" placeholder="Enter your email" required>
        <label for="email">Enter your email</label>
      </div>
      <div class="input-group">
        <input type="password" name="password" placeholder="Enter your password" required>
        <label for="password">Enter your password</label>
      </div>
      <div class="actions">
        <label>
          <input type="checkbox" id="remember">
          Remember me
        </label>
        <a href="#">Forgot password?</a>
      </div>
      <button type="submit">Log In</button>
      <div class="register">
        Don't have an account? <a href="{{ route('register') }}">Register</a>
      </div>
    </form>
  </div>
</body>
</html>
