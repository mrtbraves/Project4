<?php
/**
 * File name: IAuthentication.php
 *
 * Project: Project1
 *
 * PHP version 5
 *
 * $LastChangedDate$
 * $LastChangedBy$
 */

/**
 * Class Authenticate
 * User: Chuck
 * Created: Feb 27, 2015
 */



namespace Common\Authentication;



class User
{
    protected $userId;
    protected $username;
    protected $twitter;
    protected $email;
    protected $firstName;
    protected $lastName;
    protected $regDate;
    public $userDetails;

    public function __construct($username)
    {

        $this->username = $username;

        $this->db = new SQLiteDb();
        $sql = "SELECT * FROM users WHERE username='$username';";
        $this->userDetails = $this->db->query($sql);


        $this->username= $this->userDetails['username'];
        $this->twitter= $this->userDetails['twitter'];
        $this->email= $this->userDetails['email'];
        $this->firstName= $this->userDetails['fname'];
        $this->lastName= $this->userDetails['lname'];
        $this->regDate = $this->userDetails['regdate'];


    }

    public function profile(){

            return $this->userDetails;
    }


}