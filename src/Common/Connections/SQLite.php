<?php
/**
 * Created by PhpStorm.
 * User: chuck
 * Date: 2/22/15
 * Time: 9:51 AM
 * DB SQLite Connection Class
 */
//print_r($GLOBALS);

namespace Common\Connections;


class SQLite extends \SQLite3{

    private static $_instance =null;  //Stores Database Instance
    private $_sqlite,
        $_query,
        $_error = false,
        $_results,
        $_count = 0;

    //Construct DB Object
    public function __construct(){

            $this->_sqlite = $this->open('../src/Common/Data/cs4350.db');

    }

    public static function getInstance(){//Insures only only one connection


        if(!isset(self::$_instance)){

            self::$_instance = new SQLite();
        }

        return self::$_instance;

    }



}