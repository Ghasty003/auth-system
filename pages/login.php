<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        input {
            margin: 5px 0;
        }
    </style>
</head>

<body>
    <h1>Weclome. Login.</h1>

    <form action="../config/login.php" method="post">
        <input type="text" name="username" placeholder="username"> <br>
        <input type="text" name="password" placeholder="password"> <br>
        <button name="login-submit">Login</button>
    </form>
</body>

</html>