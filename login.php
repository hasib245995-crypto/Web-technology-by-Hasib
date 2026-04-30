<?php
session_start();
include "config.php";

$email_cookie = isset($_COOKIE['user_email']) ? $_COOKIE['user_email'] : "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {

            // Session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];

            // Cookie: store email (7 days)
            setcookie("user_email", $email, time() + (7 * 24 * 60 * 60));

            // Cookie: last login time
            setcookie("last_login", date("Y-m-d H:i:s"), time() + (7 * 24 * 60 * 60));

            header("Location: dashboard.php");
            exit();
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "User not found!";
    }
}
?>

<form method="POST">
    <h2>Login</h2>
    Email: <input type="email" name="email" value="<?php echo $email_cookie; ?>" required><br>
    Password: <input type="password" name="password" required><br>
    <button type="submit">Login</button>
</form>