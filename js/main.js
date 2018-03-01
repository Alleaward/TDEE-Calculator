M.AutoInit();

var newUserSubmit = document.querySelector('#newUserSubmit');
var newUserDiv = document.querySelector('#newInput');

var loginSubmit = document.querySelector('#loginSubmit');
var loginDiv = document.querySelector('#loginInfo');

var userInfoSave = document.querySelector('#signUpButton');
var userInfo = document.querySelector('#userInfo');

var userReturn = document.querySelector('#returnButton');
// var ... = document.querySelector('#userInfo');


newUserSubmit.addEventListener('submit', (e) => {
    e.preventDefault();
    e.stopPropagation();
    console.log('newUserSubmit');
    
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
    $('.weight').replaceWith('<p class="weight">Weight(kg): ' + Weight + '</p>');
    $('.height').replaceWith('<p class="height">Height(cm): ' + Height + '</p>');
    $('.age').replaceWith('<p class="age">Age: ' + Age + '</p>');
    $('.activity').replaceWith('<p class="activity">Activity: ' + Activity + '</p>');
    $('.tdee').replaceWith('<p class="tdee">TDEE: ' + tdee + '</p>');

    userInfo.classList.remove("hideDiv");
    loginDiv.classList.add("hideDiv");
    newUserDiv.classList.add("hideDiv");
});

loginSubmit.addEventListener('submit', (e) => {
    e.preventDefault();
    e.stopPropagation();
    console.log('loginSubmit');
    userInfo.classList.remove("hideDiv");
    loginDiv.classList.add("hideDiv");
});

userInfoSave.addEventListener('submit', (e) => {
    e.preventDefault();
    e.stopPropagation();
    console.log('userInfoSave');
});

userReturn.addEventListener('submit', (e) => {
    e.preventDefault();
    e.stopPropagation();
    console.log('userReturn');
    userInfo.classList.add("hideDiv");
    loginDiv.classList.remove("hideDiv");
    newUserDiv.classList.remove("hideDiv");
});