<?php
namespace App
/**
 * 
 */
use App\Admin\Database;
class Post
{
	
	function __construct()
	{
		
	}

	$connect_db = new Database;

	public function insert(){
		if(isset($_POST['save'])){
			if(isset($_POST['title']) && isset($__POST['description'])){
				if(!empty($_POST['title']) && !empty($__POST['description'])){
					 $title = $__POST['title'];
					 $description = $__POST['description'];
					 $query = "INSERT INTO posts(title,description) VALUES ('$title','$description') ";
					 if($sql = $connect_db->conn->exec($query)){
					 	echo "Saved";
					 }else{
					 	echo "error";
					 }
				}else{
					echo"<div class='alert alert-danger' role='alert'>
					  A simple danger alert—check it out!
					</div>";
				}
			}
		}
	}
}
?>