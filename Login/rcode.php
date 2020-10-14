<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recover code</title>
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
    </style>
</head>
<body>
    <form action="" method="POST">
        <h2>Enter Code</h2><hr>
        <input type="text" placeholder="Type here..." class="txt" name="rcode" id="rcode"/><br><br>
        <input type="submit" name="go" value="go" class="butn">
    </form>
</body>
</html>