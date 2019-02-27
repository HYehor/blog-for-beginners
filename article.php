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

			<?php
		    }
		    ?>

             <?php include('sidebar.php') ?>

			<div class="clear"></div>	
		</div>

      <?php include('footer.php') ?>
	       
    </div>

</body>
</html>