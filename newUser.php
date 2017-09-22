<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>
  <body>
    <header class="container-fluid">
      <div class="row">
        <a href="index.php"><h1 class="col-4">MyShitnessPal<h1></a>
      </div>
    </header>

    <nav class="container-fluid marginTop">
      <section class="row">
        <hr>
        <a href="index.php" class="col-1">Home</a>
        <hr>
      </div>
    </nav>
    <p>Enter a new user.</p>
    <form action="php/newUser.php" method="post">
      <input type="text" placeholder="Username:" name="Username">
      <input type="text" placeholder="Weight:" name="Weight">
      <input type="text" placeholder="Height:" name="Height">
      <input type="text" placeholder="Age:" name="Age">
      <select name="Activity">
        <option value="1.2">Sedentary: Little or no Exercise/Desk job</option>
        <option value="1.375">Lightly active: Light exercise/Sports 1 &ndash; 3 days per week</option>
        <option value="1.55">Moderately active: Moderate Exercise, Sports 3 &ndash; 5 days per week</option>
        <option value="1.725">Very active: Heavy Exercise/ Sports 6 &ndash; 7 days per week</option>
        <option value="1.9">Extremely active: Very heavy exercise/Physical Job/Training 2x per day</option>
      </select>
      <input type="submit" name="submit" class="" onclick="">
    </form>

    <footer class="container-fluid">
      <p>&copy; Allea Ward</p>
    </footer>

  </body>
</html>
