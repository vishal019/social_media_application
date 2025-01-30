<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social Media App</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f2f2f2;
        }

        .header {
            background: #fff;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #ddd;
        }

        .header .logo {
            font-size: 20px;
            font-weight: bold;
            color: #333;
        }

        .header .search {
            flex: 1;
            margin: 0 20px;
        }

        .header .search input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .container {
            display: flex;
            padding: 20px;
        }

        .sidebar {
            flex: 1;
            background: #fff;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-right: 20px;
        }

        .sidebar h3 {
            margin-bottom: 10px;
            font-size: 18px;
        }

        .sidebar ul {
            list-style: none;
        }

        .sidebar ul li {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .sidebar ul li .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #ddd;
            margin-right: 10px;
        }

        .main {
            flex: 3;
            background: #fff;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .main .tabs {
            display: flex;
            margin-bottom: 20px;
            border-bottom: 1px solid #ddd;
        }

        .main .tabs div {
            padding: 10px 20px;
            cursor: pointer;
        }

        .main .tabs .active {
            font-weight: bold;
            border-bottom: 2px solid #333;
        }

        .main .post {
            background: #f9f9f9;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
        }

        .main .post h4 {
            margin-bottom: 10px;
        }

        .right-panel {
            flex: 1;
            background: #fff;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .right-panel h3 {
            margin-bottom: 10px;
            font-size: 18px;
        }

        .right-panel .thumbnail {
            background: #ddd;
            height: 80px;
            margin-bottom: 10px;
            border-radius: 5px;
        }

    </style>
</head>
<body>
    <div class="header">
        <div class="logo">$100K Challenge</div>
        <div class="search">
            <input type="text" placeholder="Search">
        </div>
        <button>Post</button>
    </div>

    <div class="container">
        <div class="sidebar">
            <h3>Following</h3>
            <ul>
                <li><div class="avatar"></div>User 1</li>
                <li><div class="avatar"></div>User 2</li>
                <li><div class="avatar"></div>User 3</li>
            </ul>
        </div>

        <div class="main">
            <div class="tabs">
                <div class="active">Creative</div>
                <div>You</div>
                <div>IRL</div>
            </div>
            <div class="post">
                <h4>Short trailer videos</h4>
                <p>Content goes here...</p>
            </div>
            <div class="post">
                <h4>Short trailer videos</h4>
                <p>Content goes here...</p>
            </div>
        </div>

        <div class="right-panel">
            <h3>Browse</h3>
            <div class="thumbnail"></div>
            <div class="thumbnail"></div>
            <div class="thumbnail"></div>
        </div>
    </div>
</body>
</html>
