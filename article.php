<?php
include('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" http-equiv="Content-Type">
	<link rel="stylesheet" href="style_about.css">
	<link rel="shortcut icon" type="image/x-icon" href="icon.ico">
	<title>Blog for beginners</title>
</head>
<body>
	<div id="wrapper">
		
		<?php include('header.php'); ?>

		<div class="container">

			<?php
			$article = mysqli_query($connection, "SELECT * FROM articles WHERE id = " . $_GET['id']);
			if(mysqli_num_rows($article) <= 0)
			{	
			?>

			<div class="block-left">
				<div>
				    <h3>Article not found!</h3>
				</div>
				<div class="block-contant">
					<div class="block-articles">
						<div class="article">
							<div class="article-image"></div>
							<div class="article-info">
								<div class="article-title"></div>
								<div class="article-categorie"></div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<?php include('sidebar.php') ?>

			<?php
			}
			else
			{
			$art = mysqli_fetch_assoc($article);
			//счетчик просмотров
			mysqli_query($connection, "UPDATE articles SET views = views +1 WHERE id =" . $_GET['id']);
			?>            

			<div class="block-left">
				<div class="block-left-top">
					<div>
					    <h3> <?php echo $art['title']; ?> </h3>
					    <h4>Views: <?php echo $art['views']; ?> </h4>
					</div>
					<div class="block-contant">
						<div class="block-articles">
							<div class="article">
								<img src="images/<?php echo $art['image'] ?>" style="max-width: 100%;">
								<div class="article-info">

									<?php
									foreach($categories as $cat)
									{
										if($cat['id'] == $art['categorie_id'])
										{
										$article_categorie = $cat;
										break;
									    }
									}
									?>

									<div class="article-text">Text: <?php echo $art['text']; ?></div>
								</div>
							</div>
						</div>
					</div>
			    </div>

			    <div class="block-left-comments">
					<div >
					    <h3> Comments </h3>
					    <a href="#block-left-form"> Add yours comment </a>
					</div>
					<?php
					$comments = mysqli_query($connection, "SELECT * FROM comments WHERE article_id =" . $_GET['id']);
					?>

					<?php
					if(mysqli_num_rows($comments) <=0)
					{
					?>				
					<div class="block-contant">
						<div class="block-articles">
							<div class="article">
								<div class="article-info">
									<div class="article-text"> No comments to this article!</div>
								</div>
							</div>
						</div>
					</div>
					<?php
					}
					?>
					<?php
					while($com = mysqli_fetch_assoc($comments))
					{
					?>
					<div class="block-contant">
						<div class="block-articles">
							<div class="article">
								<div class="article-info">
									<div class="author">Author: <?php echo $com['name']; ?> </div>
									<div class="article-text">Text: <?php echo $com['text'];?></div>
								</div>
							</div>
						</div>
					</div>
					<?php
				    }
				    ?>
			    </div>

			    <div class="block-left-form" id="block-left-form">
				    <form class="form" action="#block-left-form" method="POST">

				    	<?php
				    	$name = $_POST['name'];
				    	$email = $_POST['email'];
				    	$text = $_POST['text'];
			    		if(isset($_POST['do_submit']))
			    		{
			    			mysqli_query($connection, "INSERT INTO comments (name, email, text, article_id) VALUES ('$name', '$email', '$text', $art[id]) ");
			    			echo '<span style="color: green; margin: 10px 0; display: block;"> Комментарий успешно добавлен! </span>';
			    		}
			    	    ?>

				    	<input type="text" name="name" class="name" placeholder="Name" required><br>
				    	<input type="email" name="email" class="email" placeholder="Email" required><br>
				    	<textarea name="text" cols="45" rows="10" placeholder="Comment" required></textarea><br>
				    	<input type="submit" name="do_submit">
				    	<input type="reset" name="do_reset">
				    </form>
			    </div>

			</div>

			<?php include('sidebar.php') ?>

			<?php
		    }
		    ?>

			<div class="clear"></div>	
		</div>

      <?php include('footer.php') ?>
	       
    </div>

</body>
</html>