<?php
/**
 * Created by PhpStorm.
 * User: Vitaly
 * Date: 11.03.15
 * Time: 10:47
 */

namespace classes;

class Database {
    protected static $_instance;

    static public function getInstance()
    {
        if(self::$_instance === null) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    private function __construct()
    {

    }

    private function __clone() { }

}
