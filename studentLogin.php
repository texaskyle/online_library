<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <p>Enter your details to login</p>
    <form action="includes/login.inc.php" method="POST">
        <input type="text" name="username" placeholder="Username"><br><br>
        <input type="password" name="pwd" placeholder="Password"><br><br>
        <button type="submit" name="login_submit">Login</button>
    </form>

    <!-- student who has not logged in to register -->
    <p>Register first if you are not in the system</p>
    <a href="registration.php">sign up</a>

</body>

</html>