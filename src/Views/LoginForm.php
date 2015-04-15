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
          h4{
            color: #4E4790;
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



        </style>
    </head>
    <body>
        <div id="parent" align="center">
            <form id="loginForm">
              <div class="container">

                <h4>Please Login</h4>
                <div id="error" class="hide" style="margin-bottom: 5px; color: firebrick">Wrong username or password</div>
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
        </div>
    </body>
</html>

<script>
  $(document).ready(function() {
    $("#error").hide();
  });

	function formSubmit() {
		$.post('/login/', $("#loginForm").serialize()).done(function (data) {
          if (data === 'false') {
            $("#error").show();
            document.getElementById("password").value = '';
            document.getElementById("password").focus();
          } else {
            $("#parent").html(data);
          }
		});
	}
</script>


LOGIN_FORM;
    }
}
