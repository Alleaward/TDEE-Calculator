<?php
/*

      File:     dbCreation.php
      By:       Allea Ward
      Date:     21-Sep-2017

      This script creates the DB to be used for MyShitnessPal

==============================================================
*/

//Connect to Server
  $hostname = 'localhost';
  $username = 'root';
  $password = '';

  $dbConnected = mysqli_connect($hostname, $username, $password);

  $dbSuccess = true;

  if($dbConnected){

  }else{
      echo "MySQL has failed to connect<br><br>";
      $dbSuccess = false;
  }

  if($dbSuccess){
    $dbName = 'myShitnessPal';
    $dbCreate = "Create Database ".$dbName;

    if(mysqli_query($dbConnected, $dbCreate)){
      echo "MySQL database ".$dbName." has been created";
    }else {
      echo "MySQL database ".$dbName." has <b>NOT</b> been created";
    }
  }



?>
