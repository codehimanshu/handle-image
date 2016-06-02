		<?php
        	$link=mysql_connect('localhost','root','') or die(mysql_error());
        	$db=mysql_select_db("image",$link) or die("Error in Database");
        	$id=$_GET['id'];
			$image=mysql_query("SELECT * FROM images WHERE id='$id'",$link) or die(mysql_error());
			$image=mysql_fetch_assoc($image);
			$uri='data:image/jpg;base64,'.base64_encode($image['image']);
		?>
		<img src="<?php echo $uri;?>">