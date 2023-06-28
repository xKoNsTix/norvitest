<!--    Salzburg University of Applied Sciences
        Multimedia Technology
        Multimedia Project 1
        Creator: Konstantin Kowarsch (part-time-viking)
-->

<?php include "../src/functions.php"; ?>
<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Login </title>
    <link rel="stylesheet" href="loginstyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <div class="container">
        <div class="MessageWindow">
            <?php if (isset($_GET['message'])) {
                echo $_GET['message'];
            } ?>

        </div>
        <div class="title">
            <h2>Login, brave viking!</h2>
        </div><br>

        <div class="content">
            <form action="loginbackend.php" method=POST>
                <div class="button">


                </div>
                <div class="user-details">
                    <div class="input-box">
                        <span class="details"></span>
                        <input type="text" placeholder="Enter your username" name="username" required>


                    </div>

                    <div class="input-box">
                        <span class="details"></span>
                        <input type="password" placeholder="Enter your password" name="password" required>
                        <div class="button">
                            <input type="submit" value="Login">
                        </div>
                    </div>

                    <a href="../public/index.php?message=fromLogin" class="loginButton">Back to the camp, pls!</a>
                    <a href="../auth/register.php?message=I%20am%20glad%20you%20finally%20found%20your%20way!" class="loginButton">Become a member</a>
                </div>
            </form>
        </div>
    </div>



</body>

</html>