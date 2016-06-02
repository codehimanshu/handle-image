<html>
	<head>
		<title>
			Image Uploading
		</title>
	</head>
	<body>
		Upload an image to view it.
                <form action="" method="post" enctype="multipart/form-data"> 
			<input type="file" name="image" required>
			<button type="submit" name="upload">Upload</button>
		</form>
		<?php
        	$link=mysql_connect('localhost','root','') or die(mysql_error());
        	$db=mysql_select_db("image",$link) or die("Error in Database");
        	if(isset($_POST["upload"]))
        	{
        		$file=$_FILES['image']['tmp_name'];
        		$image=addslashes(file_get_contents($file));
        		$image_name=addslashes($_FILES['image']['name']);
        		$image_size=getimagesize($_FILES['image']['tmp_name']);
        		if(!$image_size)
        		{
        			echo "Not an image";
        		}
        		else
        		{
        			$result=mysql_query("INSERT INTO images values ('','$image_name','$image')",$link) or die(mysql_error());
        			if(!$result)
        			{
        				echo "Error Uploading... Pls Retry";
        			}
        			else
        			{
        				echo "Image Uploaded";
					$id=mysql_insert_id();
					echo "<img src='get.php?id=$id' height=200px>";
        			}
        		}
        	}
		?>
	</body>
</html>