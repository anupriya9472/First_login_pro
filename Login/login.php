<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIn</title>
    <style>
        form{
            height: 250px;
            width: 40%;
            margin-left: 30%;
            margin-top: 50px;
            background-color: powderblue;
            border-radius: 30px;
            box-shadow: 5px 5px 5px black;
            text-align: center;
            padding-top: 20px;
            font-size: 20px;
        }
        .txt{
            font-size: 20px;
            border: 0px;
            background-color: powderblue;
            outline: none;
            border-bottom: 2px solid brown;
        }
        .butn{
            height: 30px;
            width: 20%;
            font-size: 20px;
        }
        .a2{
            margin-left: 25%;
        }
    </style>
</head>
<body>
    <form action="" method="POST">
        <h3>LogIn</h1><hr>
        <label for="user_id">Enter User ID :- </label>
        <input type="text" placeholder="Type here..." class="txt" name="user_id" id="user_id"/><br><br>
        <label for="password">Enter Password :- </label>
        <input type="password" placeholder="Type here..." class="txt" name="password" id="password"/><br>
        <a href="create_account.php" class="a1">Create Account</a>
        <a href="?FORGOT_PAGE" class="a2">Forgot Password?</a><br><br>
        <input type="submit" name="login" value="login" class="butn"/>
    </form>
</body>
</html>