<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);
    $name=$user_data['user_name'];
    $mytodo=table($con,$name);
    if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		if(isset($_POST['add']) ){
            if(!empty($_POST['todo']))
            {
                $todo = $_POST['todo'];
                if (!$mytodo) {
                    $query = "create table $name(
                        id bigint AUTO_INCREMENT,
                        task varchar(50),
                        PRIMARY KEY (id)); ";
                    
                    mysqli_query($con, $query);
                    
                }
                $query = "insert into $name (task) values ('$todo')";
                    
                mysqli_query($con, $query);
                header("Location: tasks.php");
            }else
            {
                echo "<script>window.alert('Please enter item to add');</script>";
            }
        }
        if(isset($_POST['delete']) ){
            if(!empty($_POST['item']))
            {
                foreach($_POST['item'] as $value){
                    $query = "delete from $name where id = ".$value;
                    mysqli_query($con, $query);    
                }
                
                header("Location: tasks.php");
            }else
            {
                echo "<script>window.alert('Select items to delete');</script>";
            }
        }
        if(isset($_POST['deleteAll']) )
        {
            $query = "drop table $name ";
            mysqli_query($con, $query);    
            header("Location: tasks.php");
        }
    }

    


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks - EDUPORTAL</title>
    <link rel="stylesheet" href="../css/tasks.css">

</head>

<body>
    <header>
        <h1 class='logo'>EDUPORTAL</h1>
        <nav>
            <a href="../pages/home.php">Home</a>
            <a href="../pages/courses.php"> All Courses</a>
            <a href="../pages/tasks.php" style="font-weight: bolder; background-color:lightgrey ;">To-Do</a>
            <a href="../pages/account.php">My Account</a>
            <a href="../pages/logout.php">Log out</a>
        </nav>
        <div class="separator"></div>
    </header>
    <main>
        <div class="container">
            <h2>Task Manager</h2>
            <br /><br />
            <div>
                <form method="post">
                    <div>
                        <input type="text" placeholder="todo-item" id="box" name="todo"/>
                    </div>
                    <div>
                        <input type="submit" value=" ADD " name='add'  class="add-task" />
                    </div>
                </form>
            </div>
            <div>
                <?php
                if($mytodo)
                {
	                $result = mysqli_query($con,"select * from $name ");
                    if($result && mysqli_num_rows($result) > 0)
		            {
                        echo '<form method="post" >';
                        while($row = mysqli_fetch_array($result))
                        {
                            echo "<input type='checkbox' class='item' name='item[]' value=".$row['id']."> ".$row['task']. "<br/>";
                        }
                        echo  "<br/>
                        <input type='submit' name='delete' value='Delete'>
                        <input type='submit' name='deleteAll' value='Delete All'>
                        </form>";
                    }
                }

                ?>
            </div>
        </div>
    </main>
    <footer>
        <p class="p1"> Happy Learning with EDUPORTAL </p>
        <p class="p2"> Make a part of your journey with us. Enroll now ! </p>
        <hr>
        <p class="p3"><small>Copyright &copy; 2022 HITESH LOKE</small></p>
    </footer>
    <script type="text/javascript" src="../js/account.js"></script>
</body>

</html>