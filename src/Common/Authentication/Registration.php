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



class Registration
{

    protected $username;
    protected $password;
    protected $db;
    protected $users;
    protected $twitter;
    protected $firstName;
    protected $lastName;
    protected $email;

    public function __construct()
    {
        $this->db = new SQLiteDb();
        $this->users = $this->db->getUsers();
    }

    public function addUser($username = '', $password = '', $twitter='', $email, $firstName, $lastName)
    {

        if ($username !== '') {
            $this->username = $username;
        }

        if ($password !== '') {
            $this->password = $password;
        }
        if ($twitter !== '') {
            $this->twitter = $twitter;
        }
        if ($firstName !== '') {
            $this->firstName = $firstName;
        }
        if ($lastName !== '') {
            $this->lastName = $lastName;
        }
        if ($email !== '') {
            $this->email = $email;
        }
        //Check if user already exists
        foreach($this->users as $u){
            if($u['username']===$username){
                return false;

            }
        }
        $regDate = time();

        $sql = "INSERT INTO users (username, password, twitter, fname, lname, regdate, email) VALUES ('".$this->username."', '".$this->password."', '".$this->twitter."', '".$this->firstName."', '".$this->lastName."', '$regDate', '".$this->email."');";

        $result = $this->db->insert($sql);

        return $result;


    }
}