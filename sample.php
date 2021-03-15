<html>
    <head>
        <title> Sampele PHP</title>
    </head>
    <body>
    <h1>Hi there</h1>
        
        <?php 
            // DB credentials.
            define('DB_HOST','localhost');
            define('DB_USER','root');
            define('DB_PASS','');
            define('DB_NAME','sample');

            // Establish database connection.
            try
            {
            $dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            }
            catch (PDOException $e)
            {
            exit("Error: " . $e->getMessage());
            }

            

            $sql="SELECT * from student";
            $query = $dbh -> prepare($sql);
            $query->execute();
            $results=$query->fetchAll(PDO::FETCH_OBJ);

            if($query->rowCount() > 0)
            {
                foreach($results as $row)
                {               
                    ?>   
                        <table>
                            <tr>
                            <td><?php  echo htmlentities($row->id);?></td>
                            <td><?php  echo htmlentities($row->name);?></td>
                            <td><?php  echo htmlentities($row->phone);?></td>
                            </tr>      
                    <?php 
                } 
            }
?>
    </table>
</body>
    </body>
</html>