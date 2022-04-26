<?php
    include("connection.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        //something was posted
        $email = $_POST['email'];
        $password = $_POST['password'];

        if(!empty($email) && !empty($password))
        {
            //search for user in database
            $query = "select * from users where email = '$email' limit 1";
            $result = $dbCon -> query($query);

            if ($result)
            {
                if (mysqli_num_rows($result) > 0)
                {
                    session_start();
                    $user_data = mysqli_fetch_assoc($result);
                    if ($user_data['password'] === $password)
                    {
                        $_SESSION['user_id'] = $user_data['user_id'];
                        header("Location: index.php");
                        die;        
                    }    
                }
            }
        }
        else
        {
            echo "Wrong Username and Password!";
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
    <title>Login</title>
</head>

<body>
    <h1 class="pageTitles">Tema 8 - Scholarship Database</h1>
    <div class="pageContent">
        <form id="login" class="loginForm" method="Post" action="login.php">
            <div class="emailInput">
                <h1 class="pageTitles">Login</h1>
                <label class="inputLabel">Email</label>
                <input name="email" spellcheck="false" class="universalInput" type="text" placeholder="Email">
            </div>

            <div class="passwordInput">
                <label class="inputLabel">Password</label>
                <input name="password" spellcheck="false" class="universalInput" type="password" placeholder="Password">
            </div>

            <button type="submit" id="loginButton" class="universalButton">Login</button>
            <a href="signUp.php">
                <p id="notUser" class="universalLink">Not a User? Sign Up</p>
            </a>
        </form>
    </div>
</body>

</html>
