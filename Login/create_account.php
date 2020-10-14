<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <style>
        form{
            height: 450px;
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
    </style>
</head>
<body>
    <form action="index.php" method="POST">
        <h2>Create Account</h2><hr>
        <label for="name">Name:</label>
        <input type="text" class="txt" name="name" id="name"><br><br>
        <label for="user_id">User Id:</label>
        <input type="text" class="txt" name="user_id" id="user_id"><br><br>
        <label for="password">Password:</label>
        <input type="password" class="txt" name="password" id="password"><br><br>
        <label for="email_id">Email:</label>
        <input type="email" class="txt" name="email_id" id="email_id"><br><br>
        <label for="phone">Phone:</label>
        <input type="text" class="txt" name="phone" id="phone"><br><br>
        <input type="submit" name="create" value="create" class="butn">
    </form>
</body>
</html>