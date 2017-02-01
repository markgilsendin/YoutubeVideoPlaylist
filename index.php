<?php
	include 'db_connection.php';
	$stmtView=$connection->prepare("SELECT id,url,video_thumbnail FROM videos");
	$stmtView->execute();
	$stmtView->bind_result($stmtId,$stmtViewUrl,$stmtViewVideoThumbnail);
	
?>

<!DOCTYPE HTML>
<html>
<head>
<title></title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/custom.css">
<script src="js/jquery-2.1.1.min.js"></script>
<script src="js/bootstrap.js"></script>	
</head>
<body>
	
	<div class="container">
		<div class="row">
			<div align="right" class="col-md-10 offset-md-1 btn-pos">
				<a href="add.php" type="button" class="btn btn-primary">Add New Video</a>
			</div>	
		</div>
		<div class="row">
			<div class="col-md-10 offset-md-1">
				<div class="embed-responsive embed-responsive-21by9">
	    			<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/_AqM9U3mi9A" id="videoPlayer"></iframe>
	  			</div>
  			</div>
		</div>
		
		<div class="row">
			<div class="col-md-10 offset-md-1 video-links-spacing">
				<table class="table table-bordered">
					<thead class="table-inverse">
						<th class="title-align">Video Thumbnail</th>
						<th class="title-align">Video URL</th>
						<th class="title-align">Manage</th>
					</thead>
					<tbody align="center">

						<?php
							while($stmtView->fetch())
							{
								echo"<tr>";
								echo"<td><img src='https://img.youtube.com/vi/".$stmtViewVideoThumbnail."/0.jpg' class='video-thumbnail img-responsive' width='150' height='100'>
									</img></td>";
								echo"<td><a href='' class='link-video'>$stmtViewUrl</a></td>";	
								echo"<td><a href='delete_video.php?id=$stmtId' class='btn btn-primary'>DELETE</a></td>";
								echo"</tr>";	
							}
						?>
					</tbody>
				</table>	
			</div>	
		</div>
	</div>

<script>
	
var idCount = 1;
$('.link-video').each(function() {
	$(this).attr('id', 'video' + idCount);
	idCount++;
});

$(document).ready(function(){
	$('.link-video').click(function(e){
		e.preventDefault();
		$('#videoPlayer').attr('src',$(this).text());
	})
});
//var videoPlayerId=this.id;
//var videoPlayerSrc = $(this).text();
</script>
</body>
</html>
