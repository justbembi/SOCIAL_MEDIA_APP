<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(120deg, #f9f9f9, #e0e0e0);
            color: #444;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        header {
            background: #28a745;
            color: white;
            padding: 20px 40px;
            text-align: center;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }
        header h1 {
            font-size: 2rem;
            margin: 0;
        }
        nav ul {
            list-style: none;
            margin: 10px 0 0;
            padding: 0;
            display: flex;
            justify-content: center;
        }
        nav ul li {
            margin: 0 20px;
        }
        nav ul li a {
            color: white;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }
        nav ul li a:hover {
            color: #ffeb3b;
        }
        main {
            flex: 1;
            padding: 40px;
            text-align: center;
            background: #ffffff;
            border-radius: 12px;
            margin: 20px auto;
            max-width: 700px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        main p {
            font-size: 1.1rem;
            line-height: 1.5;
            color: #555;
        }
        footer {
            background: #28a745;
            color: white;
            padding: 20px;
            text-align: center;
            box-shadow: 0 -6px 12px rgba(0, 0, 0, 0.2);
        }
        footer p {
            margin: 0;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <header>
        <h1>Welcome to Our Social Media Platform</h1>
        <nav>
            <ul>
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <p>Welcome aboard! Connect with friends, share moments, and explore content tailored to your interests. Our platform is designed to help you stay connected and engaged.</p>
    </main>
    <footer>
        <p>&copy; {{ date('Y') }} Social Media Platform. All rights reserved.</p>
    </footer>
</body>
</html>
