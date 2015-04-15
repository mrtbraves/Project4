<?php

/**
 * Class Authenticate
 * User: Chuck
 * Created: Feb 27, 2015
 */



namespace Common\Authentication;



class Authenticate implements IAuthentication
{

    protected $username;
    protected $password;
    protected $model;
    protected $users;

    public function __construct()
    {
        $this->model = new SQLiteDb();
        $this->users = $this->model->getUsers();
    }

    public function authenticate($username = '', $password = '')
    {
        function checkUser($users, $username, $password) {
            foreach($users as $user){
                if ($username == $user['username']  && $password == $user['password']) {
                    return true;
                }
            }
            
            return false;
        }

        if ($username !== '') {
            $this->username = $username;
        }

        if ($password !== '') {
            $this->password = $password;
        }

        return checkUser($this->users, $this->username, $this->password);
    }
}