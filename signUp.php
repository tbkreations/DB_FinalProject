<?php
    session_start();
        include("connection.php");
        include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

		if(!empty($email) && !empty($password) && !empty($name))
		{
			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_id,email,password,name) values ('$user_id','$email','$password','$name')";

			mysqli_query($dbCon, $query);

			header("Location: login.php");
			die;
		}
        else
		{
			echo "Please enter some valid information!";
		}
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Sign Up</title>
</head>

<body>
    <div class="pageContent">
        <form action="signUp.php" id="signUp" class="loginForm" method="POST">
            <h1 class="pageTitles">Sign Up</h1>
            <div class="nameInput">
                <label class="inputLabel">Name</label>
                <input name="name" spellcheck="false" class="universalInput" type="text" placeholder="Name">
            </div>

            <div class="emailInput">
                <label class="inputLabel">Email</label>
                <input name="email" spellcheck="false" class="universalInput" type="text" placeholder="Email">
            </div>

            <div class="passwordInput">
                <label class="inputLabel">Password</label>
                <input name="password" spellcheck="false" class="universalInput" type="password" placeholder="Password">
            </div>

            <button type="submit" id="loginButton" class="universalButton">Register</button>
            <a href="login.php">
                <p id="notUser" class="universalLink">Have an Account? Login</p>
            </a>
        </form>
    </div>
</body>

</html>