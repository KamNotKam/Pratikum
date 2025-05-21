<?php
require_once "classes/Auth.php";

$auth = new Auth();
$username = $_POST['username'];
$password = $_POST['password'];

if (!$auth->login($username, $password)) {
    echo "Login gagal. Username atau password salah.";
}
