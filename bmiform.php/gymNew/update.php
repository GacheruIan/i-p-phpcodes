<?php
require_once('dbconnect.php');

$id = $_REQUEST['id'];
$result = mysqli_query($myconn, "SELECT * FROM Clients WHERE id='$id'"); // Select record from Clients table
$row = mysqli_fetch_array($result);

if ($row) {
    $name = $row['name'];
    $ageRange = $row['age_range'];
    $gender = $row['gender'];
    $height = $row['height'];
    $weight = $row['weight'];
    $sessions = $row['sessions']; // Assuming 'sessions' is stored as a string of selected sessions
    $pushIntensity = $row['push_intensity'];
    $email = $row['email'];
    $phone = $row['phone'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Client Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        h2 {
            color: #333;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input[type=text],
        input[type=email],
        input[type=submit],
        input[type=reset] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ddd;
            box-sizing: border-box;
            /* Ensures padding doesn't add to width */
        }

        input[type=submit],
        input[type=reset] {
            width: 150px;
            height: 40px;

            background-color: #666;
            color: var(--white);
            padding: 14px var(--gutter);
            margin: 8px 0;
            border: none;
            border-radius: var(--radius);
            cursor: pointer;
        }

        input[type=reset] {
            background-color: #777;
        }

        input[type=submit]:hover,
        input[type=reset]:hover {
            opacity: 0.8;
        }
    </style>
</head>

<body>
    <h2> Update Client Details </h2>
    <form name='updateform' action='process_update.php' method='post'>
        <input type="hidden" name='id' value="<?php echo $id; ?>"><br>
        Name: <input type='text' name='name' value="<?php echo $name; ?>"><br>
        <!-- Age Range: <input type='text' name='age_range' value="<?php echo $ageRange; ?>"><br> -->
        <!-- Gender: <input type='text' name='gender' value="<?php echo $gender; ?>"><br> -->
        Height: <input type='text' name='height' value="<?php echo $height; ?>"><br>
        Weight: <input type='text' name='weight' value="<?php echo $weight; ?>"><br>
        Sessions: <input type='text' name='sessions' value="<?php echo $sessions; ?>"><br>
        Push Intensity: <input type='text' name='push_intensity' value="<?php echo $pushIntensity; ?>"><br>
        Email: <input type='email' name='email' value="<?php echo $email; ?>"><br>
        Phone Number: <input type='text' name='phone' value="<?php echo $phone; ?>"><br>
        <input type='submit' value='Update Client Details'>
        <input type='reset' value='Reset Form'>
    </form>
</body>

</html>