<?Php
include 'connect.php';
	if(isset($_POST['upload']) && $_FILES['userfile']['size'] > 0){
		$fileName = $_FILES['userfile']['name'];
		$tmpName  = $_FILES['userfile']['tmp_name'];
		$fileSize = $_FILES['userfile']['size'];
		$fileType = $_FILES['userfile']['type'];
		$fp      = fopen($tmpName, 'r');
		$content = fread($fp, filesize($tmpName));
		$content = addslashes($content);
		fclose($fp);
		if(!get_magic_quotes_gpc()){
			$fileName = addslashes($fileName);
		}
		if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['phone'])){
		$name = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $plat = $_POST['plat'];
         $query = "insert into users (id, name, email, mobile, platform, status, file, type, size, content,date) values ('', '$name', '$email', '$phone','$plat', 'Under Processing....!','$fileName','$fileType', '$fileSize', '$content',now())";
            if($query_run = mysql_query($query)){
				echo"<script>confirm('Sucessfully Registed');
							window.location.href='display.php';
				</script>";
                }else{
                echo 'Sorry, We couldn\'t register you at this time. Try again later';
                }            
	}//inner if
}//out if
?>
<!doctype html>
<html lang="en" class="no-js">
<head>
	<title>File Uploading and downloading</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" media="screen">

	<style>
</style>
</head>
<body>
	<div id="container" class="boxed">
		
		<div id="content">
			
		<div class="about-box">
			<div class="container">
				<div class="row" style="margin-top:20px;">
					<div class="col-md-6">
						<div class="panel panel-default">
							<div class="panel-heading"><label>File Uploading And Downloading</label></div>
								<div class="panel-body">
								<div class="well">
									<form method="post" enctype="multipart/form-data">
										<div class="form-group">
										<label>FullName</label>
										<input type="text" class="form-control" name="username" value="" placeholder="Fullname" id="fname">
										</div>
										<div class="form-group">
										<label>Email</label>
										<input type="text" class="form-control" name="email" value="" placeholder="E-mail Address" id="email">
										<p id="Status_mail"></p>
										</div>
										<div class="form-group">
										<label>Mobile</label>
										<input type="text" class="form-control numbersOnly" id="mobile" name="phone" placeholder="Enter Numbers Only" maxlength="10">
										<p id="Status_Cell"></p>		
										</div>
										<div class="form-group">
										<label>Platform</label>
										<input type="text" class="form-control" id="plat" name="plat" placeholder="Enter Platfrom">
										<small>Ex: Java,.net,php</small>
										</div>
										<div class="form-group">
										<label>Upload</label>
										<input type="hidden" name="MAX_FILE_SIZE" value="2000000">
										<input name="userfile" class="form-control" type="file" id="userfile"> <br>
										<small>Upload .Doc File Only</small>
										</div>
									<input name="upload" type="submit" class="btn btn-primary btn-lg" id="upload" value="Register">
									</form>
								</div>
								</div>								
							</div>
						</div>
					
					</div><!--End row-->
				</div><!--End about box - Container-->
			</div><!--End about-box-->
		
</div><!-- End content -->

</div><!-- End Main Container -->
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/notify.min.js"></script>
	<script type="text/javascript" src="js/job.js"></script>
</body>
</html>