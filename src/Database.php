<?php
namespace App
/**
 * 
 */
use PDO;

class Database
{
	private $conn = null;
	function __construct()
	{
		$this->conn = new PDO('mysql:host=localhost;dbname=phpajaxcrud', 'root', '', array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
            )
        );
	}

	

}

?>