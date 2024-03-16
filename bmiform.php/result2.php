<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Form Details</title>
    <style>
        body {
            background-color: gray;

            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
            margin: 0;
        }

        .bmi-feedback {
            text-align: center;
            margin: 20px;
            width: 50%;
            color: white;
        }

        table {
            border-collapse: collapse;
            width: 50%;
            margin: auto;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <th>Detail</th>
            <th>Value</th>
        </tr>
        <?php

        $host = "localhost";
        $user = "root";
        $pwd = "";
        $db = "iandb";

        $myconn = mysqli_connect($host, $user, $pwd, $db);
        if ($myconn) {
            echo "<b><u>connection is okay</u></b>";
        } else {
            echo "error";
        }
        ?>
        <?php
        require_once('result2.php');

        // Assuming $_POST['mydate'] is in YYYY-MM-DD format as per your form
        $mydate = $_POST["mydate"];

        // Create DateTime object from $mydate
        $dateObject = DateTime::createFromFormat('Y-m-d', $mydate);
        $dateErrors = DateTime::getLastErrors();

        if ($dateErrors['warning_count'] + $dateErrors['error_count'] > 0) {
            // Handle error - redirect back to form or display an error message
            echo "Invalid date format. Please enter the date in YYYY-MM-DD format.";
            exit; // Stop script execution
        }

        // If no errors, format the date to DD-MM-YYYY
        $formattedDate = $dateObject->format('d-m-Y');


        $name = $_POST["myname"];
        $age = $_POST["myage"];
        $gender = $_POST["mygender"];
        // $date = $_POST["mydate"];
        $height = $_POST['height'];
        $weight = $_POST['weight'];
        $sesh = isset($_POST['Morning-Session']) ? 'Morning Session' : ''; // Adjusted to properly check if session checkboxes were checked
        $sesh .= isset($_POST['Afternoon-Session']) ? ' Afternoon Session' : ''; // Adjusted to properly check if session checkboxes were checked, added space for separation
        $push = $_POST['myrange'];
        $mail = $_POST['youremail'];
        $calc = ($height + $weight) / 3;




        if ($calc >= 0 && $calc <= 18.5) {
            echo "<h2><i>Underweight</i></h2>";
            echo "<p>Your BMI indicates you may be underweight. It's essential to consult a healthcare professional to determine the underlying cause and ensure appropriate guidance for healthy weight management.</p>";
            echo "<p>If you're interested in exploring options, you may consider program 54, but please discuss this with your doctor first.</p>";
        } elseif ($calc >= 18.8 && $calc <= 24.9) {
            echo "<h2>Normal weight</h2>";
            echo "<p>Congratulations on maintaining a healthy BMI! To continue supporting your well-being, consider following a balanced diet, engaging in regular physical activity, and managing stress effectively.</p>";
            echo "<p>Program 14 offers resources for maintaining a healthy lifestyle, but it's always a good idea to consult with a healthcare professional for personalized recommendations.</p>";
        } elseif ($calc >= 25 && $calc < 30) {
            echo "<h2>Overweight</h2>";
            echo "<p>Your BMI suggests you may be overweight. While this doesn't necessarily indicate a health problem, it's beneficial to explore healthy weight management strategies.</p>";
            echo "<p>Consider consulting a healthcare professional for personalized advice and potential program recommendations, such as program 34.</p>";
        } else {
            echo "<h2>Obese</h2>";
            echo "<p>Obesity can increase the risk of various health conditions. It's crucial to seek medical advice for comprehensive assessment and personalized recommendations.</p>";
            echo "<p>Your doctor can guide you on appropriate weight management strategies, including potential programs or interventions that align with your individual needs.</p>";
        }


        // UPDATE RECORDS


        // Fetch records from the database
        $result = mysqli_query($myconn, "SELECT * FROM irecords");

        // Check if there are any records
        if (mysqli_num_rows($result) > 0) {
            // Loop through each record
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                echo "<tr><td>ID:</td><td>" . htmlspecialchars($row['id']) . "</td></tr>";
                echo "<tr><td>Name entered is</td><td>" . htmlspecialchars($row['name']) . "</td></tr>";
                echo "<tr><td>You joined us on date</td><td>" . htmlspecialchars($row['date']) . "</td></tr>";
                echo "<tr><td>Age group categorised under</td><td>" . htmlspecialchars($row['age_range']) . "</td></tr>";
                echo "<tr><td>Gender</td><td>" . htmlspecialchars($row['gender']) . "</td></tr>";
                echo "<tr><td>Height</td><td>" . htmlspecialchars($row['height']) . "</td></tr>";
                echo "<tr><td>Weight</td><td>" . htmlspecialchars($row['weight']) . "</td></tr>";
                echo "<tr><td>Session(s)</td><td>" . htmlspecialchars($row['sessions']) . "</td></tr>";
                echo "<tr><td>Willingness to train session specified</td><td>" . htmlspecialchars($row['push_intensity']) . "</td></tr>";
                echo "<tr><td>Contact</td><td>" . htmlspecialchars($row['email']) . "</td></tr>";
                echo "<td><a href='delete.php?id=$id'>Delete record</a></td>";
            }
        } else {
            echo "<tr><td colspan='2'>No records found.</td></tr>";
        }

        // Convert it back to YYYY-MM-DD format for MySQL insertion
        $dateForDatabase = DateTime::createFromFormat('d-m-Y', $formattedDate)->format('Y-m-d');
        
        // Now, use $dateForDatabase in your INSERT query
        $insert = "INSERT INTO irecords (name, date, age_range, gender, height, weight, sessions, push_intensity, email)
                   VALUES ('$name', '$dateForDatabase', '$age', '$gender', '$height', '$weight', '$sesh', '$push', '$mail')";
        
        if (mysqli_query($myconn, $insert)) {
            echo "<u><b>Successfully added</b></u><br>";
        } else {
            echo "Error: " . $insert . "<br>" . mysqli_error($myconn);
        }
        ?>


    </table>


</body>

</html>