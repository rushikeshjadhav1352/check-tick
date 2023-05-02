<!DOCTYPE html>
<html>
<head>
	<title>My Form</title>
	<style>
		body {
			background-color: #f7ecb5;
		}
		nav {
			background-color: #333;
			color: white;
			padding: 10px;
		}
		form {
			background-color: #444;
			padding: 20px;
			margin: 0 auto;
			height: 500px;
			color: white;
			width: 1000px;
			/* text-align: center; */
		}
	</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      
        <a class="nav-link" href="#">Home</a>
      
    
        <a class="nav-link" href="#">User</a>
     
     
        <a class="nav-link" href="#">Check</a>
      
    </ul>
  </div>
</nav>



	<form method="POST" action="" enctype="multipart/form-data">
		<div class="form-group" style="margin-bottom: 40px;">
			<label for="video_file">audio file:</label>
			<input type="file" class="form-control" name="video_file" id="video_file" accept="video/*" ><br><br>
		</div>
			<div class="form-group" style="margin-bottom: 70px;">
				<label for="video_duration">audio duration:</label>
				<input type="text" class="form-control" name="video_duration" id="video_duration" min="1"><br><br>
			</div>
			<div class="row">
				<div class="col-md-4">
					<label for="video_resolution">Audio resolution:</label>
					<select name="video_resolution" id="video_resolution">
						<option value="">Select a resolution</option>
						<option value="240p">240p</option>
						<option value="360p">360p</option>
						<option value="480p">480p</option>
						<option value="720p">720p</option>
						<option value="1080p">1080p</option>
						<option value="4K">4K</option>
					</select><br><br>
					<label for="video_type">audio type:</label>
					<select name="video_type" id="video_type">
						<option value="">Select a type</option>
						<option value="MP3">MP3</option>
						<option value="FLAC">FLAC</option>
						<option value="WAV">WAV</option>
						<option value="AAC">AAC</option>
						<option value="OGG">OGG</option>
					</select><br><br>
					<div class="container">
					<input type="submit" name="addvideosubmit" value="Submit" style="margin-top: 200px;">
					</div>
				</div>
			</div>
		</div>
	</form>
</body>
</html>