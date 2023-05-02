
<!-- <?php //include '../includes/database.php';    ?>
<?php //include '../includes/header.php';?>
<?php //include '../includes/functions.php';?> -->


<head>
	<title>Your Web Page Title</title>
	<link rel="stylesheet" type="text/css" href="show.css">
</head>

	// <!-- <a href="index.php">UPLOAD</a> -->
	 <?php $value = $_GET['value'];
	echo $value;
	//echo "mike check";?>
	<div class="alb">
		<?php 
		 include "db_conn.php";
		 $sql = "SELECT * FROM videos";

		 if($value=="video"){

		 $sql = "SELECT * FROM videos where video_url like '%mp4%'";
		 $res = mysqli_query($conn, $sql);
		 if (mysqli_num_rows($res) > 0) {
			while ($video = mysqli_fetch_assoc($res)) {
		?>
			<div class="video-container">
					<span class="glyphicon glyphicon-time"></span>
					<p class="video-title">
						<video width="1000px" height="400px" src="uploads/<?=$video['video_url']?>" controls></video>
					</p>
					<hr class="hr-line">
				</div>
		<?php
			}
			
		}else {
					 echo "<h1>Empty</h1>";
				 }
				 ?>
			</div>
	
		<?php
		}else if($value=='audio'){
			$sql = "SELECT * FROM videos where video_url like '%m4a%'";
		
		
		
			$res = mysqli_query($conn, $sql);
			if (mysqli_num_rows($res) > 0) {
			   while ($video = mysqli_fetch_assoc($res)) {
		   ?>
			   <div class="video-container">
					   <span class="glyphicon glyphicon-time"></span>
					   <p class="video-title">
						   <audio controls>
							<source src="uploads/<?=$video['video_url']?>" type="audio/mpeg">controls>  </audio>
					   </p>
					   <hr class="hr-line">
				   </div>
		   <?php
			   }
			   
		   }else {
						echo "<h1>Empty</h1>";
					}




		}else if($value=='pdf'){
			// <h1>check pdf files</h1>
					$sql = "SELECT * FROM videos where video_url like '%pdf%'";
					
					$res = mysqli_query($conn, $sql);
					if($res){
						//echo "checking pdf files that roking";
					}
					if (mysqli_num_rows($res) > 0) {
						while ($video = mysqli_fetch_assoc($res)) {
							//echo "checking pdf files that roking";

							?>

                  <div class="video-container">
                <span class="glyphicon glyphicon-time"></span>
                <p class="video-title">
					
                    <embed src="uploads/<?=$video['video_url']?>" type="application/pdf" width="100%" height="500px" />
                </p>
                <hr class="hr-line">
<?php
						}}else{
							echo "empty not is attached";
						}
				}
					?>
			   </div>
		
		
		
		
		
		
          
		 
		<!-- <?php //include '../includes/navigation.php';


if (mysqli_num_rows($res) > 0) {
	while ($video = mysqli_fetch_assoc($res)) {
?> -->
	<div class="video-container">
			<span class="glyphicon glyphicon-time"></span>
			<p class="video-title">
				<video width="300px" height="168px" src="uploads/<?=$video['video_url']?>" controls></video>
			</p>
			<hr class="hr-line">
		</div>
<?php
	}
}else {
		 	echo "<h1>Empty</h1>";
		 }
		 ?>
	</div>
	<!-- <?php  //include '../includes/sidebar.php'; ?>      -->
<!-- <?php  //include '../includes/footer.php'; ?> -->
