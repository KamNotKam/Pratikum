<?php
require_once __DIR__ . "/../db.php";


class Auth {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

    }

    public function login($username, $password) {
        $username = $this->conn->real_escape_string($username);
        $password = md5($password);

        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = $this->conn->query($sql);

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            $_SESSION['username'] = $user['username'];
            $_SESSION['level'] = $user['level'];

            // Redirect sesuai level
            if ($user['level'] == 0) {
                header("Location: pages/admin.php");
            } else {
                header("Location: pages/user.php");
            }
            exit;
        } else {
            return false;
        }
    }

    public function logout() {
        session_destroy();
        header("Location: login.php");
    }

    public function isLoggedIn() {
        return isset($_SESSION['username']);
    }

    public function getUserLevel() {
        return $_SESSION['level'] ?? null;
    }
}
?>
