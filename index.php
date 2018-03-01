
<!DOCTYPE html>
<html>
<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="css/style.css"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>
    <section id="main">
        <div class="container">
          <div class="col s2"></div>
            <form id="newInput" class="col s8 center-align">
                <p>TDEE Calculator</p>
                <div class="row">
                    <div class="input-field col s4">
                        <input id="weight" type="number" class="validate" name="Weight" minlength="2" maxlength="3" required>
                        <label for="weight">Weight(kg):</label>
                    </div>
                    <div class="input-field col s4">
                        <input id="height" type="text" class="validate" name="Height" minlength="3" maxlength="3" required>
                        <label for="height">Height(cm):</label>
                    </div>
                    <div class="input-field col s4">
                        <input id="age" type="text" class="validate" name="Age" minlength="1" maxlength="2" required>
                        <label for="age">Age:</label>
                    </div>
                    <div class="input-field col s12" name="Activity" id="Activity">
                        <select>
                            <option value="1.2" selected>Sedentary: Little or no Exercise, Desk job</option>
                            <option value="1.375">Lightly active: Light exercise, Sports 1 &ndash; 3 days per week</option>
                            <option value="1.55">Moderately active: Moderate Exercise, Sports 3 &ndash; 5 days per week</option>
                            <option value="1.725">Very active: Heavy Exercise, Sports 6 &ndash; 7 days per week</option>
                            <option value="1.9">Extremely active: Very heavy exercise, Physical Job or Training 2x per day</option>
                        </select>
                        <label>Activity Level:</label>
                    </div>
                    <button id="newUserSubmit" class="btn waves-effect waves-light" type="submit" name="action">Calculate
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </form>
          <div class="col s2"></div>
        </div>
    
        <div class="container">
          <div class="col s2"></div>
            <form id="loginInfo" class="col s8 center-align">
                <p>Already been here? Login!</p>
                <div class="row">
                    <div class="input-field col s12 l6 center-align">
                        <input id="LoginUsername" type="text" class="validate" name="LoginUsername" minlength="5" required>
                        <label for="LoginUsername">Username:</label>
                    </div>
                    <div class="input-field col s12 l6 center-align">
                        <input id="LoginPassword" type="password" class="validate" name="LoginPassword" minlength="5" autocomplete="on" required>
                        <label for="LoginPassword">Password:</label>
                    </div>
                    <button id="loginSubmit" class="btn waves-effect waves-light" type="submit" name="action">Login
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </form>
          <div class="col s2"></div>
        </div>
    
        <div class="container">
          <div class="col s2"></div>
            <form id="userInfo" class="col s8 center-align hideDiv">
                <p>Your information</p>
                <p class="weight"></p>
                <p class="height"></p>
                <p class="age"></p>
                <p class="activity"></p>
                <p class="tdee"></p>
                <form id="signUpForm" class="" action="" method="">
                    <p>Enter a username and password to save your data. (Demo server, not secure!!!)</p>
                    <input class="col s6" type="text" name="SignInUsername" id="Username" placeholder="Username:" minlength="5" required>
                    <input class="col s6" type="password" name="SignInPassword" id="Password" placeholder="Password:" minlength="5" autocomplete="on" required>
                    <button id="signUpButton" class="btn waves-effect waves-light" type="submit" name="signUpButton">Save Data
                        <i class="material-icons right">send</i>
                    </button>
                    <button id="returnButton" class="btn waves-effect waves-light" type="submit" name="submit">Home
                        <i class="material-icons right">send</i>
                    </button>
                </form>
            </form>
          <div class="col s2"></div>
        </div>
    </section>

    <footer class="container-fluid col s12 center-align">
        <a href="http://alleaward.com/">&copy; Developed by Allea Ward</a>
    </footer>


    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>