<?php
//echo "your are welcone";

//echo dirname(__FILE__);
class post{
	public $post_author;
	public $post_title;
	public $post_add_date;
	public $post_edit_date;
	public $post_type;
	public $blog_post_type;
	public $post_content;

  public $post_data;
	//public $con=mysqli_connect('localhost','root','','cms_new');
	public function __construct($post_author, $post_title, $post_add_date, $post_edit_date, $post_type,$blog_post_type,$post_content) {
		
		$con=mysqli_connect('localhost','root','','cms_new');
		$this->post_author = mysqli_real_escape_string($con,$post_author);
		$this->post_title = mysqli_real_escape_string($con,$post_title);
		//$this->post_add_date = mysqli_real_escape_string($con,'$post_add_date;
		$this->post_edit_date = $post_edit_date;
		$this->post_type = mysqli_real_escape_string($con,$post_type);
		$this->blog_post_type=mysqli_real_escape_string($con,$blog_post_type);
		$this->post_content=mysqli_real_escape_string($con,$post_content);
		
	}
	public function addPost() {
		// establish a connection to the database
		$con = mysqli_connect("localhost", "root", "", "cms_new");
		$q = "INSERT INTO post_update (post_author, post_title, post_add_date, post_edit_date, post_type, blog_post_type, post_content)
      VALUES ('$this->post_author', '$this->post_title', NOW(), NOW(), '$this->post_type', '$this->blog_post_type', '$this->post_content')";
		
	$result = mysqli_query($con, $q);
	if($result){
		echo "Insert succesfully ";
	}else{
		echo "failed check query".mysqli_error($con);
	}
		if($this->post_type == 'Blog') {

			
		if($this->blog_post_type == 'video') {
			
			
	$posting_id=mysqli_insert_id($con);
	echo $posting_id.'<br>';
//include "video_post.php";
//exit;
 echo '<script>
 window.open("../admin/admin_includes/video_post.php?posting_id='.$posting_id.'", "_blank");
 </script>';
 exit;
  ?>
  
<!-- //  <script>
	openTab();
	fu
 </script> -->
	

	<?php
} elseif($this->blog_post_type == 'audio') {
			 // code to add audio blog post
			 echo '<script type="text/javascript">
			 window.open("../admin/admin_includes/audio_post.php", "_blank");
			 </script>';








		} elseif($this->blog_post_type == 'pdf') {
			 // code to add pdf blog post
		} else {
			// invalid blog post type
		}
	} else {
		// code to add basic post
	}

		$posting_id = mysqli_insert_id($con); // get the last inserted ID

		// close the database connection
		//mysqli_close($con);
	
}
}

?>

<?php
if(isset($_POST['addpostsubmit'])) {
	//echo "failed ";
	$post = new post($_POST['post_author'], $_POST['post_title'], $_POST['post_add_date'], $_POST['post_edit_date'], $_POST['post_type'],$_POST['blog_post_type'],$_POST['post_content']);
	echo $_POST['post_title'];
	$post_data = serialize($post);
	$post_data = urlencode($post_data);
	$post->addPost();
}

?>













<?php
	//if(isset($_POST['addpostsubmit'])) {
// 		//echo $_POST['post_status'];
// 		//echo $_POST['post_type'];
// 		$author = mysqli_real_escape_string($con, $_POST['post_author']);
// 		$title = mysqli_real_escape_string($con, $_POST['post_title']);
// 		$cat = $_POST['post_category'];
// 		$status = mysqli_real_escape_string($con, $_POST['post_status']);
// 		$tags = mysqli_real_escape_string($con, $_POST['post_tags']);
// 		$image = mysqli_real_escape_string($con, $_FILES['post_image']['name']);
// 		$image_tmp = $_FILES['post_image']['tmp_name'];
// 		$content = mysqli_real_escape_string($con, $_POST['post_content']);
		
// 		move_uploaded_file($image_tmp, "../images/$image");
		
// 		$q = "INSERT INTO cms_posts
// 				(post_cat_id, post_title, post_author, post_date, post_image,
// 				post_content, post_tags, post_status)
// 				VALUES ($cat, '$title', '$author', now(), '$image', '$content',
// 				'$tags', '$status')";
		
// 		$result = mysqli_query($con, $q);
// 		//echo "kit kit";
//         echo "New record has id: " . mysqli_insert_id($con);
		
// 		$posting_id=mysqli_insert_id($con);
// 		$div_info = confirmQuery($result, 'insert');
// 		$div_class 		= $div_info['div_class'];
// 		$div_msg 			= $div_info['div_msg'];
// 		$git=1;

// 		$posting_id=mysqli_insert_id($con);
// 		if($_POST['post_type']=='Blog' && $git==1){
// 			//include "../../video-upload-php-and-mysql-main/index.php?posting_id=".$posting_id;
// 			$git=2;
// 			echo '<script>
// 			var posting_id = ' . $posting_id . ';

// 			//echo "boonga";
// 			 window.open("../../video-upload-php-and-mysql-main/index.php?posting_id="+ posting_id, "_blank");


// </script>';

?>
<script>
				//openTab();
			// function openTab() {
			// 	window.open("../../video-upload-php-and-mysql-main/index.php", "_blank");
				
			//     }
			</script>
			<?php
			//include "../../video-upload-php-and-mysql-main/index.php";
//$video_file_path = 'include "../../video-upload-php-and-mysql-main/index.php"';
//header('Content-Type: video/mp4');
//header('Content-Disposition: inline; filename="video.mp4"');
//header('Content-Length: ' . filesize($video_file_path));
//readfile($video_file_path);
//exit;


		
		//}
	
	?>



<?php 
	// get category name from databae for dropdown field
	
	$q = "SELECT * FROM cms_categories ORDER BY cat_title";
	$con= mysqli_connect('localhost','root','','cms_new');
	
	$cats = mysqli_query($con, $q);
	
	// this is a special case, so it does not user confirmQuery()
	if(!$cats) {
		$div_class = "danger";
		$div_msg = "Database failed: ".mysqli_error($con);
	}
?>

<h2 class="page-title">Add Post:</h2>
<!---------------------------- alert div --------------------------- -->
<?php if(!empty($div_msg)):?>
<div class="row">
	<div class="col-md-12">
		<div class="alert alert-<?php echo $div_class;?>">
			<?php echo $div_msg;?>
			
		</div>
	</div>
</div>
<?php endif;?>

<?php
	if(!empty($_SESSION['username'])) {
		$author = $_SESSION['username'];
	} else {
		header('Location: ../index.php');
	}
?>
<!-- ------------------------- begin form -------------------------- -->
<form action="" method="post" enctype="multipart/form-data">
	<!-- hidden input field to hold post_author -->
	<input type="hidden" name="post_author" value="<?php echo $author;?>">
	
	<div class="form-group">
		<label for="post_author">Post Author (You may not post under a different name.)</label>
		<input type="text" class="form-control" name="post_author_disabled"
			value="<?php echo $author?>" disabled>
	</div>	
	<div class="form-group">
		<label for="post_title">Post Title</label>
		<input type="text" class="form-control" name="post_title">
	</div>
	
	
	<div class="row">	<!-- ------------------------------------------- -->
	<div class="col-md-4">	
	
	
	<div class="form-group">
    <label for="post_add_date">Post Add Date</label>
    <input type="date" name="post_add_date" id="post_add_date">
</div>
<div class="form-group">
    <label for="post_edit_date">Post edit Date</label>
    <input type="date" name="post_edit_date" id="post_edit_date">
</div>
	
	<?php echo "checks"; ?>
	<div class="form-group">
		<label for="post_type" target="_blank">Post Type</label>
		<select name="post_type">
			<option value="Basic">Basic Post</option>
			<option value="Blog" >Blog Post</option>
		</select>
	</div>

	<div class="form-group">
		<label for="post_type" target="_blank">Post Type</label>
		<select name="blog_post_type">
			<option value="video">Video Post</option>
			<option value="audio" >Audio Post</option>
			<option value="pdf" >PDF Post</option>
		</select>
	</div>
	
	</div>
	
	
	
	
	<!-- /.col-md-4 ---------------------------------------- -->
	<div class="col-md-8">
	
	
	<div class="form-group">
		<label for="title">Post Content</label>
		<textarea class="form-control" name="post_content" rows="16"></textarea>
	</div>
	
	</div>		<!-- /.col-md-8 -->
	</div>		<!-- /.row --------------------------------------------- -->
	
	
	<button type="submit" name="addpostsubmit" class="btn btn-success add-del-btn">
		<i class="fa fa-plus"></i> Add Post</button>
	<a href="posts.php" class="btn btn-primary">
			<i class="fa fa-eye"></i> View All Posts</a>
			
</form>
