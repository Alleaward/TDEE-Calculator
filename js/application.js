$(document).ready(function (){
    M.AutoInit();

    $('#inputForm').validate();
    $('#loginForm').validate();
    $('#signUpForm').validate();

    //Input form for new and returning users.
    $('#inputForm').on('submit', function (event){
        if ($('#inputForm').valid() == true) {
            event.stopPropagation();
            event.preventDefault();
            //Get the values from the form.	
            var Weight = +$('#Weight').val();
            var Height = +$('#Height').val();
            var Age = +$('#Age').val();
            var Activity = +$('#Activity').val();
            //Calculate
            var bmr = (66 + (13.7 * Weight + (5 * Height) - (6.8 * Age)));
            var tdee = Math.floor(bmr * Activity);
            //Go to new view
            $('#inputForm').slideUp().fadeOut();
            $('#information').fadeIn().slideDown();
            $('#loginForm').slideUp().fadeOut();
            $('#signUpForm').fadeIn().slideDown();
            //Insert the information.
            $('.weight').replaceWith('<p class="weight">Weight(kg): ' + Weight + '</p>' );
            $('.height').replaceWith('<p class="height">Height(cm): ' + Height + '</p>');
            $('.age').replaceWith('<p class="age">Age: ' + Age + '</p>');
            $('.activity').replaceWith('<p class="activity">Activity: ' + Activity + '</p>');
            $('.tdee').replaceWith('<p class="tdee">TDEE: ' + tdee + '</p>');
        }
    });
    //Returning User
    $('#loginForm').on('submit', function (event) {
        if ($('#loginForm').valid() == true) {
            event.stopPropagation();
            event.preventDefault();
            //Get the data
            var Username = $('#loginForm #Username').val();
            var Password = $('#loginForm #Password').val();
            var Weight = 0;
            var Height = 0;
            var Age = 0;
            var Activity = 0;
            //Send the data.

            $.post(
                "php/retrieveUser.php",
                { Username: Username, Password: Password },
                function (data) {

                    console.log(data);
                    if (data === "Username or password is invalid."){
                        alert("Username or password is invalid.")

                    }else if (data === "User was <b>NOT</b> selected."){
                        alert("Username or password is invalid.")

                    }else if (data === "MySQL connection FAILED<br><br>"){
                        alert("Could not connect to the database.")

                    }else if (data === "Failed to select DB<br><br>"){
                        alert("Could not connect to the database.")

                    }


                    Weight = data.Weight;
                    Height = data.Height;
                    Age = data.Age;
                    Activity = data.Activity;
                    //Calculate
                    var bmr = (66 + (13.7 * Weight + (5 * Height) - (6.8 * Age)));
                    var tdee = Math.floor(bmr * Activity);
                    //Populate info.
                    $('.weight').replaceWith('<p class="weight">Weight(kg): ' + Weight + '</p>');
                    $('.height').replaceWith('<p class="height">Height(cm): ' + Height + '</p>');
                    $('.age').replaceWith('<p class="age">Age: ' + Age + '</p>');
                    $('.activity').replaceWith('<p class="activity">Activity: ' + Activity + '</p>');
                    $('.tdee').replaceWith('<p class="tdee">TDEE: ' + tdee + '</p>');
                    //New View
                    $('#inputForm').slideUp().fadeOut();
                    $('#information').fadeIn().slideDown();
                    $('#loginForm').slideUp().fadeOut();
                    $('#signUpForm').fadeIn().slideDown();
                },
                'json'
            );
{
            // $.ajax({
            //     type: "POST",
            //     url: "php/retrieveUser.php",
            //     data: { "Username": Username, "Password": Password },
            //     success: function (data) {
            //         Weight = data.Weight;
            //         Height = data.Height;
            //         Age = data.Age;
            //         Activity = data.Activity;
            //         //Calculate
            //         var bmr = (66 + (13.7 * Weight + (5 * Height) - (6.8 * Age)));
            //         var tdee = Math.floor(bmr * Activity);
            //         //Populate info.
            //         $('.weight').replaceWith('<p class="weight">Weight(kg): ' + Weight + '</p>');
            //         $('.height').replaceWith('<p class="height">Height(cm): ' + Height + '</p>');
            //         $('.age').replaceWith('<p class="age">Age: ' + Age + '</p>');
            //         $('.activity').replaceWith('<p class="activity">Activity: ' + Activity + '</p>');
            //         $('.tdee').replaceWith('<p class="tdee">TDEE: ' + tdee + '</p>');
            //         //New View
            //         $('#inputForm').slideUp().fadeOut();
            //         $('#information').fadeIn().slideDown();
            //         $('#loginForm').slideUp().fadeOut();
            //         $('#signUpForm').fadeIn().slideDown();
            //     },
            //     error: function (data) {
            //         alert('User does not exist, or password is incorrect.');
            //         alert(data);
            //     }
            // });
}
        }
    });

    //Adding a new user
    $('#signUpForm').on('submit', function (event) {
        if ($('#signUpForm').valid() == true) {
            event.stopPropagation();
            event.preventDefault();	
            //Get variables from within this form.
            var Username = $('#signUpForm #Username').val();
            var Password = $('#signUpForm #Password').val();
            //Get variable from above this form.
            var Weight = +$('#Weight').val();
            var Height = +$('#Height').val();
            var Age = +$('#Age').val();
            var Activity = +$('#Activity').val();
            //Send variable to php script for saving.
            $.post(
                "php/newUser.php", 
                { Username: Username, Password: Password, Weight: Weight, Height: Height, Age: Age, Activity: Activity }, 
                function (data) {
                    alert(data);
                    //Check for no existing user, or an incorrect password.
                    if (data != "Username already exists, to replace data, enter the correct password." && data != "Password is incorrect."){
                        $('#inputForm').fadeIn().slideDown();
                        $('#loginForm').fadeIn().slideDown();
                        $('#information').slideUp().fadeOut();
                        $('#signUpForm').slideUp().fadeOut();
                    }
                }
            );
        }
    });
    //Return to Home
    $('#returnButton').on('click', function (event) {
        event.stopPropagation();
        event.preventDefault();	
        //Go to home view
        $('#inputForm').fadeIn().slideDown();
        $('#information').slideUp().fadeOut();
        $('#loginForm').fadeIn().slideDown();
    });
});

