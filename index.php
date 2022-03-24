<?php
if(isset($_POST['name'])){
    //set connection variables
$insert=false;
$server = "localhost";
$username = "root";
$password = "";

//create a database connection
$con = mysqli_connect($server, $username, $password);

//check for connection success
if(!$con){
    die("coonection to this database failed due to ". mysqli_connect_error());
}
//echo "success connecting to the db";

//collect post variables
$name=$_POST['name'];                                                          //(for multicursor: alt+shift+drag+endkey(f12))
$age=$_POST['age'];
$gender=$_POST['gender'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$desc=$_POST['desc'];
$sql = "
INSERT INTO `travel_us`.`trip` ( `name`, `age`, `gender`, `email`, `phone`, `desc`, `Date`)
 VALUES ( '$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp()); ";
//echo $sql;


// execute the query
if($con->query($sql)==true){
  //  echo"successfully inserted"; 

  //flag for successful insertion
  $insert=true;                                                                   //(-> object operator)
}
else{
    echo"ERROR:$sql <br> $con->error";

}
//close the database connection
$con->close();

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome To Travel Form</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="style.css">                               <!-- statement to link css file -->
</head>
<body>
    <img class="bg" src="bg.jpg" alt="Seoul Korea">
    <div class="container">
        <h1>WELCOME TO US TRIP </h1>
        <p>Enter your details and submit to confirm your participation in the trip</p>
        <?php
        $insert=true;
        if($insert==true){
        echo"<p class='SubmitMsg'>Thanks for submitting your form. We are happy to see you joining for the US trip</p>";}
        ?>


        <form action="index.php" method="post">
        <input type="text" name="name" id="name" placeholder="Enter your name:">
        <input type="text" name="age" id="age" placeholder="Enter your age:">
        <input type="text" name="gender" id="gender" placeholder="Enter your gender:">
        <input type="email" name="email" id="email" placeholder="Enter your email:">
        <input type="phone" name="phone" id="phone" placeholder="Enter your phone no:">
        <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here:"></textarea>
        <button class="btn">submit</button>
       


        </form>
    </div>
                                     
</body>
</html>