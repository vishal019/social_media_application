<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobile Navbar</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .navbar {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #333;
            overflow: hidden;
            transition: top 0.3s;
            padding-left: 30px;
            padding-right: 30px
        }
        .navbar a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }
        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }
        .content {
            padding: 16px;
            height: 2000px; /* For demonstration purposes */
        }
    </style>
</head>
<body>

<div class="navbar" id="navbar">
    <a href="{{route('dashboard')}}"> <i class="bi bi-house-door"></i></a>
    <a href="#search"> <i class="bi bi-search"></i></a>
    <a href="#notifications"><button type="button" class="btn btn-primary" style="height:35px" data-mdb-ripple-init data-bs-toggle="modal" data-bs-target="#myModal"><i class="fa-solid fa-plus"></i></button></a>
    <a href="{{route('mobilemessager')}}"> <i class="bi bi-envelope"></i></i></a>
    <a href="{{route('profile.edit')}}"> <i class="fa-regular fa-user"></i></a>
</div>

<style>
    @media (min-width: 766px) { /* Hide div when screen is larger than 768px */
   #navbar {
        display: none !important;
    }
 

 
}
</style>


</body>
</html>