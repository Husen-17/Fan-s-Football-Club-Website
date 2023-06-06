<?php
// Connect to database
$host = '127.0.0.1';
$username = 'root';
$password = 'root';
$dbname = 'se';

$conn = mysqli_connect($host, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


// Get email and password from POST request
$email = $_POST['email'];
$password = $_POST['password'];
if ($email == "" || $password == "") {
    echo "nothing";
    exit();
}

// Check if email is in the database of fans
$sql = "SELECT * FROM fans WHERE email = '$email'";
$result = mysqli_query($conn, $sql);
if (!$result) {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    exit;
}

if (mysqli_num_rows($result) == 0) {
    // Email not found in fans database
    $sql = "SELECT * FROM manager WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        exit;
    }

    if (mysqli_num_rows($result) == 0) {
        // Email not found in managers database
        echo "no-email";
        exit;
    }

    // Check if password is correct for manager
    $row = mysqli_fetch_assoc($result);
    if ($password == $row['password']) {
        // Start the session
        session_start();
        $_SESSION["email"] = $email;
        $id = $row["id"];
        $_SESSION["id"] = $id;
        $fname = $row["fname"];
        $_SESSION["fname"] = $fname;
        $lname = $row["lname"];
        $_SESSION["USERNAME"] = $fname . " " . $lname;
        $_SESSION["admin"] = true;
        if (isset($_POST['remember_me'])) {
            // Set a cookie to remember the user's login information
            setcookie('login_email', $email, time() + (86400 * 30), "/"); // Expires after 30 days
            setcookie('login_password', $password, time() + (86400 * 30), "/"); // Expires after 30 days
        } else {
            setcookie('login_email', '', time() - 3600, '/');
            setcookie('login_password', '', time() - 3600, '/');
            // Unset the cookie variable
            unset($_COOKIE['login_email']);
            unset($_COOKIE['login_passowrd']);
        }
        echo "ok-manager";
        exit;
    } else {
        echo "incorrect";
        exit;
    }
}

// Check if password is correct for fan
$row = mysqli_fetch_assoc($result);
if ($password == $row['password']) {
    // Start the session
    session_start();
    $_SESSION["email"] = $email;
    $id = $row["id"];
    $_SESSION["id"] = $id;
    $fname = $row["fname"];
    $_SESSION["fname"] = $fname;
    $lname = $row["lname"];
    $_SESSION["USERNAME"] = $fname . " " . $lname;
    if (isset($_POST['remember_me'])) {
        // Set a cookie to remember the user's login information
        setcookie('login_email', $email, time() + (86400 * 30), "/"); // Expires after 30 days
        setcookie('login_password', $password, time() + (86400 * 30), "/"); // Expires after 30 days
    } else {
        setcookie('login_email', '', time() - 3600, '/');
        setcookie('login_password', '', time() - 3600, '/');
        // Unset the cookie variable
        unset($_COOKIE['login_email']);
        unset($_COOKIE['login_passowrd']);
    }
    echo "ok-fan";
    exit;
} else {
    echo "incorrect";
    exit;
}

?>