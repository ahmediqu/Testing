<?php
session_start();
include_once("vendor/autoload.php");
date_default_timezone_set('Asia/Dhaka');
use App\Admin\Post;
$post = new Post;
$page = $_GET['page'];

if ($page == 'addPost') { 
    $post->insert();

}
?>