<html>
	<head>
		<title>
			Image Uploading
		</title>
	</head>
	<body>
		Upload an image to view it.
                <form action="get.php" method="post" enctype="multipart/form-data"> 
			<input type="file" name="image" required>
			<button type="submit" name="upload">Upload</button>
		</form>
		
	</body>
</html>