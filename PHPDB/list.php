<html>
<head>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "Marinasil87";
    $dbname = "phpsampledb";        
    
    // open MySQL connection
    // $conn = new mysqli($servername, $username, $password, $dbname);
    
    // // only proceed if connection is healthy
    // if ($conn->connect_error) {
    //     die("MySQL Connection failed: " . $conn->connect_error);
    // }
    
    // $sql = "SELECT id, firstname, lastname, email FROM Person";
    // $result = $conn->query($sql);  

    //Using PDO to connect to database
    try{
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
    } catch(PDOException $e) {
        echo "Connection failed: ". $e->getMessage();
    }

    $sql = "SELECT id, firstname, lastname, email FROM Person";
?>
</head>
<body>
<br />
<a href="index.php">menu</a>
<br />
    <table>
    <tr>
    <th>Id</th>
    <th>FirstName</th>
    <th>LastName</th>
    <th>Email</th>
    </tr>
    <?php foreach($conn->query($sql) as $row) { ?>
        <tr>
            <td><?php print $row["id"] ?></td>
            <td><?php print $row["firstname"] ?></td>
            <td><?php print $row["lastname"] ?></td>
            <td><?php print $row["email"] ?></td>
        </tr>
    <?php } ?>
    </table>
</body>
</html>