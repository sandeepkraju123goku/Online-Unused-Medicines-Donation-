<?php
  if(isset($_POST['donar'])){
	$med_name = $_POST['med_name'];
  $med_brand = $_POST['med_brand'];
  $med_quantity = $_POST['med_quantity'];
  $exp_date = $_POST['exp_date'];
 
	$conn = new mysqli('localhost','root','','donate');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ".$conn->connect_error);
    } else {
		$stmt = $conn->prepare("insert into medicine(med_name,med_brand,med_quantity,exp_date) values(?, ?, ?,?)");
		$stmt->bind_param("ssis", $med_name, $med_brand, $med_quantity,$exp_date);
		$execval = $stmt->execute();
		//echo $execval;
		//echo "<script>alert('Successful');</script>";
		if($execval){
			//echo "abcd";
			echo "<script>alert('Successful');</script>";
      echo '<script>window.location.href = "display.php";</script>';
		}
		$stmt->close();
		$conn->close();
	}}
?>

<html lang="en">
<head>
  <link rel="stylesheet" href="display1.css">
  <title>Document</title>
</head>
<body>
  <div class="iii"></div>
<header>       
        <a href="donate.php"><div class="icon"></div></a>   
        <div class="head">
          <h2> Contribute Nation </h2>
        </div>  
  </header>
  <br><br>
 
<button class="tablink" onclick="openPage('Contact', this, '#555')" default="default" >Donate</button>
<button class="tablink" onclick="openPage('About', this, '#555')">Available Medicines</button>


<div id="Contact" class="tabcontent">
<div class="container">
        <form action="#" method="POST" name="donar">

          <div class="data">
            <label>Medicine Name</label>
            <input type="text" name="med_name" required>
          </div>

          <div class="data">
            <label>Medicine Brand</label>
            <input type="text" name="med_brand" required>
          </div>

          <div class="data">
            <label>Expiry Date</label>
            <input type="date" name="exp_date" required>
          </div>

          <div class="data">
            <label>Quantity</label>
            <input type="text" name="med_quantity" required>
          </div>

 
          <div class="btn">
          <div class="inner">
            </div>
          <button type="submit" name="donar" >Submit</button>
          </div>
</div>
<div class="i"></div>
<div class="ii"></div>
</div>

<div id="About" class="tabcontent">
<br><br>
  <p>You can <a href="mailto:contributenation@gmail.com" >contact us</a> anytime and collect the medicines</p>

<table>
  <tr class="tbhead"> 
  <th>Medicine name</th>
  <th>Medicine Brand</th>
  <th>Expiry Date</th>
  <th>Quantity</th>
  </tr>
  <?php 
    
            // include('includes/dbconnect.php');
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
          
            $sql="SELECT  med_name, med_brand, med_quantity, exp_date from medicine";
            $query = $dbh -> prepare($sql);
            $query->execute();
            $results=$query->fetchAll(PDO::FETCH_OBJ);

            if($query->rowCount() > 0)
            {
                foreach($results as $row)
                {               
                    ?>   
                            <tr>
                            <td><?php  echo htmlentities($row->med_name);?></td>
                            <td><?php  echo htmlentities($row->med_brand);?></td>
                            <td><?php  echo htmlentities($row->exp_date);?></td>
                            <td><?php  echo htmlentities($row->med_quantity);?></td>
                            </tr>      
                    <?php 
                } 
            }
?>
    </table>
    <div class="i"></div>
<div class="ii"></div>
</div>
<script src="display1.js"></script>
</body>
</html>