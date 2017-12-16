<?php
  session_start();
  $error = "";
  include('config.php');
  include('header.html');

  if(isset($_POST['submit'])){
  	if(empty($_POST['username']) || empty($_POST['password'])) {
  		$error = "Username or password is invalid";
  	} else {
  		$username = $_POST['username'];
  		$password = $_POST['password'];
  		$username = stripslashes($username);
		$password = stripslashes($password);
		$username = mysql_real_escape_string($username);
		$password = mysql_real_escape_string($password);

		 $sql = "SELECT user_id FROM user WHERE username = '$username' and password = '$password'";
    $query = mysql_query($sql, $conn);
    $rows = mysql_num_rows($query);
    if($rows == 1){
    	$_SESSION['login_user'] = $username;
    	header("location: homepage.php");

    } else {
    	$error = "Username or Password is invalid";
    }
  mysql_close($conn);
}
}
?>


<form action="" method="POST">
  <div class="container">
  	<h2 class="login-title">Login Form</h2>
    <input type="text" placeholder="Enter Username" name="username" required>
    <input type="password" placeholder="Enter Password" name="password" required>
    <button name = 'submit' type="submit">Login</button>
    <span id = "login-error"><?php echo $error; ?></span>
  </div>
</form>
</body>
</html>