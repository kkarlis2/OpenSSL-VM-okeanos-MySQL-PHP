<html>
<head>
    <title>Login</title>
</head>
<body>
    <form method="post" action="login.php">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username">
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
        <br>
        <input type="submit" name="submit" value="Login">
    </form>
</body>
</html>


<?php

class ConnectionPool {
    private static $instance;
    private $conn;

    private function __construct() {
        $this->conn = new mysqli("localhost", "root", "Kostaskarlis2001", "GDPR");
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new ConnectionPool();
        }
        return self::$instance->conn;
    }
}

function check_login_attempts($username) {
    global $conn;
    $num_attempts = 1;
    $query = "SELECT COUNT(*) FROM logging WHERE username = '$username' AND success = 0";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $num_attempts = mysqli_fetch_row($result)[0];
    }
    if ($num_attempts >= 3) {
        return "Your account has been locked due to too many failed login attempts. Please contact an administrator to unlock your account.";
    } else {
        return "Login fail.You have " . (3 - $num_attempts) . " login attempts remaining before your account is locked.";
    }
}

function check_password_change($username) {
    global $conn;
    $last_change = "";
    $query = "SELECT last_password_change FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $last_change = mysqli_fetch_row($result)[0];
    }
    $interval = floor((time() - strtotime($last_change)) / (60 * 60 * 24));
    if ($interval >= 90) {
        
        return "Your password has expired. Please change your password to continue.";
    } else {
        return "";
    }
}

$conn = ConnectionPool::getInstance();

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//check if the form has been submitted
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password = hash('sha256', $password);
    
    //query the database to check if the user exists
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($query);


    //if the user exists, log them in
    if ($result->num_rows > 0) {
        session_start();
        $_SESSION['username'] = $username;
        

        //check login attempts
        $login_attempts_message = check_login_attempts($username);
        if($login_attempts_message!="Your account has been locked due to too many failed login attempts. Please contact an administrator to unlock your account."){
            //insert values to logging
            $success=1;
            $query = "INSERT INTO logging (username,success) VALUES ('$username',$success)";
            $result = mysqli_query($conn, $query);
            echo "<script>alert('Login success');</script>";
            //check password change
            $password_message=check_password_change($username);
            if($password_message!=""){
                echo $password_message;
            }
        }else{
            echo $login_attempts_message;
        }
        

    } else {
        $login_attempts_message = check_login_attempts($username);
        if($login_attempts_message!="Your account has been locked due to too many failed login attempts. Please contact an administrator to unlock your account."){
            //insert values to logging
            $success=0;
            $query = "INSERT INTO logging (username,success) VALUES ('$username',$success)";
            $result = mysqli_query($conn, $query);
            echo $login_attempts_message;
        }else{
            echo $login_attempts_message;
        }
    
        
        
        
    }
}

?>