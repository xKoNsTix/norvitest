<!--    Salzburg University of Applied Sciences
        Multimedia Technology
        Multimedia Project 1
        Creator: Konstantin Kowarsch (part-time-viking)
-->


<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>Sign up! </title>
    <link rel="stylesheet" href="registerstyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <h1>Become a norviking!</h1>
        </div>
        <div class="content">
            <form action="registerbackend.php" method=POST>
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Full Name</span>
                        <input type="text" placeholder="Enter your name" name="name" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Username</span>
                        <input type="text" placeholder="Enter your username" name="user" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="text" placeholder="Enter your email" name="email" pattern="[^ @]*@[^ @]*" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Password</span>
                        <input type="password" placeholder="Enter your password" name="password1" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Confirm Password</span>
                        <input type="password" placeholder="Confirm your password" name="password2" required>
                    </div>
                </div>

                <div class="button">
                    <input type="submit" value="Register">

                </div>

                <p> By becoming a member you generally agree with the <a href="../public/toc.php">rules of the north</a>. <br> </p>

                <a href="../public/index.php?message=fromRegister" class="loginButton">🥶🦶 </a>



            </form>
        </div>
    </div>



</body>

</html>