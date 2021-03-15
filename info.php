<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="info.css">
    <title>Document</title>
</head>

<body>

<header>       
        <a href="donate.php"><div class="icon"></div></a>   
        <div class="head">
            <h2> Contribute Nation </h2>
        </div>  
        <nav>
            <ul>        
                <li><a href="about.php" class="ac">About us</a></li>
                <li><a href="mailto:"contributenation@gmail.com" class="ac">Contact</a></li>
                <li><a href="faq.php" class="ac">FAQ</a></li>
                <li><a href="login.php" class="ac">Login</a></li>
                <li><a href="signup.php" class="ac">Signup</a></li>
            </ul>
        </nav>
    </header>
<br><br>
<div class="i"><div class="ii"><div class="iii"></div></div></div>
<p>We Would like to share a small transaction in our organization.<br> We would be delight and happy to work with you.</p>

<table>
                    <tr class="tbhead">
                      <th>Medicine ID</th>
                      <th>Medicine name</th>
                      <th>Donor Name</th>
                      <th>Receiver Name</th>
                      
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
          
            $sql="SELECT  med_id, med_name, donor_name, receiver_name  from info";
            $query = $dbh -> prepare($sql);
            $query->execute();
            $results=$query->fetchAll(PDO::FETCH_OBJ);

            if($query->rowCount() > 0)
            {
                foreach($results as $row)
                {               
                    ?>   
                            <tr>
                            <td><?php  echo htmlentities($row->med_id);?></td>
                            <td><?php  echo htmlentities($row->med_name);?></td>
                            <td><?php  echo htmlentities($row->donor_name);?></td>
                            <td><?php  echo htmlentities($row->receiver_name);?></td>
                            </tr>      
                    <?php 
                } 
            }
?>
    </table>