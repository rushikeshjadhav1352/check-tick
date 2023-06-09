<!-- header  files -->
<?php include 'includes/database.php';?>
<?php include 'includes/header.php';?>
<?php include 'includes/navigation.php';?>
<?php include 'includes/functions.php';?>

<!-- <?php
	// GET variable 'l' = 'x' means login authentication failed in login.php
	// if(isset($_GET['l'])) {
		// $l = mysqli_real_escape_string($con, $_GET['l']);
		// if($l == 'x') {
			// echo "<script>
				// alert('username/password combination not found. Please try again.');
						// </script>";	
		// }
	// }
?> -->
<!-- video-upload-php-and-mysql-main -->
<?php 
	// find total number of posts to determine number of pages for pagination
	
$myConnection = Connection::$con;
	$query = "SELECT * FROM cms_posts";
	$result = mysqli_query(Connection::$con, $query);
	$total_posts = mysqli_num_rows($result);
	$total_pages = ceil($total_posts / POSTSPERPAGE);
	
	// if $total_pages is 0, set it to 1 so pagination will not look for page 0
	if($total_pages < 1) {
		$total_pages = 1;
	}

	// check $_GET to get page number for pagination, otherwise start with page 1 
	if(isset($_GET['p'])) {
		$page = mysqli_real_escape_string(Connection::$con, $_GET['p']);

		// the 1st number in LIMIT is a multiple of POSTSPERPAGE starting at 0
		$first_limit = ($page - 1) * POSTSPERPAGE;
	} else {
		// $first_limit is needed for LIMIT clause, $page is needed for setting
		// active class of pagination buttons
		$first_limit = 0;
		$page = 1;
	}
	
	// create LIMIT clause
	$limit_clause = "LIMIT $first_limit, " . POSTSPERPAGE;
	
	// find all posts
	$q = "SELECT cms_posts.*, cms_users.user_image,videos.* FROM cms_posts
	INNER JOIN cms_users ON cms_posts.post_author = cms_users.user_uname
	LEFT JOIN videos ON cms_posts.post_id = videos.posting_id
	WHERE post_status = 'Published' ORDER BY post_date DESC";


	$posts = mysqli_query( Connection::$con, $q);
	
	
	if(!$posts) {	
		$div_class = 'danger';
		$div_msg = 'Database error: ' . mysqli_error(Connection::$con);
	} else {
		$post_count = mysqli_num_rows($posts);		
		if($post_count == 0) {
			$div_class = 'danger';
			$div_msg = "Sorry, no posts found.";
		} else {
			$div_class = 'success';
			$div_msg = "Showing all published posts.";
		}
	}	
	
?>
<!-- special alert div -->
<?php if(!empty($div_msg)):?>
<div class="alert alert-<?php echo $div_class;?>">
	<?php echo $div_msg;?>
</div>
<?php endif;?>			

<!-- Blog Post Begins Here -->

<?php foreach($posts as $post):?>
<h2>
<a href="post.php?pid=<?php echo $post['post_id'];?>"><?php echo $post['post_title'];?></a>
</h2>
<p class="lead">by 
	<a href="aposts.php?u=<?php echo $post['post_author'];?>">
		<?php echo $post['post_author'];?>
		<img src="images/<?php echo $post['user_image'];?>" width="64px" height="64px">
	</a>   
</p>
<p><span class="glyphicon glyphicon-time"></span> 
<?php date_default_timezone_set(TZ); ?>
	Posted on <?php echo date('M. j, Y, g:i a', strtotime($post['post_date']));?></p>
<hr>
<?php $post['video_url'];
if (isset($post['video_url'])){
$video_url = $post['video_url'];

$file_extension = pathinfo($video_url, PATHINFO_EXTENSION);
if ($file_extension == 'mp4') {

?>
        <video src="/video-upload-php-and-mysql-main/uploads/<?=$video_url?>" controls width="640" height="480"></video>
		<?php } elseif ($file_extension == 'm4a') {
        // Display as M4A audio
        ?>
        <audio src="/video-upload-php-and-mysql-main/uploads/<?=$video_url?>" controls></audio>
        <?php
    }elseif ($file_extension == 'pdf') {
        // Display as M4A audio
        ?>
        <embed src="/video-upload-php-and-mysql-main/uploads/<?=$video_url?>" type="application/pdf" width="100%" height="500px" />
        <?php
    }

?>

<!-- <video src="/video-upload-php-and-mysql-main/uploads/<?=$post['video_url']?>" controls width="640" height="480">
	        </video> -->




<?php }else{ ?>
<a href="post.php?pid=<?php echo $post['post_id'];?>">
<?php empty($post['post_image'])?$post['post_image']='post_default.png':
		$post['post_image'];?>
	<img class="img-responsive" src="images/<?php echo $post['post_image'];?>" alt="image">
</a>
<?php } ?>
<hr>
<p><?php echo shortenText($post['post_content']);?></p>
<a class="btn btn-primary" href="post.php?pid=<?php echo $post['post_id'];?>">
	Read More <span class="glyphicon glyphicon-chevron-right"></span>
</a>

<hr>
<?php endforeach;?>

<!-- pagination links ---------------------------------------- -->
<div class="pagination-div">
	<ul class="pagination pagination-sm"  >
		<li>
				<a href="index.php?p=1" aria-label="Previous">
  				<span aria-hidden="true">&laquo;</span>
				</a>
			</li>
	  <?php for($i = 1; $i <= $total_pages; $i++):?>
	  <?php if($i == $page):?>
	  <li class="active">
		  	<a href="index.php?p=<?php echo $i;?>"><?php echo $i;?></a>
	  	</li>
	  	<?php else:?>
	  <li>
		  	<a href="index.php?p=<?php echo $i;?>"><?php echo $i;?></a>
	  	</li>
	  	<?php endif;?>
	  <?php endfor;?>
	  <li>
			<a href="index.php?p=<?php echo $total_pages;?>" aria-label="Next">
  				<span aria-hidden="true">&raquo;</span>
				</a>
			</li>
		</ul>
	</div>

</div>		<!-- /.col-md-8 -->

<?php  include 'includes/sidebar.php'; ?>     
<?php  include 'includes/footer.php'; ?>
