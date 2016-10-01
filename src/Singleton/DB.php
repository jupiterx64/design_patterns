<?php

namespace DP\Singleton;

class DB
{
    private static $instance;

    private $db_name;

    private $db_user;

    private $db_pwd;

    public function __construct() {
        $this->db_name = 'test_db';
        $this->db_user = 'username';
        $this->db_pwd = 'dbpwd';

        // OPEN AND CREATE CONNECTION TO DB
        echo 'Created connection...';
    }

    // If there IS instance of this class already, use it!
    // But, if there IS NO instance of this class, create new!
    public static function instance() {
        self::$instance = isset(self::$instance) ? self::$instance : new DB;

        return self::$instance;
    }

    public function query($statement) {
        echo $statement;
    }
}
