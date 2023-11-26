<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registration Form</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <form action="login.php" method="post">
        <h2>REGISTER</h2>
        <?php if(isset($_GET['error'])) { ?>
        <p class="error"> <?php echo $_GET['error']; ?></p>
    <?php } ?>
    <label> User Name</label>
   <input type="text" name="uname" placeholder="User Name"><br> 
    <label>Email</label>
    <input type="text" name="email" placeholder="Email"><br>
    <label>Password</label>
    <input type="password" name="password" placeholder="Password"><br>
    <label>Confirm Password</label>
    <input type="confirm password" name="confirmpassword" placeholder="Confirm Password"><br>
      <button type="submit">Log In</button>
        </form>
</body>
</html>