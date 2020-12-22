<?php
    include 'connect.php';
    echo $id = $_GET["id"];
    
    $deleteTeachers = "DELETE FROM teachers WHERE id = '$id'";
    $result = $con->query($deleteTeachers);
    if($result)
        header("Location: index.php");
    else
        echo 'Ma\'lumot o`chmadi :(';
?>
