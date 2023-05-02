<?php //include "../admin/admin_includes/admin_add_post.php"; ?>
boom boom boomm
<?php



?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>video upload php and mysql</title>
	<style>
		body {
			display: flex;
			justify-content: center;
			align-items: center;
			flex-direction: column;
			min-height: 100vh;
		}
		input {
			font-size: 2rem;
		}
		a {
			text-decoration: none;
			color: #006CFF;
			font-size: 1.5rem;
		}
	</style>
</head>
<body>
  

	<!-- <a href="view.php">Videos</a> -->
	<?php if (isset($_GET['error'])) {  ?>
		<p><?=$_GET['error']?></p>
	<?php } ?>
	<!-- $posting_id=$_GET['posting_id']; -->
	 <form action="upload.php?posting_id=".$posting_id;
	       method="post"
	       enctype="multipart/form-data">

	<input type="hidden" name="posting_id" value="<?php echo $_GET['posting_id']; ?>">

    

	 	<input type="file"
	 	       name="my_video">

	 	<input type="submit"
	 	       name="submit" 
	 	       value="Upload">
	 </form>
</body>
</html>