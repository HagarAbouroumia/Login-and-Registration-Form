<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Log In</title>
    <link rel="stylesheet" href="welcome.css">
</head>

<body>
    <?php session_start(); include "database.php"; include "department.php"?>
    <form action="" method="post" style="border:1px solid #ccc">
        <div class="container">
            <h1>Welcome <?php echo $_SESSION['name'] ?></h1>
            <hr>

            <label for="id"><b>ID</b></label>
            <input type="text" name="id" value="<?php echo $_SESSION["id"]; ?>" required>

            <label for="mail"><b>Mail</b></label>
            <input type="text" name="mail" value="<?php echo $_SESSION["mail"]; ?>" required>

            <label for="name"><b>Name</b></label>
            <input type="text" name="name" value="<?php echo $_SESSION["name"]; ?>" required>


            <label for="registration_date"><b>Registration Date</b></label>
            <input type="text" name="registration_date" value="<?php echo $_SESSION["registration_date"]; ?>" required>


            <span class="error"> <?php echo $account_exit; ?></span>

            <div class="clearfix">
            </div>
        </div>
    </form>
    <h1> Departments Available</h1>
    <table>
        <tr>
            <th>Department</th>
            <th>Description</th>
        </tr>
        <?php
        $db = new Database("university");
        $conn = $db->get_conn();
        $deps = new Department($conn);
        $result = $deps->get_all_departments();
        while ($rows = $result->fetch_assoc()) {
        ?>
            <tr>
                <td><?php echo  $rows['name']; ?></td>
                <td><?php echo $rows['description']; ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
    <button type="submit" onclick="window.location='login.php'" class="signinbtn">Sign Out</button>

</body>

</html>