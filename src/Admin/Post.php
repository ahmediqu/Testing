<?php
namespace App\Admin;
/**
 * 
 */
use App\Admin\Database;
class Post 
{

	
	public function insert(){
		$db = new Database();
		if(isset($_POST['save'])){
			if(isset($_POST['title']) && isset($_POST['description'])){
				if(!empty($_POST['title']) && !empty($_POST['description'])){
					 $title = $_POST['title'];
					 $description = $_POST['description'];
					  $query = "INSERT INTO posts(`title`,`description`) VALUES (`$title`,`$description`) ";

					 if(isset($query)){
					 	echo "Saved";
					 }else{
					 	echo "error";
					 }
				}else{
					echo "<div class='alert alert-danger' role='alert'>
					  A simple danger alert—check it out!
					</div>";
				}
			}
		}
	}
}
?>