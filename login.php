<?php
  error_reporting(0);
  if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // include('includes/dbconnect.php');

// DB credentials.
            define('DB_HOST','localhost');
            define('DB_USER','root');
            define('DB_PASS','');
            define('DB_NAME','donate');

            // Establish database connection.
            try
            {
            $dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            }
            catch (PDOException $e)
            {
            exit("Error: " . $e->getMessage());
            }


    $sql="SELECT email, password from volunteers WHERE email = '$email' and password = '$password'";
    $query = $dbh -> prepare($sql);
    $result = $query->execute(array(':email' => $email , ':password' => $password));
    $row = $query -> fetch(PDO::FETCH_ASSOC);

    if ($row['email'] == $email && $row['password'] == $password) 
    {
        
        // $_SESSION['username']=$username;    
        // //header ('Location: membre.php');
       // header('Location:display.php'.$_GET['previouspage']);
        echo '<script>window.location.href = "display.php";</script>';
    }
    else {
      echo '<script>alert("Login Unsuccesful")</script>';
        //  header('Location:login.php',$GET['previouspage']);
    }}
?>

<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
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
   <div class="center">
    <div class="container">
        <a href="donate.php"><label for="" class="close-btn fas fa-times" title="close"></label></a>
      <div class="text">Login Form</div>
        <form action="" method="POST" name="login" onsubmit="return Validate()">

          <div class="data">
            <label>Email</label>
            <input type="text" name="email" required>
          </div>


      
          <div class="data">
            <label>Password</label>
            <input type="password" name="password" required>
          </div>


          <div class="btn">
            <div class="inner">
            </div>
            <button type="submit" name="login">Login</button>
          </div>

          <div class="signup-link">Not a member? <a href="signup.php">Signup now</a></div>
        </form>
      </div>
  </div>
  <script type="text/javascript">
                function Validate() {
                    console.log("Validate method");
                    var email = document.getElementById("email").value;
                    var password = document.getElementById("password").value;
                    if ( email == <?php $email ?>  & password == <?php $password ?>) { 
                        return true;
                    }else{
                      alert("Login Unsuccessful");
                    return false;
                }
                }
            </script>
</body>
</html>
