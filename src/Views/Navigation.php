<?php

namespace Views;


class Navigation
{
    public function __construct()
    {

        $this->content = <<<NAVIGATION

<style>
    .logout {

        background-color: #4E4790;

        color: whitesmoke;
        width:90px;
        height:30px;
        text-decoration: none;
        cursor: pointer;
        border:none;
        font-size: medium;

    }
</style>
<div class="nav">
    CS4350 Project Three

        <div style="float: right; margin-top:-5px; margin-right:10px">
            <input class="logout" type="submit" value="Logout" onclick="logout()">
        </div>

</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.js"></script>

<script>
    function logout() {
        location.replace("/login/");
    }
</script>

NAVIGATION;
    }
}







