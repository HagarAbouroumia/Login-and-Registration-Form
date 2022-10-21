<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Log In</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <?php include 'val.php'; ?>
    <form action="" method="post" class="form_style">
        <div class="container">
            <h1>Log In</h1>
            <hr>

            <label for="mail"><b>Mail</b></label>
            <span class="error"> <?php echo $mailErr; ?></span>
            <input type="text" placeholder="Enter Mail" name="mail" value="<?php echo $mail; ?>">

            <label for="password"><b>Password</b></label>
            <span class="error"> <?php echo $passErr; ?></span>
            <input type="password" placeholder="Enter Password" name="password" value="<?php echo $password; ?>">

            <br><br>
            <br><br>

            <div class="clearfix">                
                <button type="submit" class="signupbtn" name = "login" >Log In</button>
                <button type="button" class="cancelbtn" onclick="window.location='signup.php'">Sign Up</button>
            </div>
        </div>
    </form>

</body>

</html>