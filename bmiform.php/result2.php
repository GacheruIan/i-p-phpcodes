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
        th, td {
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
       $db="iandb";

       $myconn=mysqli_connect($host,$user,$pwd,$db);
       if($myconn){
        echo "connection is okay";
       }else{
        echo "error";
       }
    ?>
    <?php 
    require_once('result2.php');
       $name = $_POST["myname"];
       $age = $_POST["myage"];
       $gender = $_POST["mygender"];
       $date = $_POST["mydate"];
       $height = $_POST['height']; 
       $weight = $_POST['weight'];
       $sesh = isset($_POST['Morning-Session']) ? 'Morning Session' : ''; // Adjusted to properly check if session checkboxes were checked
       $sesh .= isset($_POST['Afternoon-Session']) ? ' Afternoon Session' : ''; // Adjusted to properly check if session checkboxes were checked, added space for separation
       $push = $_POST['myrange'];
       $mail = $_POST['youremail']; 
       $calc = ($height + $weight)/3;


       if ($calc >= 0 && $calc <= 18.5) {
        echo "<h2><i>Underweight</i></h2>";
        echo "<p>Your BMI indicates you may be underweight. It's essential to consult a healthcare professional to determine the underlying cause and ensure appropriate guidance for healthy weight management.</p>";
        echo "<p>If you're interested in exploring options, you may consider program 54, but please discuss this with your doctor first.</p>";
    } elseif ($calc >= 18.8 && $calc <= 24.9) {
        echo "<h2>Normal weight</h2>";
        echo "<p>Congratulations on maintaining a healthy BMI! To continue supporting your well-being, consider following a balanced diet, engaging in regular physical activity, and managing stress effectively.</p>";
        echo "<p>Program 14 offers resources for maintaining a healthy lifestyle, but it's always a good idea to consult with a healthcare professional for personalized recommendations.</p>";
    } elseif ($calc >=25 && $calc < 30) {
        echo "<h2>Overweight</h2>";
        echo "<p>Your BMI suggests you may be overweight. While this doesn't necessarily indicate a health problem, it's beneficial to explore healthy weight management strategies.</p>";
        echo "<p>Consider consulting a healthcare professional for personalized advice and potential program recommendations, such as program 34.</p>";
    } else {
        echo "<h2>Obese</h2>";
        echo "<p>Obesity can increase the risk of various health conditions. It's crucial to seek medical advice for comprehensive assessment and personalized recommendations.</p>";
        echo "<p>Your doctor can guide you on appropriate weight management strategies, including potential programs or interventions that align with your individual needs.</p>";
    }
    
    
    echo "<tr><td>Name entered is</td><td>$name</td></tr>";
    echo "<tr><td>You joined us on date</td><td>$date</td></tr>";
    echo "<tr><td>Age group categorised under</td><td>$age</td></tr>";
    echo "<tr><td>Gender</td><td>$gender</td></tr>";
    echo "<tr><td>Height</td><td>$height</td></tr>";
    echo "<tr><td>Weight</td><td>$weight</td></tr>";
    echo "<tr><td>Session(s)</td><td>$sesh</td></tr>";
    echo "<tr><td>Willingness to train session specified</td><td>$push</td></tr>";
    echo "<tr><td>Contact</td><td>$mail</td></tr>";



    $insert= "insert into irecords(name,date,age_range,gender,height,weight,sessions,push_intensity,email)
              values('$name','$date','$age','$gender','$height','$weight','$sesh','$push','$mail')";
              ini_set('display_errors', 1);
              error_reporting(E_ALL);
              
              if (mysqli_query($myconn, $insert)) {
                echo "successfully added<br>";
            } else {
                echo "Error: " . $insert . "<br>" . mysqli_error($myconn);
            }
            
    ?>
    </table>
</body>
</html>
