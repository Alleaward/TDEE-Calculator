<?php

  $username = $_POST['Username'];
  $password = $_POST['Password'];
  $weight = $_POST['Weight'];
  $height = $_POST['Height'];
  $age = $_POST['Age'];
  $activity = $_POST['Activity'];

  //Fetch the login information and connect to the table securely
  {
    echo "Getting db info in new user.<br><br>";

    include('dbConfig.php');
    $dbSuccess = false;
    $dbConnected = mysqli_connect($db['hostname'],$db['username'],$db['password']);
    if ($dbConnected) {
      $dbSelected = mysqli_select_db($dbConnected, $db['database']);
      echo "Connected to ".$db['hostname']." successfully. <br><br>";
      if($dbSelected){
        $dbSuccess = true;
        echo "Selected the ".$db['database']." database successfully. <br><br>";
      }else {
        echo "Failed to select DB<br><br>";
      }
    }else {
      echo "MySQL connection FAILED<br><br>";
    }
  }

  if ($dbSuccess) {
    $usernameCheck = "SELECT Username, Password FROM FitnessApp.users WHERE Username LIKE '".$username."'";
    if($userSelected = mysqli_query($dbConnected, $usernameCheck)){//Check if user exists
      $row = mysqli_fetch_array($userSelected, MYSQLI_ASSOC);//If the user exists, get username and password.
      if($row['Password'] == $password && $row['Username'] == $username){//If both Username and password are correct, overwrite data.
        $userInsert = "REPLACE INTO FitnessApp.users (ID, Username, Weight, Height, Age, Activity, Password) ";
        $userInsert .= "VALUES (ID, '".$username."', ".$weight.", ".$height.", ".$age.", ".$activity.", '".$password."')";
        echo $userInsert;
        // echo mysqli_error($connection);
        if(mysqli_query($dbConnected, $userInsert)){
          echo "Your data entry was successfully updated.";
        }
      }else if($row['Password'] != $password && $row['Username'] == $username){//If username is correct but password isnt, send error.
        echo "User already exists, please enter the correct password.";
      }else if($row['Username'] == null){//If Username doesnt exist, create one.
        $userInsert = "INSERT INTO FitnessApp.users (ID, Username, Weight, Height, Age, Activity, Password) ";
        $userInsert .= "VALUES (ID, '".$username."', ".$weight.", ".$height.", ".$age.", ".$activity.", '".$password."')";
        echo $userInsert;
        // echo mysqli_error($connection);
        if(mysqli_query($dbConnected, $userInsert)){
          echo "Your data was successfully stored.";
        }else{
          echo "User data was NOT inserted.";
        }
      }
    }
  }
?>
