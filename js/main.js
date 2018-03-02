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

    // function submitForm() {
    //     var http = new XMLHttpRequest();
    //     http.open("POST", "<<whereverTheFormIsGoing>>", true);
    //     http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    //     var params = "search=" +  'get search value' // probably use document.getElementById(...).value
    //     http.send(params);
    //     http.onload = function () {
    //         alert(http.responseText);
    //     }
    // }

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
    newUserDiv.classList.add("hideDiv");


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