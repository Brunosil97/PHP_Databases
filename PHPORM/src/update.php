<?php
    require_once "../bootstrap.php";
?>

<html>
<head>

<?php
    $id = $_GET["Pid"];
    $person = $entityManager->find('Person', $id);

    if($person === null) {
        echo "No person found.\n";
    }

    if(isset($_POST["fname"]) && isset($_POST["lname"]) && isset($_POST["email"]))
    {
        $firstname = $_POST["fname"];
        $lastname = $_POST["lname"];
        $email = $_POST["email"];

        $person->setFirstName($firstname);
        $person->setLastName($lastname);
        $person->setEmail($email);

        $entityManager->flush();

        header("Location: list.php");
    }  
?>
</head>
<body>
<h1>Doctrine (MySQL)</h1>
<br />
<a href="index.php">menu</a>
<br />
<form action="#" method="post">
    <label for="fname">First name:</label><br>
    <input type="text" id="fname" name="fname" value=<?php print $person->getFirstName() ?>><br>
    <label for="lname">Last name:</label><br>
    <input type="text" id="lname" name="lname" value=<?php print $person->getLastName() ?>><br><br>
    <label for="email">Last name:</label><br>
    <input type="text" id="email" name="email" value=<?php print $person->getEmail() ?>><br><br>
    <input type="submit" value="Submit">
</form>
</body>