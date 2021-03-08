<?php
//new line
error_reporting(E_ALL);
ini_set('display_errors', 1);
class DbOperations
{
    private $con;
    function __construct()
    {
        require_once dirname(__FILE__) . '/DbConnect.php';
        $db = new DbConnect;
        $this->con = $db->connect();
    }
    
    
}