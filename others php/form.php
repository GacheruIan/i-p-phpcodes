<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title> <!-- It's better to place the title tag directly in the HTML -->
</head>
<body>
    <?php
    // Echo the form with corrected syntax
    echo '<form action="destination.php" method="post" name="my-form">'; // Corrected the opening form tag
    echo 'Enter name: <input type="text" name="your-name">'; // Corrected the input tag
    echo 'Enter age: <input type="text" name="your-age"><br><br>'; // Corrected the input tag
    echo '<button type="submit">Submit</button>'; // Added type attribute to button

    echo '</form>';
    ?>
</body>
</html>
