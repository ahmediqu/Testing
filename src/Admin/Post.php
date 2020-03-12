<?php
namespace App\Admin;
/**
 * 
 */
use App\Admin\Database;
class Post 
{

	
	public function insert(){
		
		if(isset($_POST['save'])){
			if(isset($_POST['title']) && isset($_POST['description'])){
				if(!empty($_POST['title']) && !empty($_POST['description'])){
					 $title = $_POST['title'];
					 $description = $_POST['description'];
					  $query = "INSERT INTO posts(`title`,`description`) VALUES ('$title','$description')";
					  $result = mysqli_query(Database::connect(),$query);
					 
					 if(isset($result)){
					 	echo "<div class='alert alert-success' role='alert'>
					  Successfully Saved !!
					</div>";
					 }else{
					 	echo "error";
					 }
				}else{
					echo "<div class='alert alert-danger' role='alert'>
					  Please fill following step
					</div>";
				}
			}
		}
	}

	public function getData(){
		$result = null;
		$data = "SELECT * FROM `posts`";
		$result = mysqli_query(Database::connect(),$data);
		return $result;
	}

	public function delete(){
		$del_id = $_POST['del_id'];
		$data = "DELETE FROM `posts` where `id`='$del_id'";
		$result = mysqli_query(Database::connect(),$data);
		
		if(isset($result)){
		 	echo "<div class='alert alert-success' role='alert'>
		  Successfully Deleted !!
		</div>";
		 }else{
		 	echo "error";
		}
	}

	public function edit(){
		$edit_id = $_POST['edit_id'];
		$data = "SELECT * FROM `posts` where `id`='$edit_id'";
		$result = mysqli_query(Database::connect(),$data);
		return $result;
	}
}
?>