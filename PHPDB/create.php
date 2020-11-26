<html>
<body>
<br />
<a href="index.php">menu</a>
<br />
<form action="#" method="post">
    <label for="fname">First name:</label><br>
    <input type="text" id="fname" name="fname" value="John"><br>
    <label for="lname">Last name:</label><br>
    <input type="text" id="lname" name="lname" value="Smith"><br><br>
    <label for="email">Last name:</label><br>
    <input type="text" id="email" name="email" value="John.Smith@test.com"><br><br>
    <input type="submit" value="Submit">
</form>
</body>
</html>

<?php
    if(isset($_POST["fname"]) && isset($_POST["lname"]) && isset($_POST["email"]))
    {
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
        
        // // prepare and bind the INSERT query - protects against SQL injection attacks
        // $stmt = $conn->prepare("INSERT INTO Person (firstname, lastname, email) VALUES (?, ?, ?)");
        // $stmt->bind_param("sss", $firstname, $lastname, $email);
        
        // // set parameters and execute
        // $firstname = $_POST["fname"];
        // $lastname = $_POST["lname"];
        // $email = $_POST["email"];

        //PDO
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // prepare sql and bind parameters using PDO
        $stmt = $conn->prepare("INSERT INTO Person (firstname, lastname, email) 
        VALUES (:firstname, :lastname, :email)");
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':email', $email);
        
        // set parameters and execute
        $firstname = $_POST["fname"];
        $lastname = $_POST["lname"];
        $email = $_POST["email"];
        $stmt->execute();


        $conn = null;
    }    
?>