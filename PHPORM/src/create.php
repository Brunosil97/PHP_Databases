<?php
    require_once "../bootstrap.php";

    if(isset($_POST["fname"]) && isset($_POST["lname"]) && isset($_POST["email"]))
    {
        $firstname = $_POST["fname"];
        $lastname = $_POST["lname"];
        $email = $_POST["email"];

        $newPerson = new Person();
        $newPerson->setFirstName($firstname);
        $newPerson->setLastName($lastname);
        $newPerson->setEmail($email);

        $entityManager->persist($newPerson);
        $entityManager->flush();

        header("Location: list.php");
    }    
?>

<html>
<body>
<h1>Doctrine (MySQL)</h1>
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

