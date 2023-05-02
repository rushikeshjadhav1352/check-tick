<?php 
$posting_id = $_POST['posting_id'];
if (isset($_POST['submit']) && isset($_FILES['my_video'])) {
	include "db_conn.php";
    $video_name = $_FILES['my_video']['name'];
    $tmp_name = $_FILES['my_video']['tmp_name'];
    $error = $_FILES['my_video']['error'];

    if ($error === 0) {
    	$video_ex = pathinfo($video_name, PATHINFO_EXTENSION);

    	$video_ex_lc = strtolower($video_ex);

    	$allowed_exs = array('pdf','3gp','mp3','m4a','wav','m3u','ogg',"mp4", 'webm', 'avi', 'flv');

    	if (in_array($video_ex_lc, $allowed_exs)) {
    		
    		$new_video_name = uniqid("video-", true). '.'.$video_ex_lc;
    		$video_upload_path = 'uploads/'.$new_video_name;
    		move_uploaded_file($tmp_name, $video_upload_path);

    		// Now let's Insert the video path into database
			
            $sql = "INSERT INTO videos(video_url,posting_id) 
			VALUES('$new_video_name',$posting_id)";

         ?>   
		 <div style="text-align: center;">
<h3 style="display: inline-block; margin: 30; padding: 30; font-size: 25px; font-weight: bold; color: #333; background-color: violet; ">Posting ID: <?php echo $posting_id; ?></h3><br>
<h3 style="display: inline-block; margin: 30; padding: 30; font-size: 25px; font-weight: bold; color: #333; background-color: violet; ">Video Upload Successfully</h3>
</div>
<?php
            if($sql){
				//echo "check check";
				//echo "<h1 style=display : background-color: violet;> Video Upload Successfully</h1>";
				//exit;
			}else{
				echo "query is not executed";
			}
			$result=mysqli_query($conn, $sql);
			if(!$result){
				echo "No this is not thing".mysqli_error($conn);
			}else{
				
			}
            //header("Location:view.php");
    	}else {
    		$em = "You can't upload files of this type";
    		//header("Location: index.php?error=$em");
    	}
    }


}else{
	header("Location: index.php");
}
echo "<style>

.posting-id {
  display: inline-block; /* Display as inline block to be on the same line */
  margin: 0; /* Reset margin */
  padding: 0; /* Reset padding */
  font-size: 18px; /* Adjust font size */
  font-weight: bold; /* Adjust font weight */
  color: #333; /* Set text color */
}
</style>";


