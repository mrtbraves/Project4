<?php

/**
 * SQLiteDb.php
 * Used to receive users from MySqlDatabase
 * Created by PhpStorm.
 * User: chuck
 * Date: 2/27/15
 * Time: 8:24 PM
 */
namespace Common\Authentication;

use Common\Connections\SQLite;


class SQLiteDb
{


    protected $sqliteDb;
    protected $users = array();


    public function __construct(){

        //$db = new ConnectSqlite();

        $this->sqliteDb = SQLite::getInstance();

        if(!$this->sqliteDb){
            echo $this->sqliteDb->lastErrorMsg();

        }

        $sql = "select * from users";
        $ret = $this->sqliteDb->query($sql);


        while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
            $this->users[] = array(
                'userId' => $row['userId'],
                'username' => $row['username'],
                'password' => $row['password'],
                'twitter' => $row['twitter'],

            );
        }

        //$this->sqliteDb->close();

        //print_r($this->users);

    }

    public function getUsers() {
        return $this->users;
    }

    public function insert($sql){

        return $this->sqliteDb->exec($sql);
    }


}
