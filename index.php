<?php                                     #combined index.php and index.html file
$insert = false;
if(isset($_POST['name'])){
 $server = "localhost";
 $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password, "trip"); // connection to the database

    if (!$con){                       // checking connection to the database
        die("connection to this database failed due to ". mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    $name = $_POST['name'];     // fetching data from the form using post method
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];      


    $sql = "INSERT INTO `trip` (`Name`, `Age`, `Gender`, `Email`, `Phone`, `Other`, `Date`)
     VALUES ('$name', '$age', '$gender',
     '$email', '$phone', '$desc', current_timestamp());";
    //  echo $sql;

    // Execute the query
     if($con->query($sql) == true){
        echo "";  //Successfully inserted erased
        $insert = true;   // flag for successful insertion


        // $insert = true;
     }
     else{
        echo "ERROR: $sql <br> $con->error";
     }
        $con->close();  // closing the connection to the database
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+IE:wght@100..400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img src = "Antarish station.webp " alt = "Antarish station" class = "bg">
    <div class = "container">
        <h3>Welcome to Travel Form </h3>
        <p>Enter your details and submit this form to confirm your participation in the trip</p>
        <?php
        if($insert == true){
        echo "<p class='Submitform'> Thanks for choosing our travel services!</p>";
        }
        ?>
        <form action = "index.php" method = "post">
            <input type="text" name = "name" id = "name" placeholder = "Enter your name">
            <input type="text" name = "age" id = "age" placeholder = "Enter your age">
            <input type="text" name = "gender" id = "gender" placeholder = "Enter your gender">
            <input type="email" name = "email" id = "email" placeholder = "Enter your email">
            <input type="phone" name = "phone" id = "phone" placeholder = "Enter your phone">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder = "Enter any other information here"></textarea>
            <button class = "btn">Submit</button>
            
    </div>
    <script src="index.js"></script>
    
</body>
</html>
