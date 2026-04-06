<?php
session_start();

?>


<?php
require_once 'config.php';

// here you will later handle the form submission
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    // 1) Basic validation
    if ($username === '') {
        $errors[] = 'Username is required.';
    }

    if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'A valid email is required.';
    }

    if (strlen($password) < 6) {
        $errors[] = 'Password must be at least 6 characters.';
    }

    if ($password !== $confirm_password) {
        $errors[] = 'Passwords do not match.';
    }

    // 2) Check if username or email already exists
    if (empty($errors)) {
        $sql = 'SELECT user_id FROM tbl_users WHERE user_name = ? OR user_email = ? LIMIT 1';
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 'ss', $username, $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) > 0) {
            $errors[] = 'Username or email is already taken.';
        }

        mysqli_stmt_close($stmt);
    }

    // 3) Insert new user if no errors
    if (empty($errors)) {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
$user_address="test";
        $insert_sql = 'INSERT INTO tbl_users (user_name, user_email, user_pass,user_address) VALUES (?, ?, ?,?)';
        $insert_stmt = mysqli_prepare($conn, $insert_sql);
        mysqli_stmt_bind_param($insert_stmt, 'ssss', $username, $email, $password_hash,$user_address);

        if (mysqli_stmt_execute($insert_stmt)) {
            // Successful registration: redirect to login page
            header('Location: logIn.php');
            exit;
        } else {
            $errors[] = 'Something went wrong. Please try again.';
        }

        mysqli_stmt_close($insert_stmt);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>




<form method="post" action="register.php" id="register-form">
    <h2>Register</h2>
	

<?php if (! empty($errors)): ?>
    <div class="error-messages">
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?php echo htmlspecialchars($error); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

    <label>Username</label>
    <input type="text" name="username" required>

    <label>Email</label>
    <input type="email" name="email" required>

    <label>Password</label>
    <input type="password" name="password" required>

    <label>Confirm Password</label>
    <input type="password" name="confirm_password" required>

    <button type="submit" name="register">Create Account</button>

    <p>Already have an account? <a href="logIn.php">Login here</a></p>
</form>

</body>
</html>