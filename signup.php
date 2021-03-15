<?php
  if(isset($_POST['signup'])){
	$name = $_POST['name'];
	$email = $_POST['email'];
  $password = $_POST['password'];
  $address = $_POST['address'];
  $pincode = $_POST['pincode'];
  $phone = $_POST['phone'];

    // Database connection
	$conn = new mysqli('localhost','root','','donate');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ".$conn->connect_error);
    } else {
		$stmt = $conn->prepare("insert into volunteers(name,email,password,address,pincode, phone) values(?, ?, ?, ?, ?,?)");
		$stmt->bind_param("ssssis", $name, $email, $password,$address,$pincode, $phone);
		$execval = $stmt->execute();
		//echo $execval;
		//echo "<script>alert('Successful');</script>";
		if($execval){
			//echo "abcd";
			echo "<script>alert('Successful');</script>";
      echo '<script>window.location.href = "login.php";</script>';
		}
		$stmt->close();
		$conn->close();
	}}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="signup1.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  </head>
  <body>
  <header>       
        <a href="donate.php"><div class="icon"></div></a>   
        <div class="head">
          <h2> Contribute Nation </h2>
        </div>  
  </header>
  
  <div class="i"></div>
  <div class="ii"></div>
  <br><br>
   <div class="center">
      <div class="container">
         <a href="donate.php"><label for="" class="close-btn fas fa-times" title="close"></label></a>
         <div class="text">Registration Form</div>
        <form action="" method="POST" name="signup">

          <div class="data">
            <label>Name</label>
            <input type="text" name="name" required>
          </div>

          <div class="data">
            <label>Email</label>
            <input type="text" name="email" required>
          </div>

          <div class="data">
            <label>Password</label>
            <input type="password" name="password" required>
          </div>

          <div class="data">
            <label>Address</label>
            <input type="text" name="address" required>
          </div>

          <div class="data">
            <label>pincode</label>
            <input type="number" name="pincode" required>
          </div>

          <div class="data">
            <label>phone_no</label>
            <input type="text" name="phone" required>
          </div>

          <div class="btn">
            <div class="inner">
            </div>
            <button type="submit" name="signup">Submit</button>
          </div>

          <div class="signup-link">Already a member? <a href="login.php">Login now</a></div>
        </form>
      </div>
</body>
</html>
