<?php
// include_once("vendor/autoload.php");
// date_default_timezone_set('Asia/Dhaka');
// use App\Admin\Post;
// $post = new Post;
// $edit_data = $post->edit();

?>
<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<title>PHP APP</title>
	</head>
	<body>
		<div class="container mt-5 mb-5">
			<div class="row justify-content-center">
				<div class="col-md-8">
					
					<div class="jumbotron">
						<h2>Add Data</h2>
						<form  method="post" id="form">
							<div id="result"></div>
							<div id="show"></div>
							<div class="form-group">
								<label for="">Title</label>
								<input type="text" id="title" class="form-control" name="title">
							</div>
							<div class="form-group">
								<label for="">Description</label>
								<textarea name="description" id="description" cols="5" rows="5" class="form-control"></textarea>
							</div>
							<div class="form-group">
								<input type="submit" class="btn btn-info btn-lg" id="save">
							</div>
						</form>
						<br><br>
						<div id="getData"></div>
						
					</div>
				</div>
			</div>
		</div>
		<!-- Edit model -->
		<!-- Modal -->

		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script
		src="https://code.jquery.com/jquery-3.4.1.js"
		integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
		crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
		<script>
			
				$(document).on("click","#save",function(e){
					e.preventDefault();
					var title = $('#title').val();
					var description = $('#description').val();
					var save = $('#save').val();
					$.ajax({
						url: 'store.php?&page=addPost',
						type: 'post',
						data:{
							title:title,
							description:description,
							save:save
						},
						success:function(data){
							getData();
							$('#result').html(data);
						}
					});
					$('#form')[0].reset();
				});
				function getData(){
					$.ajax({
						url:'store.php?&page=getData',
						type:'POST',
						success:function(data){
							$('#getData').html(data);
						}
					});
				}
				getData();
			// Delete Data
			$(document).on("click","#del",function(e){
					e.preventDefault();
					var del_id = $(this).attr("value");
					if(window.confirm("do you want delete recourd?")){
					$.ajax({
						url: 'store.php?&page=deletePost',
						type: 'post',
						data:{
							del_id:del_id
						},
						success:function(data){
							getData();
							$('#show').html(data);
						}
					});
				}else{
					return false;
				}
			});
			// Edit
			$(document).on("click","#edit",function(e){
					e.preventDefault();
					var edit_id = $(this).attr("value");


					$.ajax({
						url: 'store.php?&page=editPost',
						type: 'post',
						data:{
							edit_id:edit_id
						},
						success:function(data){
							getData();
							$('#edit_data').html(data);
						}
					});
			});

			
		</script>
	</body>
</html>