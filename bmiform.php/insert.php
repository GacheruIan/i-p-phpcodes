<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Form Details</title>
    <style>
        button {
            background-color: gray;
            border-radius: 1px;
            color: white;
        }
        button:HOVER {
            color: white;
            background-color: gray;
            transform: scale(1.1);
        }
    </style>
</head>

<body>
    <table>
       

        <?php
        require_once('dbconnect.php'); // call connect code 
        //Retreiving records from the database and display in results web page
        $result = mysqli_query($myconn, "SELECT * FROM Clients");

        if (!$result) {
            die('Error: ' . mysqli_error($myconn));
        }


        $id = $_POST["id"];
        $name = $_POST["name"];
        $age = $_POST["myage"];
        $gender = $_POST["mygender"];
        $height = $_POST['height'];
        $weight = $_POST['weight'];
        $sesh .= isset($_POST['Morning-Session']) ? 'Morning Session' : '';
        $sesh .= isset($_POST['Afternoon-Session']) ? ' Afternoon Session' : '';
        $sesh .= isset($_POST['Evening-Session']) ? ' Evening Session' : '';

        $push = $_POST['myrange'];
        $mail = $_POST['youremail'];
        $tel = $_POST["phoneNumber"];
        $calc = ($height + $weight) / 3;




        // if ($calc >= 0 && $calc <= 18.5) {
        //     echo "<h2>Underweight</h2>";
        //     echo "<p>Your BMI indicates you may be underweight. It's essential to consult a healthcare professional to determine the underlying cause and ensure appropriate guidance for healthy weight management.</p>";
        //     echo "<p>If you're interested in exploring options, you may consider program 54, but please discuss this with your doctor first.</p>";
        // } elseif ($calc >= 18.8 && $calc <= 24.9) {
        //     echo "<h2>Normal weight</h2>";
        //     echo "<p>Congratulations on maintaining a healthy BMI! To continue supporting your well-being, consider following a balanced diet, engaging in regular physical activity, and managing stress effectively.</p>";
        //     echo "<p>Program 14 offers resources for maintaining a healthy lifestyle, but it's always a good idea to consult with a healthcare professional for personalized recommendations.</p>";
        // } elseif ($calc >= 25 && $calc < 30) {
        //     echo "<h2>Overweight</h2>";
        //     echo "<p>Your BMI suggests you may be overweight. While this doesn't necessarily indicate a health problem, it's beneficial to explore healthy weight management strategies.</p>";
        //     echo "<p>Consider consulting a healthcare professional for personalized advice and potential program recommendations, such as program 34.</p>";
        // } else {
        //     echo "<h2>Obese</h2>";
        //     echo "<p>Obesity can increase the risk of various health conditions. It's crucial to seek medical advice for comprehensive assessment and personalized recommendations.</p>";
        //     echo "<p>Your doctor can guide you on appropriate weight management strategies, including potential programs or interventions that align with your individual needs.</p>";
        // }


        // Check if any rows were returned
        if (mysqli_num_rows($result) > 0) {
            // Output table headers
            echo "<tr>
            <th>Record-Details.</th>
          </tr>";

          echo "<table border=1>";
          echo "<tr>";

          echo "<td>ID:</td>";
          echo "<td>Name entered is</td>";
          echo "<td>Age group categorised under</td>";
          echo "<td>Gender</td>";
          echo "<td>Height</td>";
          echo "<td>Weight</td>";
          echo "<td>Session(s)</td>";
          echo "<td>Willingness to train session specified</td>";
          echo "<td>Email</td>";
          echo "<td>Phone-Number</td>";
          echo "<td> Delete</td>";
          echo "</tr>";

            // Fetch and display each row of data
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['name']."</td>";
                echo "<td>".$row['age_range']."</td>";
                echo "<td>".$row['gender']."</td>";
                echo "<td>".$row['height']."</td>";
                echo "<td>".$row['weight']."</td>";
                echo "<td>".$row['sessions']."</td>";
                echo "<td>".$row['push_intensity']."</td>";
                echo "<td>".$row['email']."</td>";
                echo "<td>".$row['phone']."</td>";
                echo "<td><button><a href='delete.php?id=" . $row['id'] . "'>Delete record</a></button></td>";
                echo "<td><button><a href='update.php?id=" . $row['id'] . "'>Update record</a></button></td>";

                

                
            }


            if ($calc >= 0 && $calc <= 18.5) {
                echo "<h2>Underweight</h2>";
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
        } else {
            echo "<b>No records found. Please fill the form.</b>";
            echo "<br><a href='insert.php'> Go back to records</a>";

        }

        $insert = "INSERT INTO Clients (name, age_range, gender, height, weight, sessions, push_intensity, email, phone)
        VALUES ('$name', '$age', '$gender', '$height', '$weight', '$sesh', '$push', '$mail', '$tel')";
        $insert = "INSERT INTO Clients (name, age_range, gender, height, weight, sessions, push_intensity, email, phone) VALUES ('$name', '$age', '$gender', '$height', '$weight', '$sesh', '$push', '$mail', '$tel')";

        if(mysqli_query($myconn, $insert)){
        echo "<b><br>Record inserted successfully.</b>";
        } else{
        echo "ERROR: not able to execute $insert. " . mysqli_error($myconn);
        }
        ?>

    </table>


</body>

</html>