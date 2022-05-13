<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$email = $_POST['email'];
		$password = $_POST['password'];

		if(!empty($password) && !empty($email))
		{
			//read from database
			$query = "select * from users where email = '$email' limit 1";
			$result = mysqli_query($con, $query);
			
			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{
					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: home.php");
						die;
					}
				}
			}
			echo "<script>window.alert('wrong username or password!');</script>";
		}else
		{
            echo "<script>window.alert('wrong username or password!');</script>";
		}
	}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - EDUPORTAL </title>
    <link rel="stylesheet" href="../css/authority.css">

</head>

<body>
    <div class="auth">
        <a href="../index.php" style="text-decoration: none;">
            <h1 class='auth-logo'>EDUPORTAL</h1>
        </a>

        <p class="p1">Login</p>
        <p class="p2">Learn on your own time from top</p>
        <p class="p2">universities and businesses.</p>

        <form method="post">
            <div class="auth-form">
                <div class="entries">
                    <img src="../background/user.png">
                    <input class="input" type="text" name="email" placeholder=" email" autocomplete="on" required>
                </div>

                <div id="entries">
                    <img src="../background/lock.png ">
                    <input class="input" type="password" name = "password" placeholder="Your password" autocomplete="on" required>
                </div>
            </div>
            <a  style="text-decoration: none;"><input class="login-butt" type="submit" value="Login"></a>
        </form>
        <p class="p2" style="text-align: center;">Not on EDU PORTAL? <a href="signup.php">Sign up</a></p>
    </div>
</body>

</html>