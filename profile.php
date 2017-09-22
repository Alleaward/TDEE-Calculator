<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <?php include('php/getData.php') ?> <!-- Retrieves the data -->
</head>
  <body>

    <header class="container-fluid">
      <div class="row">
        <a href="index.html"><h1 class="col-4">MyShitnessPal<h1></a>
      </div>
    </header>

    <section class="container-fluid testBorderRed">
      <div class="row">
        <div id="username" class="col-12 testBorderGreen">
          <p class="value"><?php echo " ".htmlspecialchars($row['Username']); ?></p>
        </div>
        <div id="weight" class="col-2 testBorderGreen">
          <p>Weight:<span class="value"><?php echo " ".htmlspecialchars($row['Weight']); ?></span>kg</p>
        </div>
        <div id="height" class="col-10 testBorderGreen">
          <p>Height:<span class="value"><?php echo " ".htmlspecialchars($row['Height']); ?></span>cm</p>
        </div>
        <div id="calories" class="col-2 testBorderGreen">
          <p>TDEE/Calories:<span class="value"> <?php echo " ".htmlspecialchars($tdee); ?></span> kCal</p>
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
