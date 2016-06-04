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
                                        $image=mysql_query("SELECT * FROM images WHERE id='$id'",$link) or die(mysql_error());
                        $image=mysql_fetch_assoc($image);
                        $uri='data:image/jpg;base64,'.base64_encode($image['image']);
					echo "<img src='$uri' height='200px'>";
        			}
        		}
        	}
		?>