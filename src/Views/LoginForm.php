<?php

namespace Views;


class LoginForm extends View
{
    public function __construct()
    {
        $this->content = <<<LOGIN_FORM
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    <title>CS4350 Project One Login</title>
    <link rel="shortcut icon" type="image/png" href="/favicon.png"/>


        <style>
          html {
            font-family: sans-serif;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
          }


          body{
            color: #4E4790;
            font-size: medium;
            margin: 0;
            background: #E9E6FC;
          }
          a {
            color: whitesmoke;
            text-decoration: none;
          }

          a:hover
          {
            color: whitesmoke;
            text-decoration:none;
            cursor:pointer;
          }

          .nav{
            color: whitesmoke;
            background: #4E4790;
            height: 30px;
            padding-top: 10px;
            padding-left: 10px;
          }

          .container{
            margin-top:10px;
            border-radius: 5px;
            width: 250px;
            margin: 0 auto;
            text-align: center;
            background: #D9D0F6;
            padding: 3px 10px 10px 10px;
          }

          .formcontrol{
            padding: 5px;
            text-align: left;
            font-size: small;
            color: #4E4790;
          }


          input[type="text"] {
            display: block;
            margin: 0;
            height:30px;
            width: 100%;
            color: inherit;
            font-family: sans-serif;
            font-size: 15px;
            appearance: none;
            box-shadow: none;
            border-radius: none;
          }
          input[type="email"] {
            display: block;
            margin: 0;
            height:30px;
            width: 100%;
            color: inherit;
            font-family: sans-serif;
            font-size: 15px;
            appearance: none;
            box-shadow: none;
            border-radius: none;
          }
          input[type="text"]:focus {
            outline: none;
          }
          input[type="password"] {
            display: block;
            margin: 0;
            height:30px;
            width: 100%;
            color: inherit;
            font-family: sans-serif;
            font-size: 15px;
            appearance: none;
            box-shadow: none;
            border-radius: none;
          }
          input[type="password"]:focus {
            outline: none;
          }
          .button {

            background-color: #4E4790;
            -moz-border-radius: 3px;
            -webkit-border-radius: 3px;
            color: whitesmoke;
            width:90px;
            height:30px;
            text-decoration: none;
            cursor: pointer;
            border:none;

          }
          .footer{
            margin-top:148px;
            height: 800px;
            background: #C3BBEE;


          }

          .form{
            position: relative;
            padding: 20px;
            margin-top: -940px

          }

          .radio{
            margin-left: -2px;

          }

          .tab {
            width:90px;
            height:30px;
            text-decoration: none;
            cursor: pointer;
            border:none;
            font-size: medium;
            padding: 5px 10px;
          }

          .tab-active {
            background-color: #4E4790;
            color: whitesmoke;
          }

          .tab-inactive {
            background-color: #D9D0F6;
            color: #4E4790;
          }
        </style>
    </head>
    <body>
        <div id="parent" align="center">
            <form id="loginForm">
              <div class="container">
                <div style="margin: 10px">
                  <a class="tab tab-inactive" onclick="showRegister()">Register</a>
                  <a class="tab tab-active" onclick="showLogin()">Login</a>
                </div>
                <div id="error" class="hide" style="margin-bottom: 5px; color: firebrick"></div>
                <div class="formcontrol">
                  <label for="username">Username</label>
                  <input type="text" id="username" name="username" autocomplete="off">
                </div>
                <div class="formcontrol">
                  <label for="username">Password </label>
                  <input type="password" id="password" name="password">
                </div>
                <div style="text-align: right; margin-top:10px;">
                  <input class="button" type="button" value="Login" onclick="formSubmit()">
                </div>
              </div>
              <div>
              <p>username: daryl</p>
              <p>password: 12345678</p>
              </div>
            </form>

            <form id="registrationForm">
              <div class="container">
                <div style="margin: 10px">
                  <a class="tab tab-active" onclick="showRegister()">Register</a>
                  <a class="tab tab-inactive" onclick="showLogin()">Login</a>
                </div>
                <div id="error2" class="hide" style="margin-bottom: 5px; color: firebrick"></div>
                <div class="formcontrol">
                  <label for="username">Username</label>
                  <input type="text" id="regUsername" name="regUsername" autocomplete="off">
                </div>
                <div class="formcontrol">
                  <label for="username">New Password</label>
                  <input type="password" id="regPassword" name="regPassword">
                </div>
                <div class="formcontrol">
                  <label for="username">Confirm Password</label>
                  <input type="password" id="confPassword" name="confPassword">
                </div>
                <div class="formcontrol">
                  <label for="fname">First Name</label>
                  <input type="text" id="fname" name="fname" autocomplete="off">
                </div>
                <div class="formcontrol">
                  <label for="lname">Last Name</label>
                  <input type="text" id="lname" name="lname" autocomplete="off">
                </div>
                <div class="formcontrol">
                  <label for="email">Email</label>
                  <input type="email" id="regEmail" name="regEmail">
                </div>
                <div class="formcontrol">
                  <label for="twitter">Twitter Handle</label>
                  <input type="text" id="regTwitter" name="regTwitter">
                </div>
                <div style="text-align: right; margin-top:10px;">
                  <input class="button" type="button" value="Get Started!" onclick="register()">
                </div>
              </div>
            </form>
        </div>
    </body>
</html>

<script>
  $(document).ready(function() {
    $("#error").hide();
    $("#loginForm").hide();
  });

  function showRegister() {
    $("#loginForm").hide();
    $("#registrationForm").show();
  }

  function showLogin() {
    $("#loginForm").show();
    $("#registrationForm").hide();
  }

	function formSubmit() {
		$.post('/login/', $("#loginForm").serialize()).done(function (data) {
          if (data === 'false') {
            $("#error").show();
            $("#error").html("Wrong username or password");
            document.getElementById("password").value = '';
            document.getElementById("password").focus();
          } else {
            $("#parent").html(data);
          }
		});
	}

  function register() {

    if(document.getElementById("regUsername").value ==''){
      $("#error2").show();
      $("#error2").html("Please Enter a Username");
    }
    else if(document.getElementById("regPassword").value ==''){
      $("#error2").show();
      $("#error2").html("Please Enter Password");
    }
    else if(document.getElementById("confPassword").value ==''){
      $("#error2").show();
      $("#error2").html("Please Re-Enter Password");
    }
    else if(document.getElementById("regPassword").value !== document.getElementById("confPassword").value){
      $("#error2").show();
      $("#error2").html("Passwords don't match");
    }
    else if(document.getElementById("fname").value ==''){
      $("#error2").show();
      $("#error2").html("Please Enter First Name");
    }
    else if(document.getElementById("lname").value ==''){
      $("#error2").show();
      $("#error2").html("Please Enter Last Name");
    }
    else if(document.getElementById("regEmail").value ==''){
      $("#error2").show();
      $("#error2").html("Please Enter Email Address");
    }
    else{
      $.post('/register/', $("#registrationForm").serialize()).done(function (data) {
        //alert(data);
        if(data === "false"){
            $("#error2").show();
            $("#error2").html("User already exists");
        }else {
            $("#parent").html(data);
        }
      });
    }
  }
</script>


LOGIN_FORM;
    }
}
