<html>

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            
            background-color: #f4f4f4;
            color: #333;
        }

        h2 {
            color: black;
        }

        a {
            display: inline-block;
            background-color: gray;
            color: #fff;
            padding: 8px 15px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }

        a:hover {
            background-color: #0056b3;
        }

        .message {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    require_once("dbconnect.php");

    $id = $_REQUEST['id'];

    $del = mysqli_query($myconn, "DELETE FROM Clients WHERE id='$id'");
    if ($del) {
        echo "<h2><b>Record Successfully Deleted!!</b></h2>";
    } else {
        echo "Record Not Deleted!! Error: " . mysqli_error($myconn);
    }
    echo "<br><a href='insert.php'> Go back to records list</a>";
    ?>
</body>

</html>