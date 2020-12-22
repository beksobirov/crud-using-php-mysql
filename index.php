<!Doctype html>
<?php 
    include "connect.php";

    if(isset($_POST["submit"])){
        $fullname=$_POST["fullname"];
        $login=$_POST["login"];
        $parol=$_POST["parol"];

        $sqlInsert = "INSERT INTO teachers (full_name, login, parol) VALUES ('$fullname', '$login', '$parol')";

        if($con->query($sqlInsert) === TRUE) {
            echo "New recort created successfully!";
        }else{
            echo "Error: ".$sqlInsert."<br .>".$con->error;
        }
    }
?>
<html>
    <head>
    </head>
    <body>
        <form action="" method="POST" align="center">
            <input type="text" name="fullname" placeholder="Full name"><br />
            <input type="text" name="login" placeholder="Login"><br />
            <input type="text" name="parol"  placeholder="Parol"><br />
            <input type="submit" name="submit">
        </form>

        <?php
            $sqlSelect = "SELECT id, full_name, login, parol FROM Teachers";
            $result = $con->query($sqlSelect);

            
            if ($result->num_rows > 0) {
                echo '<table align="center">';
                while($row = $result->fetch_assoc()) {
                echo '<tr>
                        <td>'.$row["id"].'</td>
                        <td>'.$row["full_name"].'</td>
                        <td>'.$row["login"].'</td>
                        <td>'.$row["parol"].'</td>
                        <td><a href="edit.php?id='.$row["id"].'">EDIT</a></td>
                        <td><a href="delete.php?id='.$row["id"].'">DELETE</a></td>
                    </tr>';
                }
                echo '</table>';
            } else {
                echo "0 results";
            }
        ?>

    </body>
</html>
