<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>MyShitnessPal</title>

  </head>
  <body>

    <header class="container-fluid">
      <div class="row">
        <h1 class="col-4"><a href="index.php">MyShitnessPal</a></h1>
      </div>
    </header>

    <nav class="container-fluid marginTop">
      <section class="row">
        <hr>
        <form action="profile.php" method="post" >
          <p>Enter an existing user</p>
          <input type="text" placeholder="Username" name="Username">
          <input type="submit" name="submit">
        </form>
        <hr>
        <a href="newUser.php" class="col-3">Click here to a new user.</a>
        <hr>
      </section>
    </nav>

    <footer class="container-fluid">
      <p>&copy; Allea Ward</p>
    </footer>

  </body>
</html>
