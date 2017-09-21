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
$userSelect = "SELECT ID, Username, Weight, Height, Age FROM myshitnesspal.users ";

$userSelect .= "WHERE Username='".$username."';";

 echo $userSelect;

 if($userSelected = mysqli_query($dbConnected, $userSelect)){

   $row = mysqli_fetch_array($userSelected, MYSQLI_ASSOC);

   if($row['Username'] == null){
     echo "<br><br>User <b>".$username."</b> does not exist....<br>";
   }else{
     echo "<br><br>User successfully selected.<br>";
   }

   echo "<br>ID: ".$row['ID']."<br>Username: ".$row['Username']."<br>Weight: ".$row['Weight']."<br>Height: ".$row['Height']."<br>Age: ".$row['Age'];

 }else{
   echo "<br><br>User was <b>NOT</b> selected.<br><br>";
 }


$bmr = (66 + (13.7 * $row['Weight']) + (5 * $row['Height']) - (6.8 * $row['Age']));
echo "<br>Basal Metobolic Rate: $bmr";
}



?>