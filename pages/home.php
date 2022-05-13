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
    <title>Home - eduportal</title>
    <link rel="stylesheet" href="../css/home.css">
</head>

<body>
    <header>
        <h1 class='logo'>EDU PORTAL</h1>
        <nav>
            <a href="../pages/home.php" style="font-weight: bolder; background-color:lightgrey ;">Home</a>
            <a href="../pages/courses.php"> All Courses</a>
            <a href="../pages/tasks.php">To-Do</a>
            <a href="../pages/account.php">My Account</a>
            <a href="../pages/logout.php">Log out</a>
        </nav>
        <div class="separator"></div>
    </header>
    <main>
        <div class="himg-div">
            <p class="himg-p1">SKILLS For</p>
            <p class="himg-p2" style="color:#fff;">Your&nbsp;</p>
            <p class="himg-p2">FUTURE</p>
            <img src="https://th.bing.com/th/id/OIP.WSHG2vpBDNkGZpTPENfPOQHaEr?pid=ImgDet&rs=1" alt="home-hero image">
        </div>
        <div class="container-outermost">
            <div class="container-1">
                <h4>Access a variety of Tools to Help You Suceed</h4>
                <div class="container-1-1">
                    <div class="grid-container">
                        <div class="grid-item">
                            <img src="../background/structured_study_planner.svg">
                            <p>Structured Study Planner</p>
                        </div>
                        <div class="grid-item">
                            <img src="../background/active_community_forum.svg">
                            <p>Active Community Forum</p>
                        </div>
                        <div class="grid-item">
                            <img src="../background/instructional_videos.svg">
                            <p>Instructional Videos</p>
                        </div>
                        <div class="grid-item">
                            <img src="../background/questions.svg">
                            <p>Question Sets</p>
                        </div>
                        <div class="grid-item">
                            <img src="../background/interactive_quizzes.svg">
                            <p>Interactive Quizzes</p>
                        </div>
                        <div class="grid-item">
                            <img src="../background/focus_review_videos.svg">
                            <p>Focus Review Videos</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <p class="p1"> INCREASE YOUR LEARNING SKILLS WITH edu portal</p>
        <p class="p2"> LETS MOVE TO MAKE FUTURE BRIGHT. Enroll now ! </p>
        <hr>
        <p class="p3"><small>Copyright &copy; 2022 HITESHLOKE</small></p>
    </footer>
</body>

</html>