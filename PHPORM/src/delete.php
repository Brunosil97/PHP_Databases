<?php
    require_once "../bootstrap.php";

    $id = $_GET["Pid"];

    $person = $entityManager->find('Person', $id);
    $entityManager->remove($person);
    $entityManager->flush();

    header("Location: list.php");
?>