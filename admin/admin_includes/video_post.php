
 <?php

class video_details {
  public $video_file;
  public $video_duration;
  public $video_resolution;
  public $video_type;

  public function __construct($duration,$resolution,$type){
    echo "line 2".'<br>';
    $connec = mysqli_connect('localhost','root','','cms_new');
    $this->video_duration=mysqli_real_escape_string($connec,$duration);
    $this->video_resolution=mysqli_real_escape_string($connec,$resolution);
    $this->video_type=mysqli_real_escape_string($connec,$type);
    echo "line 3".'<br>';

  }

  public function addPostVideo($video_name) {
    $connec = mysqli_connect("localhost", "root","", "cms_new");
    $q="insert into video_post_details (video_url,video_duration,video_resolution,video_type) values ('$video_name','$this->video_duration','$this->video_resolution','$this->video_type')";

	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }
	  



    $result = mysqli_query($connec, $q);


	if (!$result) {
		echo "Error: " . mysqli_error($connec);
	  }

    echo "line 4".'<br>';
    if($result){
      echo "Insert successfully bhai";
    }else{
      echo "Failed to insert data. Error: ".mysqli_error($connec);
    }
    echo "line 5".'<br>';
   // die("Execution stopped at line " . __LINE__);
   
  }


}
 ?>


// <?php
if(isset($_POST['addvideosubmit'])) {

  echo "line 7 video uploaded succesully".'<br>';
  $video_name = $_FILES['video_file']['name'];

  $duration = $_POST['video_duration'];
  $resolution = $_POST['video_resolution'];
  $type = $_POST['video_type'];
  
    $post = new video_details($duration, $resolution, $type);
    echo "line 8".'<br>';

    $post->addPostVideo($video_name);
    //die("Execution stopped at line " . __LINE__);
    if(isset($post)){
      echo "line 11";
    }else{
      echo "line 12";
    }
    //move_uploaded_file($tmp_name, 'uploads/'.$video_name);
  } 

?>
<?php
echo "line 9".'<br>'?>




















	<form method="POST" action="" enctype="multipart/form-data">
		<div class="form-group" style="margin-bottom: 40px;">
			<label for="video_file">Video file:</label>
			<input type="file" class="form-control" name="video_file" id="video_file" accept="video/*" ><br><br>
		</div>
			<div class="form-group" style="margin-bottom: 70px;">
				<label for="video_duration">Video duration:</label>
				<input type="text" class="form-control" name="video_duration" id="video_duration" min="1"><br><br>
			</div>
			<div class="row">
				<div class="col-md-4">
					<label for="video_resolution">Video resolution:</label>
					<select name="video_resolution" id="video_resolution">
						<option value="">Select a resolution</option>
						<option value="240p">240p</option>
						<option value="360p">360p</option>
						<option value="480p">480p</option>
						<option value="720p">720p</option>
						<option value="1080p">1080p</option>
						<option value="4K">4K</option>
					</select><br><br>
					<label for="video_type">Video type:</label>
					<select name="video_type" id="video_type">
						<option value="">Select a type</option>
						<option value="mp4">MP4</option>
						<option value="avi">AVI</option>
						<option value="mkv">MKV</option>
						<option value="flv">FLV</option>
						<option value="webm">WEBM</option>
					</select><br><br>
					<div class="container">
					<input type="submit" name="addvideosubmit" value="Submit" style="margin-top: 200px;">
					</div>
				</div>
			</div>
		</div>
	</form>


 <?php include 'C:\xampp\htdocs\final_checking_oops\admin\admin_includes\admin_footer.php';?>
