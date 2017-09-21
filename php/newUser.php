<?php
/*

      File:     3. newUser.php
      By:       Allea Ward
      Date:     21-Sep-2017

      This script adds a user to the Users table in the myShitnessPal database.

==============================================================
*/

  $username = $_POST['Username'];
  $weight = $_POST['Weight'];
  $height = $_POST['Height'];
  $age = $_POST['Age'];
  $activity = $_POST['Activity'];

  //Fetch the login information and connect to the table securely
  {
    include('dbConfig.php');
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
  $userInsert = "INSERT INTO myshitnesspal.users (ID, Username, Weight, Height, Age, Activity) ";

  $userInsert .= "VALUES (ID,'".$username."', ".$weight.", ".$height.", ".$age.", ".$activity.")";

   echo $userInsert;

  if(mysqli_query($dbConnected, $userInsert)){
    echo "User successfully inserted.<br><br>";
  }else{
    echo "<br><br>User was <b>NOT</b> inserted.";
  }
  }

?>
