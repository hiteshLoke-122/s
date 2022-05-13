<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account - EDUPORTAL</title>
    <link rel="stylesheet" href="../css/account.css">
</head>

<body>
    <header>
        <a href="../pages/home.php" style="text-decoration: none;">
            <h1 class='logo'>EDUPORTAL</h1>
        </a>
        <nav>
            <a href="../pages/home.php">Home</a>
            <a href="../pages/courses.php">All Courses</a>
            <a href="../pages/tasks.php">To-Do</a>
            <a href="../pages/account.php" style="font-weight: bolder; background-color:lightgrey ;">My Account</a>
            <a href="../pages/logout.php">Log out</a>
        </nav>
        <div class="separator"></div>
    </header>
    <main>
        <div class="outer-container">
            <div class="img-container">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                <img id="profileImage" src="../background/user1.png " />
                <input id="imageUpload" type="file" name="profile_photo" placeholder="Photo" required="" capture>
            </div>
            <div class="detail-container">
                <p>
                    <label>Email : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    <span ><?php echo $user_data['email']; ?></span>
                </p>
                <br>
                <p>
                    <label>Full Name: </label>
                    <span ><?php echo $user_data['user_name']; ?></span>
                </p>
            </div>
        </div>
    </main>
    <footer>
        <p class="p1"> Happy Learning with eduportal </p>
        <p class="p2"> Make a part of your journey with us. Enroll now ! </p>
        <hr>
        <p class="p3"><small>Copyright &copy; 2022 HITESHLOKE</small></p>
    </footer>
</body>
<script type="text/JavaScript" src="../js/account.js"></script>

</html>