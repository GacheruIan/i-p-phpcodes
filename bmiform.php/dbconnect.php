<?php    
        $host = "localhost";
        $user = "root";
        $pwd = "";
        $db = "iandb";

        $myconn = mysqli_connect($host, $user, $pwd, $db);

        if ($myconn) {
            echo "<b><u>connection is okay</u></b><br><br>";
        } else {
            echo "error in connecting code.";
        }
        ?>