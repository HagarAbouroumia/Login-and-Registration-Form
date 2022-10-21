<?php

include 'database.php';
include 'user.php';
include 'department.php';

$mailErr = $nameErr = $passErr = $passRepErr  = "";
$mail = $name = "";
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $db = new Database("university");
    $conn = $db->get_conn();
    $user = new User($conn);
    $deps = new Department($conn);
    $_SESSION["deps_result"] = $deps->get_all_departments();

    if (isset($_POST['login'])) {
        if (isEmpty_login() == 1) {
            return;
        }

        if ($user->check_exist($_POST['mail']) == false) {
            $GLOBALS['mailErr'] = "  *account does not exist";
            return;
        }
        if ($user->validate($_POST['mail'], $_POST['password']) == false){
            $GLOBALS['passErr'] = " wrong password";
            $GLOBALS['mail'] = $_POST['mail'];
            return;
        }
    } else if (isset($_POST['signup'])) {
        if (isEmpty_signUp() == 1) {
            return;
        }
        if (check_password() == false) {
            clear_all_fields();
            set_fields();
            $GLOBALS['passErr'] = "  password does not match";
            return;
        }
        $user->insert($_POST['mail'], $_POST['name'], $_POST['password']);
        if ($user->check_exist($_POST['mail']) == true) {
            clear_all_fields();
            $GLOBALS['mailErr'] = " account exist";
            $GLOBALS['mail'] = $_POST['mail'];
            return;
        }
        $user->create();
        clear_all_fields();
    }

    $user->get_fields($_POST['mail']);
    $_SESSION["id"] = $user->get_id();
    $_SESSION["name"] = $user->get_name();
    $_SESSION["mail"] = $user->get_mail();
    $_SESSION["registration_date"] = $user->get_registration_date();
    $db->close_conn();
    header('Location:http://localhost/lab/welcome.php');
    die();
}


function clear_all_fields()
{
    $GLOBALS['mail'] = "";
    $GLOBALS['name'] = "";
    $GLOBALS['password'] = "";
    $GLOBALS['password_repeat'] = "";
}

function set_fields()
{
    $GLOBALS['mail'] = $_POST['mail'];
    $GLOBALS['name'] = $_POST['name'];
}

function isEmpty_login()
{
    $flag = 0;
    if (empty($_POST['mail'])) {
        $flag = 1;
        $GLOBALS['mailErr'] = " *missing field";
    }
    if (empty($_POST['password'])) {
        $flag = 1;
        $GLOBALS['passErr'] = " *missing field";
        $GLOBALS['mail'] = $_POST["mail"];
    }
    return $flag;
}

function isEmpty_signUp()
{
    $flag = 0;
    if (empty($_POST['mail'])) {
        $flag = 1;
        $GLOBALS['mailErr'] = " *missing field";
    }
    if (empty($_POST['name'])) {
        $flag = 1;
        $GLOBALS['nameErr'] = " *missing field";
    }
    if (empty($_POST['password'])) {
        $flag = 1;
        $GLOBALS['passErr'] = " *missing field";
    }
    if (empty($_POST['password_repeat'])) {
        $flag = 1;
        $GLOBALS['passRepErr'] = " *missing field";
    }

    set_fields();
    $GLOBALS['password'] =  $_POST['password'];
    $GLOBALS['password_repeat'] =  $_POST['password_repeat'];
    return $flag;
}

function check_password()
{
    if ($_POST['password'] != $_POST['password_repeat']) {
        return false;
    }
    return true;
}
