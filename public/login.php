<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if ($_POST["username"] === "admin" && $_POST["password"] === "ngo@food") {
        $_SESSION["admin"] = true;
        header("Location: view_donations.php");
        exit;
    } else {
        $error = "Invalid credentials.";
    }
}
?>
<form method="POST">
    <input name="username" placeholder="Username" required>
    <input name="password" type="password" placeholder="Password" required>
    <button type="submit">Login</button>
    <?php if (!empty($error)) echo $error; ?>
</form>
