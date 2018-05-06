$(document).ready( () => {
    M.AutoInit();

    $('#inputForm').validate();
    $('#loginForm').validate();
    $('#signUpForm').validate();

    //Input form for new and returning users.
    $('#inputForm').on('submit', (event) => {
        if ($('#inputForm').valid() == true) {
            event.stopPropagation();
            event.preventDefault();
            //Get the values from the form.	
            let Weight = +$('#weight').val();
            let Height = +$('#height').val();
            let Age = +$('#age').val();
            let Activity = +$('#activity').val();
            //Calculate
            let bmr = (66 + (13.7 * Weight + (5 * Height) - (6.8 * Age)));
            let tdee = Math.floor(bmr * Activity);
            //Go to new view
            $('#inputForm').slideUp().fadeOut();
            $('#information').fadeIn().slideDown();
            $('#loginForm').slideUp().fadeOut();            $('#information').css({"display": "flex"});

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
    $('#loginForm').on('submit', (event) => {
        if ($('#loginForm').valid() == true) {
            event.stopPropagation();
            event.preventDefault();
            //Get the data
            let Username = $('#loginUsername').val();
            let Password = $('#loginPassword').val();
            let Weight = 0;
            let Height = 0;
            let Age = 0;
            let Activity = 0;
            //Send the data.
            $.post("php/retrieveUser.php", { "Username": Username, "Password": Password })
                .done( (data) => {
                    console.log(data);
                    if (data == "Username or password is invalid."){
                        $('.incorrectLogin').fadeIn().slideDown();
                    }else{
                        let rawData = JSON.parse(data);
                        // console.log("2");
                        // console.log(data);
                        // console.log(rawData);
                        if (rawData === "Username or password is invalid."){
                            alert("Username or password is invalid.");
    
                        }else if (rawData === "User was <b>NOT</b> selected."){
                            alert("Username or password is invalid.");
    
                        }else if (rawData === "MySQL connection FAILED<br><br>"){
                            alert("Could not connect to the database.");
    
                        }else if (rawData === "Failed to select DB<br><br>"){
                            alert("Could not connect to the database.");
                        }
                        Weight = rawData.Weight;
                        Height = rawData.Height;
                        Age = rawData.Age;
                        Activity = rawData.Activity;
                        //Calculate
                        let bmr = (66 + (13.7 * Weight + (5 * Height) - (6.8 * Age)));
                        let tdee = Math.floor(bmr * Activity);
                        //Populate info.
                        $('.weight').replaceWith('<p class="weight">Weight(kg): ' + Weight + '</p>');
                        $('.height').replaceWith('<p class="height">Height(cm): ' + Height + '</p>');
                        $('.age').replaceWith('<p class="age">Age: ' + Age + '</p>');
                        $('.activity').replaceWith('<p class="activity">Activity: ' + Activity + '</p>');
                        $('.tdee').replaceWith('<p class="tdee">TDEE: ' + tdee + '</p>');
                        //New View
                        $('#inputForm').slideUp().fadeOut();
                        $('#information').fadeIn().slideDown();
                        $('#information').css({"display": "flex"});
                        $('#loginForm').slideUp().fadeOut();
                        $('#signUpForm').fadeIn().slideDown();
                        $('.incorrectLogin').slideUp().fadeOut();
                    }
                },
                'json'
                );
            {
            // $.ajax({
            //     type: "POST",
            //     url: "php/retrieveUser.php",
            //     data: { "Username": Username, "Password": Password },
            //     success: function (data) {
            //         console.log(Weight = data.Weight);
            //         console.log(Height = data.Height);
            //         console.log(Age = data.Age);
            //         console.log(Activity = data.Activity);
            //         //Calculate
            //         let bmr = (66 + (13.7 * Weight + (5 * Height) - (6.8 * Age)));
            //         let tdee = Math.floor(bmr * Activity);
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
    $('#signUpForm').on('submit', (event) => {
        if ($('#signUpForm').valid() == true) {
            event.stopPropagation();
            event.preventDefault();	
            //Get letiables from within this form.
            let Username = $('#signUpUsername').val();
            let Password = $('#signUpPassword').val();
            //Get letiable from above this form.
            let Weight = +$('#weight').val();
            let Height = +$('#height').val();
            let Age = +$('#age').val();
            let Activity = +$('#activity').val();

            $.post(
                "php/newUser.php", 
                { Username: Username, Password: Password, Weight: Weight, Height: Height, Age: Age, Activity: Activity }, 
                (data) => {
                    //Check for no existing user, or an incorrect password.
                    if (data != "Username already exists, to replace data enter the correct password." 
                    && data != "Password is incorrect." 
                    && data != "User data was NOT inserted."){
                        $('.saved').fadeIn().slideDown();
                        $('.notSaved').slideUp().fadeOut();
                    }else{
                        $('.notSaved').fadeIn().slideDown();
                        $('.saved').slideUp().fadeOut();

                    }
                }
            );
        }
    });

    //Return to Home
    $('#returnButton').on('click', (event) => {
        event.stopPropagation();
        event.preventDefault();	
        //Go to home view
        $('#inputForm').fadeIn().slideDown();
        $('#information').slideUp().fadeOut();
        $('#loginForm').fadeIn().slideDown();
        $('.saved').slideUp().fadeOut();
        $('.notSaved').slideUp().fadeOut();
    });
});

