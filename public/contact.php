<!--    Salzburg University of Applied Sciences
        Multimedia Technology
        Multimedia Project 1
        Creator: Konstantin Kowarsch (part-time-viking)
-->

<?php include "../src/functions.php";

if (isset($_SESSION['USER'])) {
    $session = $_SESSION['USER'];
}
?>

<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <script type="text/javascript" src="http://livejs.com/live.js"></script>
    <link rel="stylesheet" href="contactstyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mailtime!</title>
</head>

<body>

    <div class="container">
        <div class="MessageWindow">
            <?php if (isset($_GET['message'])) {
                echo $_GET['message'];
            } ?>

        </div>

        <div class="title">

            <?php
            if (isset($session)) {
            ?>
                <h3>What do you want me to know, <?php echo $session ?>? </h3> <?php } else { ?>

                <h2>What can I do for you, traveler? </h2> <?php } ?>

        </div><br>

        <div class="content">
            <form action="contactbackend.php" method=POST>
                <div class="user-details">
                    <div class="input-box">
                        <span class="details"></span>
                        <input type="text" placeholder="Enter your email" name="email" required>


                    </div>

                    <div class="input-box">
                        <span class="details"></span>
                        <input type="text" placeholder="Enter a subject" name="subject" required>
                    </div>



                </div>
                <div class="input-box">
                    <span class="details"></span>
                    <textarea id="subject" name="message" placeholder="Write something.." style="height:200px; width:100%; border-radius:10px; font-size:20px;"></textarea>
                </div>
                <div class="button">
                    <input type="submit" value="Send">


                </div>
                <div class="messageAndSend">
                    <a href="../public/index.php?message=fromContact" class="loginButton">Back to the camp, pls!</a>
                </div>

                <div class="input-box">
                </div>


            </form>
        </div>
    </div>







</body>

</html>