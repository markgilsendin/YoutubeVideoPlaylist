<?php
	include 'db_connection.php';

	$video_to_delete=$_GET['id'];

	$stmt = $connection->prepare("DELETE FROM videos WHERE id=?");
	$stmt->bind_param("i", $video_to_delete);
	$stmt->execute();
	$stmt->close();
	$connection->close();
	header('Location:index.php');
	
?>