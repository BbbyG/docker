<?php
	$servername = "localhost:3306";
	$usernameDB = "root";
	$passwordDB = "";
	$database = "registerDB";

	$conn = mysqli_connect($servername, $usernameDB, $passwordDB, $database);

  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());}

	if (isset($_POST['submit'])) {
    $user = $_POST['user'];
    $checkName = "select * from register where user = '$user'";
    $result = mysqli_query($conn, $checkName);

    if (mysqli_num_rows($result) > 0) {
      echo "<b style='color:red;'>This username is taken.</b><br><br>";}
    else {
		  $password = $_POST['password'];

      $password = password_hash($password, PASSWORD_BCRYPT);
		  $sql = "insert into register(user, password) values (?, ?)";
		  $conn->prepare($sql)->execute([$user, $password]);}}

  if (isset($_POST['login'])) {
    header("location: login.php");}?>

<html>
<head></head>
<body>

<form method="post">
  <label>Потребителско име:</label><br>
  <input type="text" name="user" autocomplete="OFF"><br>
  <label>Парола:</label><br>
  <input type="text" name="password" autocomplete="OFF"><br>

  <input type="submit" name="submit" value="Регистрирай се">
  <input type="submit" name="login" value="Влез">
  </form>
	
</body>
</html>
