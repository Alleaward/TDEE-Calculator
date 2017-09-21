<?php
/*

      File:     getData.php
      By:       Allea Ward
      Date:     22-Sep-2017

      This script retrieves the data for the users profile.

==============================================================
*/

$username = $_POST['Username'];

//Fetch the login information and connect to the table securely
{
  include('php/dbConfig.php');
  $dbSuccess = false;
  $dbConnected = mysqli_connect($db['hostname'],$db['username'],$db['password']);

  if ($dbConnected) {

    $dbSelected = mysqli_select_db($dbConnected, $db['database']);
    echo "Connected to ".$db['hostname']." successfully.<br><br>";

    if($dbSelected){

      $dbSuccess = true;
      echo "Selected the ".$db['database']." database successfully.<br><br>";

    }else {

      echo "Failed to select DB<br><br>";

    }
  }else {

    echo "MySQL connection FAILED<br><br>";

  }
}

//Create table
if ($dbSuccess) {
//Create a varible that holds our query.
//Create insert command, name.
$userSelect = "SELECT ID, Username, Weight, Height, Age, Activity FROM myshitnesspal.users ";

$userSelect .= "WHERE Username='".$username."';";

 echo $userSelect;

 if($userSelected = mysqli_query($dbConnected, $userSelect)){

   $row = mysqli_fetch_array($userSelected, MYSQLI_ASSOC);

   if($row['Username'] == null){
     echo "<br><br>User <b>".$username."</b> does not exist....<br>";
   }else{
     echo "<br><br>User successfully selected.<br>";
   }

   echo "<br>ID: ".$row['ID']."<br>Username: ".$row['Username']."<br>Weight: ".$row['Weight']."<br>Height: ".$row['Height']."<br>Age: ".$row['Age']."<br>Activity: ".$row['Activity'];

 }else{
   echo "<br><br>User was <b>NOT</b> selected.<br><br>";
 }


$bmr = (66 + (13.7 * $row['Weight']) + (5 * $row['Height']) - (6.8 * $row['Age']));
echo "<br>Basal Metobolic Rate: $bmr";
$tdee = $bmr * $row['Activity'];
echo "<br>Your Total Daily Energy Expenditure (TDEE) is: $tdee";
}



?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>
  <body>

    <header class="container-fluid testBorderRed">
      <div class="row testBorderBlue">
        <a href="index.html"><h1 class="col-4 testBorderGreen">MyShitnessPal<h1></a>
      </div>
    </header>

    <nav class="container-fluid marginTop">
      <section class="row">
        <hr>
        <form id="modalForm" class="" action="php/getData.php" method="post" target="formTarget">
          <input type="text" placeholder="Username" name="Username">
          <input type="submit" name="submit" class="" onclick="">
        </form>
        <a href="newUser.html" class="col-1">New User</a>
        <hr>
      </div>
    </nav>

    <section class="container-fluid testBorderRed">
      <div class="row">
        <div id="username" class="col-12 testBorderGreen">
          <p class="value"><?php echo " ".$row['Username']; ?></p>
        </div>
        <div id="weight" class="col-2 testBorderGreen">
          <p>Weight:<span class="value"><?php echo " ".$row['Weight']; ?></span>kg</p>
        </div>
        <div id="height" class="col-10 testBorderGreen">
          <p>Height:<span class="value"><?php echo " ".$row['Height']; ?></span>cm</p>
        </div>
        <div id="calories" class="col-2 testBorderGreen">
          <p>TDEE/Calories:<span class="value"> <?php echo " ".$tdee; ?></span> kCal</p>
        </div>
        <div id="caloriesBar" class="col-10 testBorderGreen">
          <p class="testBorderRed"><span class="value">-</span>%</p>
        </div>
      </div>
    </section>


    <footer class="container-fluid">
      <p>&copy; Allea Ward</p>
    </footer>
  </body>
</html>
