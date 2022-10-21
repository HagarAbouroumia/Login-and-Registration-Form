<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="signup.css">
</head>

<body>
    <?php include 'val.php'; ?>
    <form action="" method = "post" class="form_style">
        <div class="container">
            <h1>Sign Up</h1>
            <hr>

            <label for="mail"><b>Mail</b></label>
            <span class="error"> <?php echo $mailErr; ?></span>
            <input type="text" placeholder="Enter Mail" name="mail" value="<?php echo $mail;?>">

            <label for="name"><b>Name</b></label>
            <span class="error"> <?php echo $nameErr; ?></span>
            <input type="text" placeholder="Enter Name" name="name" value="<?php echo $name; ?>">

            <label for="password"><b>Password</b></label>
            <span class="error"> <?php echo $passErr; ?></span>
            <input type="password" placeholder="Enter Password" name="password" value="<?php echo $password; ?>">

            <label for="password_repeat"><b>Repeat Password</b></label>
            <span class="error"> <?php echo $passRepErr; ?></span>
            <input type="password" placeholder="Repeat Password" name="password_repeat" value="<?php echo $password_repeat; ?>">
            <br><br>
            <br><br>            

            <div class="clearfix">
            <button type="submit" class="signupbtn" name="signup">Sign Up</button>    
            <button type="button" class="cancelbtn" onclick="window.location='login.php'">Log In</button>                
            </div>
        </div>
    </form>

</body>

</html>