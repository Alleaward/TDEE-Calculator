<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">

  <?php
    $username = $_POST['Username'];
    include('php/getData.php');
  ?> <!-- Retrieves the data -->

</head>
  <body>

    <header class="container-fluid">
      <div class="row">
        <a href="index.php"><h1 class="col-4">MyShitnessPal<h1></a>
      </div>
    </header>

    <section class="container-fluid ">
      <div class="row">
        <div id="username" class="col-12 ">

          <p class="value"><?php echo " ".htmlspecialchars($row['Username']);?></p>

          <button id="updateBtn" onclick="document.getElementById('updateForm').style.display='block', document.getElementById('updateBtn').style.display='none'">Update</button>

          <form id="updateForm" action="php/updateUser.php" method="post" style="display:none;">
            <input type="hidden" name="Username" value="<?php echo htmlspecialchars($row['Username']);?>">
            <input type="number" step="0.01" placeholder="Weight:" name="Weight" value="<?php echo htmlspecialchars($row['Weight']);?>">
            <input type="number" placeholder="Height:" name="Height" value="<?php echo htmlspecialchars($row['Height']);?>">
            <input type="number" placeholder="Age:" name="Age" value="<?php echo htmlspecialchars($row['Age']);?>">
            <select name="Activity">
              <option value="1.2">Sedentary: Little or no Exercise/Desk job</option>
              <option value="1.375">Lightly active: Light exercise/Sports 1 &ndash; 3 days per week</option>
              <option value="1.55">Moderately active: Moderate Exercise, Sports 3 &ndash; 5 days per week</option>
              <option value="1.725">Very active: Heavy Exercise/ Sports 6 &ndash; 7 days per week</option>
              <option value="1.9">Extremely active: Very heavy exercise/Physical Job/Training 2x per day</option>
            </select>
            <input type="submit" name="submit" value="Update">
          </form>

        </div>
        <div id="weight" class="col-2 ">
          <p>Weight:<span class="value"><?php echo " ".htmlspecialchars($row['Weight']);?></span>kg</p>
        </div>
        <div id="height" class="col-10 ">
          <p>Height:<span class="value"><?php echo " ".htmlspecialchars($row['Height']);?></span>cm</p>
        </div>
        <div id="calories" class="col-2 ">
          <p>TDEE/Calories:<span class="value"> <?php echo " ".htmlspecialchars($tdee);?></span> kCal</p>
        </div>
        <div id="caloriesBar" class="col-10 ">
          <p class="testBorderRed"><span class="value">-</span>%</p>
        </div>
      </div>
    </section>


    <footer class="container-fluid">
      <p>&copy; Allea Ward</p>
    </footer>
  </body>
</html>
