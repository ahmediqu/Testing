<?php
namespace App\Admin;
/**
 * 
 */
class Database
{
	
	public function connect(){
		$link = mysqli_connect('localhost','root','','phpwithajaxcrud');
		return $link;
	}

	

}

?>