<?php 
session_start();

	include("connection.php");
	include("functions.php");
    $users=table($con,"users");
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		$email = $_POST['email'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name)  && !empty($email))
		{
            if(!$users){
                $query = "create table users(
                    user_id bigint ,
                    user_name varchar(50),
                    email varchar(50),
                    password varchar(50),
                    PRIMARY KEY (user_id)); ";
                
                mysqli_query($con, $query);
            }
            $result = mysqli_query($con,"select * from users where email = '$email'");
            if($result && mysqli_num_rows($result) > 0)
	        {
				echo "<script>window.alert('E-mail already registered');</script>";
			}
			//save to database
			else{
				$user_id = random_num(20);
				$query = "insert into users (user_id,user_name,email,password) values ('$user_id','$user_name','$email','$password')";

				mysqli_query($con, $query);

				header("Location: login.php");
				die;
			}
		}else
		{
			echo "<script>window.alert('Please enter some valid information!');</script>";
            
		}
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - EDUPORTAL </title>
    <link rel="stylesheet" href="../css/authority.css">

</head>

<body>
    <div class="auth">
        <a href="../index.php" style="text-decoration: none;">
            <h1 class='auth-logo'>EDUPORTAL</h1>
        </a>

        <p class="p1">Sign Up</p>
        <p class="p2">Learn on your own time from top</p>
        <p class="p2">universities and businesses.</p>

        <form  method="post">
            <div class="auth-form">
                <div class="entries">
                    <img src="../background/user.png">
                    <input class="input" type="text" name ="user_name" placeholder="First & Last name" required>
                </div>

                <div class="entries">
                    <img src="../background/email.png ">
                    <input class="input" type="email" name = "email" placeholder="Email" autocomplete="on" required>
                </div>

                <div id="entries">
                    <img src="../background/lock.png ">
                    <input class="input" type="password" name="password" placeholder="Your password" required>
                </div>
            </div>
            <span  style="text-decoration: none;"><input class="create-account" type="submit" value="Create An Account"></span>
        </form>
        <p class="p2" style="text-align: center;">Already on EDUPORTAL? <a href="login.php">Log in</a></p>
    </div>
</body>

</html>