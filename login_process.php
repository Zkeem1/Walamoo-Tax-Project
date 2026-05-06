<?php
// Assuming you have stored the registered username and password in variables
$registered_username = "example_username";
$registered_password = "example_password";

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve username and password from the form
    $username = $_POST['Username'];
    $password = $_POST['password'];

    // Check if the entered username and password match the registered ones
    if ($username === $registered_username && $password === $registered_password) {
        // Redirect to menu.html if login is successful
        header("Location: menu.html");
        exit();
    } else {
        // Redirect back to login page with an error message
        $error = "Incorrect username or password.";
        header("Location: login.php?error=" . urlencode($error));
        exit();
    }
}
?>
