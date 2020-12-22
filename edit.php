<?php
    include 'connect.php';

    $id = $_GET["id"];

    $selectTeachers = "SELECT * FROM teachers WHERE id = '$id'";
    $result = $con->query($selectTeachers);
    if($result->num_rows > 0){
        echo '<form method="POST">';
        echo '<table>';
        while($row = $result->fetch_assoc()) {
            echo '<tr>
                    <td>Full name:</td>
                    <td><input type="text" name="full_name" value="'.$row["full_name"].'" required></td>
                </tr>
                <tr>
                    <td>Login:</td>
                    <td><input type="text" name="login" value="'.$row["login"].'" required></td>
                </tr>
                <tr>
                    <td>Parol:</td>
                    <td><input type="text" name="parol" value="'.$row["parol"].'" required><br /></td>
                </tr>
                <tr >
                    <td colspan=2><center><input type="submit" name="save" value="SAVE EDIT"></center></td>
                </tr>';
        }
        echo '</table>';
        echo '</form>';
    }

    if(isset($_POST["save"])){
        $full_name = $_POST["full_name"];
        $login = $_POST["login"];
        $parol = $_POST["parol"];
        
        $updateTeachers = "UPDATE teachers SET full_name='$full_name', login='$login', parol='$parol' WHERE id='$id'";
        
        if ($con->query($updateTeachers) === TRUE) {
            echo '<p style="color: red">Ma\'lumotlar muvoffaqqiyatli o`zgartirildi</p>';
            header("Location: index.php");
        } else {
            echo "Error: " . $updateTeachers . "<br>" . $con->error;
        }
    }

?>
