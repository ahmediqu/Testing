<?php
namespace App\Admin;
/**
 * 
 */
class Database
{
	
	public function connect(){
		$link = mysql_connect('localhost','root','','phpajaxcrud');
		return $link;
	}

	

}

?>