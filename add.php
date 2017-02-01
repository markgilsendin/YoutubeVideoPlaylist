<?php
	include 'db_connection.php';
	if(isset($_POST['submit'])){
		$url=$_POST['urlName'];
		
		$urlImage =$_POST['urlName'];
		$imgUrl=substr($url, strpos($urlImage, "embed/") +6,11);
		
		
		$stmt=$connection->prepare("INSERT INTO videos(url,video_thumbnail) VALUES(?,?)");
		$stmt->bind_param("ss",$stmtUrl,$stmturlImage);
		$stmtUrl=$url;
		$stmturlImage=$imgUrl;
		$stmt->execute();
		header('Location:index.php');
	}
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
			<form class="search-box col-md-8 offset-md-2" method="POST">
				<div class="input-group">
      				<input type="text" class="form-control" name="urlName" placeholder="Add New URL...">
      				<span class="input-group-btn">
        				<input type="submit" name="submit" value="ADD" class="btn btn-secondary"/>
      				</span>
      			
    			</div>
  			</form>
		</div>
  </div>
  
  </body>
</html>  