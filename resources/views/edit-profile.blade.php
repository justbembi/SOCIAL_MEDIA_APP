<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: #f4f7f6;
            color: #333;
        }
        .dashboard {
            display: flex;
            min-height: 100vh;
        }
        .left {
            width: 250px;
            background: #282c34;
            color: #ffffff;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.2);
        }
        .sidebar .menu img {
            width: 40px;
            margin-bottom: 20px;
        }
        .sidebar .profile img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            border: 2px solid #ffffff;
            margin-top: 20px;
        }
        .right-side {
            flex: 1;
            background: #ffffff;
            padding: 20px;
        }
        .right-header {
            border-bottom: 1px solid #e0e0e0;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .big-inbox {
            font-size: 1.5rem;
            color: #333;
        }
        .profile2 {
            display: flex;
            align-items: center;
        }
        .profile2 img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 15px;
        }
        .profile2 .icon-name5 {
            font-size: 14px;
            color: #333;
        }
        .logout-button {
            background-color: #dc3545;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            padding: 8px 15px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        .logout-button:hover {
            background-color: #c82333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group input[type="file"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .save-button {
            background-color: #007bff;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        .save-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <div class="left">
            <div class="sidebar">
                <div class="menu">
                    <img src="https://i.ibb.co/B4Dn7CT/menu.png" alt="Menu Icon">
                </div>
                <div class="profile">
                    <img src="https://www.seekclipart.com/clipng/middle/103-1032140_graphic-transparent-1-vector-flat-small-user-icon.png" alt="Profile Icon">
                </div>
            </div>
        </div>
        <div class="right-side">
            <div class="right-header">
                <div class="top-bar">
                    <div class="big-inbox">Edit Profile</div>
                    <div class="profile2">
                        <img src="{{ asset('storage/' . Auth::user()->profile_picture_url) }}" alt="{{ Auth::user()->name }}">
                        <div class="icon-name5">{{ Auth::user()->name }}</div>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="logout-button">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="right-body">
                <form action="{{ route('updateProfile') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="profile_picture">Profile Picture:</label>
                        <input type="file" id="profile_picture" name="profile_picture">
                    </div>
                    <div class="form-group">
                        <label for="background_picture">Background Picture:</label>
                        <input type="file" id="background_picture" name="background_picture">
                    </div>
                    <button type="submit" class="save-button">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
