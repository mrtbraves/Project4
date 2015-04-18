<?php

namespace Views;


class WelcomeView extends View
{

    public function __construct($data = array())
    {
      //print_r($data);

      $userId = $data['userId'];
      $username = $data['username'];
      $fullname = $data['fname']." ".$data['lname'];

      $twitter = $data['twitter'];
      $regdate = date('m/d/Y', $data['regdate']);

        $this->content = <<<WELCOME
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Welcome</title>
        <style>
          html {
            font-family: sans-serif;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;

          }


          body{

            font-size: medium;
            margin: 0;
            background: #E9E6FC;
          }
          h2, h4{
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
          .profile{
            margin-top:10px;
            border-radius: 5px;
            text-align: left;
            margin: 0 auto;

            background: #D9D0F6;
            padding: 3px 10px 10px 10px;

          }

          .formcontrol{
            padding: 5px;
            text-align: left;
            font-size: small;
            color: #4E4790;
          }

          .footer{
            margin-top:104px;
            height: 800px;
            background: #C3BBEE;


          }

          #title{
            margin-top: 15px;
            text-align: center;
          }


        </style>
    </head>
    <body>
      <div id="title">
        <h2>Welcome to our site</h2>
      </div>
      <div class="profile">
          <p>User ID: $userId</p>
          <p>Username: $username</p>
          <p>Full Name: $fullname</p>
          <p>Twitter Handle: $twitter</p>
          <p>Registration Date: $regdate</p>

      </div>
      <div id="twitterfeed"></div>
      <div class="footer"></div>


    </body>
</html>

WELCOME;
    }
}