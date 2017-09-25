<?php
/*

      File:     tableCreation.php
      By:       Allea Ward
      Date:     21-Sep-2017

      This script creates the tables to use within the myShitnessPal database.

==============================================================
*/

  //Fetch the login information and connect to the table securely
{
  include('../dbConfig.php');
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

  //Create table command, name.
  $createTable = "Create TABLE myShitnessPal.users (";
  //Table Parameters.
  $createTable .= "ID INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY , ";
  $createTable .= "Username VARCHAR(50) NOT NULL UNIQUE, ";
  $createTable .= "Weight DECIMAL(4,1) NOT NULL, ";
  $createTable .= "Height DECIMAL(4,1) NOT NULL, ";
  $createTable .= "Age INT(11) NOT NULL, ";
  $createTable .= "Activity DECIMAL(4,3) NOT NULL";
  $createTable .= ")";

  echo "$createTable";

  if(mysqli_query($dbConnected, $createTable)){
    echo "<br><br>User Table successfully created.<br><br>";
  }else{
    echo "<br><br>User Table was <b>NOT</b> created.";
  }
}



?>
