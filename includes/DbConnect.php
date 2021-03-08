<?php
class DbConnect
{

    private $con;

    function connect()
    {
        include_once dirname(__FILE__)  . '/Constants.php';

        $host = DB_HOST;
        $user = DB_USER;
        $pass = DB_PASSWORD;
        $dbname = DB_NAME;
        //Connect Database using PHP PDO CRUD
        $this->con = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET time_zone = '+01:00'"));

        //Set Error Mode
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //Set Default fetch mode from the DB
        $this->con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $this->con;

        // $this->con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        // if (mysqli_connect_errno()) {
        //     echo "Failed  to connect " . mysqli_connect_error();
        //     return null;
        // }
        // return $this->con;
    }
}
