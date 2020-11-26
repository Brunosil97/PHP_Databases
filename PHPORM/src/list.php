<?php
    require_once "../bootstrap.php";
?>

<html>
<head>
<?php
  $personRepository = $entityManager->getRepository('Person');
  $persons = $personRepository->findAll();
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
    <?php foreach($persons as $person) { ?>
        <tr>
            <td><?php print $person->getId() ?></td>
            <td><?php print $person->getFirstName() ?></td>
            <td><?php print $person->getLastName() ?></td>
            <td><?php print $person->getEmail() ?></td>
            <td><a href="update.php?Pid=<?php print $person->getId() ?>">update</a></td>
            <td><a href="delete.php?Pid=<?php print $person->getId() ?>">delete</a></td>

        </tr>
    <?php } ?>
    </table>
</body>
</html>