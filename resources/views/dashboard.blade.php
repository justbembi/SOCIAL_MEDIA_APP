<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
        }

        body {
            display: flex;
            height: 100vh;
            background: #f4f7f9;
            color: #333;
        }

        .dashboard {
            display: flex;
            width: 100%;
            max-width: 1200px;
            margin: auto;
        }

        .left {
            width: 60px;
            background: #282c34;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px 0;
            box-shadow: 2px 0 6px rgba(0, 0, 0, 0.2);
        }

        .left .menu img {
            width: 24px;
            margin-bottom: 20px;
        }

        .left .profile img {
            border-radius: 50%;
            width: 40px;
            height: 40px;
            border: 2px solid #ffffff;
            margin-top: auto;
        }

        .right-side {
            flex: 1;
            background: #ffffff;
            border-left: 1px solid #e1e4e8;
            display: flex;
            flex-direction: column;
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 20px;
            border-bottom: 1px solid #e1e4e8;
            background: #282c34;
            color: #f4f7f9;
        }

        .top-bar .big-inbox {
            font-size: 1.5rem;
            font-weight: 600;
        }

        .top-bar .top-bar-items img {
            margin-left: 15px;
            width: 20px;
            filter: brightness(0) invert(1);
        }

        .profile2 {
            display: flex;
            align-items: center;
        }

        .profile2 img {
            border-radius: 50%;
            width: 35px;
            height: 35px;
            border: 2px solid #ffffff;
            margin-right: 10px;
        }

        .profile2 .icon-name5 {
            font-size: 14px;
            color: #f4f7f9;
        }

        .logout-button {
            background-color: #d9534f;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            padding: 8px 16px;
            cursor: pointer;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }

        .logout-button:hover {
            background-color: #c9302c;
        }

        .profile-header {
            background: url('https://via.placeholder.com/1200x400') no-repeat center center/cover;
            padding: 20px;
            text-align: center;
            position: relative;
            border-bottom: 1px solid #e1e4e8;
            color: #ffffff;
        }

        .profile-picture-container img {
            border-radius: 50%;
            width: 120px;
            height: 120px;
            border: 4px solid #ffffff;
            margin-bottom: 15px;
        }

        .profile-details p {
            margin: 5px 0;
            color: #6c757d;
            font-size: 14px;
        }

        .edit-profile-button {
            background-color: #5bc0de;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 600;
            margin-top: 10px;
            transition: background-color 0.3s ease;
        }

        .edit-profile-button:hover {
            background-color: #31b0d5;
        }

        .new-hr {
            border: none;
            height: 1px;
            background-color: #e1e4e8;
            margin: 20px 0;
        }

        /* Scrollbar Customization */
        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: #ccc;
            border-radius: 5px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #999;
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <div class="left">
            <div class="menu">
                <img src="https://i.ibb.co/B4Dn7CT/menu.png" alt="Menu Icon">
            </div>
            <div class="profile">
                <img src="https://www.seekclipart.com/clipng/middle/103-1032140_graphic-transparent-1-vector-flat-small-user-icon.png" alt="Profile Icon">
            </div>
        </div>
        <div class="right-side">
            <div class="top-bar">
                <div class="big-inbox">Dashboard</div>
                <div class="top-bar-items">
                    <img src="https://i.ibb.co/VJm73Hz/notifications-button.png" alt="Notifications">
                    <img src="https://i.ibb.co/vz4HYJb/envelope.png" alt="Messages">
                    <img src="https://i.ibb.co/52Vkq4M/earth-globe.png" alt="Language">
                    <div class="icon-name5">English</div>
                </div>
                <div class="profile2">
                    <img src="{{ asset('storage/' . Auth::user()->profile_picture_url) }}" alt="{{ Auth::user()->name }}">
                    <div class="icon-name5">{{ Auth::user()->name }}</div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="logout-button">Logout</button>
                    </form>
                </div>
            </div>
            <hr class="new-hr">
            <div class="profile-header" style="background-image: url('{{ asset('storage/' . Auth::user()->background_picture_url) }}');">
                <div class="profile-picture-container">
                    <img src="{{ asset('storage/' . Auth::user()->profile_picture_url) }}" alt="{{ Auth::user()->name }}">
                </div>
                <h1>{{ Auth::user()->name }}</h1>
                <a href="{{ route('editProfile') }}" class="edit-profile-button">Edit Profile</a>
            </div>
            <div class="profile-details">
                <p>Email: {{ Auth::user()->email }}</p>
                <p>Joined: {{ Auth::user()->created_at->format('M d, Y') }}</p>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
