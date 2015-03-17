<?php
/**
 * Created by PhpStorm.
 * User: Vitaly
 * Date: 11.03.15
 * Time: 10:47
 */

class Database {
    protected static $_instance;
    private $_host = "localhost";
    private $_username = "root";
    private $_password = "";
    private $_database = "gdk_touragency";
    private $_connection;

    static public function getInstance()
    {
        if(self::$_instance === null) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function __construct()
    {
        $this->_connection = new \mysqli($this->_host, $this->_username,
            $this->_password, $this->_database) or die("Database connection error");
    }

    private function __clone() { }

    public function getConnection()
    {
        return $this->_connection;
    }

    public function query($command)
    {
        return $this->getConnection()->query($command);
    }

    
}
