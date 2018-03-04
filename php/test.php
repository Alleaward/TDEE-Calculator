    <?php
    $db = array(
    'hostname' => 'localhost',
    'username' => 'wardwe5_fitapp',
    'password' => 'r~AT;EagwgsV',
    'database' => 'wardwe5_fitnessapp',
    );
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
  
    $userSelect = "SELECT ID, Username, Password, Weight, Height, Age, Activity FROM wardwe5_fitnessapp.users ";
    $userSelect .= "WHERE Username='44444' AND Password='44444';";
   echo $userSelect;
   if($userSelected = mysqli_query($dbConnected, $userSelect)){
     $row = mysqli_fetch_array($userSelected, MYSQLI_ASSOC);
    if($row['Username'] == null){
      echo "Username or password is invalid.";
    }else{
      echo "<br><br>User successfully selected.<br>";
      //DECLARE VARIABLE TO BE SENT HERE // Associative Array?
      $username = $row['Username'];
      $weight = $row['Weight'];
      $height = $row['Height'];
      $age = $row['Age'];
      $activity = $row['Activity'];
      echo json_encode(array(
        "Username" => $username, 
        "Weight" => $weight, 
        "Height" => $height, 
        "Age" => $age, 
        "Activity" => $activity));
    }
   }else{
      echo "<br><br>User was <b>NOT</b> selected.<br><br>";
   }
  ?>