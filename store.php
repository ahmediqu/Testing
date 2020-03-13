<?php
session_start();
include_once("vendor/autoload.php");
date_default_timezone_set('Asia/Dhaka');
use App\Admin\Post;
$post = new Post;
$page = $_GET['page'];
if ($page == 'addPost') {
$post->insert();
}elseif ($page =='getData') {
	$showdata = $post->getData();
	
?>
<table class="table">
	<thead>
		<th>Sl.</th>
		<th>Title</th>
		<th>Description</th>
		<th>Action</th>
	</thead>
	<?php
	
		if(isset($showdata)){
			$sl = 0;
			foreach($showdata as $r){
				$sl++;
	?>
	<tr>
		<td><?php echo $sl;?></td>
		<td><?php echo $r['title']?></td>
		<td><?php echo $r['description']?></td>
		<td>
			<a href="#" id="edit"  data-toggle="modal" data-target="#exampleModal" class="btn btn-info btn-sm" value="<?php echo $r['id'];?>">Edit</a>
			<a href="#" id="del" class="btn btn-danger btn-sm" value="<?php echo $r['id'];?>">Delete</a>
		</td>
	</tr>
	<?php
			}
		}
	?>
	<tbody>
		
	</tbody>
</table>
<?php
}elseif($page == 'deletePost'){
	$post->delete();
}
elseif($page == 'editPost'){
	$editId = $_POST['edit_id'];
	// echo $editId;
	$row = $post->edit($editId);
	$result = mysqli_fetch_assoc($row);
	// echo $row['title'];
	if(!empty($result)){
?>
<!-- Button trigger modal -->
<form  method="post" id="form">
	<div id="updatemsg"></div>
	<input type="hidden" name="update_id" id="update_id" value="<?php echo $result['id'];?>">
	<div class="form-group">
		<label for="">Title</label>
		<input type="text" value="<?php echo $result['title'];?>" id="edit_title" class="form-control" name="title">
	</div>
	<div class="form-group">
		<label for="">Description</label>
		<textarea name="description" id="edit_description" cols="5" rows="5" class="form-control"><?php echo $result['description'];?></textarea>
	</div>
</form>
<?php
}
}elseif ($page == 'updatePost') {
    $data['edit_title'] = $_POST['edit_title'];
	$data['edit_description'] = $_POST['edit_description'];
	$data['update_id'] = $_POST['update_id'];
					 
	$post->update($data);
}
?>