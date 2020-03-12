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
	$post->edit();


}

?>