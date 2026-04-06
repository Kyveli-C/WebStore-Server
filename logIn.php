<?php
session_start();
require_once 'config.php';

$login_error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($username === '' || $password === '') {
        $login_error = 'Please fill in both fields.';
    } else {
        $sql = 'SELECT user_id, user_name, user_pass FROM tbl_users WHERE user_name = ? LIMIT 1';
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 's', $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) === 1) {
            mysqli_stmt_bind_result($stmt, $id, $db_username, $db_password_hash);
            mysqli_stmt_fetch($stmt);

            if (password_verify($password, $db_password_hash)) {
                // Password correct: log the user in
               $_SESSION['user_id'] = $id;
                $_SESSION['Username'] = $db_username;

                header('Location: index.php');
                exit;
            } else {
                $login_error = 'Invalid username or password.';
            }
        } else {
            $login_error = 'Invalid username or password.';
        }

        mysqli_stmt_close($stmt);
    }
}
?>

<!DOCTYPE html>
<html>

<head>
<title> Log In </title>

	<link rel="stylesheet" href="stylesheet.css" > <!-- link to the stylesheet -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8"> <!--to recognise the pound icon-->

</head>

<link rel="stylesheet" href="stylesheet.css" >


<body>
 <header>  
    
	     <div class="logo"> <img src="logo_reverse.png"  alt="logo">
	 
           <nav class="fullScreen" >
             <a href="index.php">Home</a>  
			 <a href="logIn.php">Sign In</a>			 
             <a href="products.php">Products</a>   
             <a href="cart.php">Cart</a>
			 <a href="logout.php">Log Out</a>

           </nav>
       
	     </div>

        <a href="javascript:void(0);" class="icon" onclick="toggleMenu()">
        <i class="fa fa-bars" style="font-size:28px; color:white;"></i>
        </a>
  
     </header>
   <br> <br>

<form method="post" action="logIn.php" id="login-form">
    <h2>Login</h2>

    <?php if ($login_error !== ''): ?>
    <div class="error-messages">
        <?php echo htmlspecialchars($login_error); ?>
    </div>
<?php endif; ?>

    <label>Username</label>
    <input type="text" name="username" required>

    <label>Password</label>
    <input type="password" name="password" required>

    <button type="submit" name="login">Login</button>

    <p>Don't have an account? <a href="register.php">Register here</a></p>
</form>
 <script>
 
 function myCheck()
	{
		let p = document.forms["form1"]["password"].value;
		
		if (p==="password")
		{
			alert("The password is not secure");
			return false;
		}
		return true;
	}
 
 </script>


</body>

</html>