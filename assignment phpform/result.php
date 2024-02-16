<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color: #3C4080; 
            color: #FFFFFF; 
            font-family: Arial, sans-serif; 
        }
        table {
            width: 60%;
            margin: 20px auto; 
            border-collapse: collapse;
            background-color: #FFFFFF; 
            color: #000000; 
        }
        th, td {
            padding: 8px;
            text-align: left;
            border: 1px solid #DDD; 
        }
        th {
            background-color: #6A0DAD; 
            color: #FFFFFF;
        }
        h1, h2, h3, h4 {
            text-align: center;
            color: #FFFFFF; 
        }
    </style>
</head>
<body>
    <?php
    $fullName = $_POST["fullName"];
    $registration = $_POST["regno"];
    $course = $_POST["course"];
    $phoneNumber = $_POST["phoneNumber"];
    $unit_1 = $_POST["JavaScript"];
    $unit_2 = $_POST["Algorithms"];
    $unit_3 = $_POST["SMT"];
    $unit_4 = $_POST["PHP"];

    $units = [$unit_1, $unit_2, $unit_3, $unit_4];
    $sum = array_sum($units);
    $average = $sum / count($units);

    echo "<h1>Welcome, $fullName</h1>";
    echo "<h2>Course: $course</h2>";
    echo "<table>";
    echo "<tr><th>Admission Number</th><td>$registration</td></tr>";
    echo "<tr><th>Phone Number</th><td>$phoneNumber</td></tr>";
    echo "<tr><th>Sum of Units</th><td>$sum</td></tr>";
    echo "<tr><th>Average Score</th><td>$average</td></tr>";
    
    $resultText = "";
    if($average >= 0 && $average <= 49){
        $resultText = "Fail";
    } elseif($average >= 50 && $average <= 59){
        $resultText = "Pass";
    } elseif($average >= 60 && $average <= 69){
        $resultText = "Credit";
    } elseif($average >= 70 && $average <= 100){
        $resultText = "Distinction";
    } else {
        $resultText = "Error loading results...";
    }
    echo "<tr><th>Result</th><td>$resultText</td></tr>";
    echo "</table>";
    echo "<h4>A copy of the info has been sent to your contact: $phoneNumber <i>Thank you!</i></h4>";

    ?>  
</body>
</html>
