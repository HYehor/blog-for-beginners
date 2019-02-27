<?php
include('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" http-equiv="Content-Type">
	<link rel="stylesheet" href="style_.css">
	<link rel="shortcut icon" type="image/x-icon" href="icon.ico">
	<title>Blog for beginners</title>
</head>
<body>
	<div id="wrapper">
		
		<?php include('header.php'); ?>

		<div class="container">

			<div class="block-left">
				<div>
					<a href="all_articles.php">All articles</a>
				    <h3>Latest published</h3>
				</div>
				<div class="block-contant">
					<div class="block-articles">

						<?php
						$article = mysqli_query($connection, "SELECT * FROM articles ORDER BY id DESC LIMIT 5");						
						?>
						<?php
						while($art = mysqli_fetch_assoc($article))
						{
						?>

						<div class="article">
							<div class="article-image" style="background-image: url(images/<?php echo $art['image']; ?>)"></div>
							<div class="article-info">
								<div class="article-title">Title: <a href="article.php?id= <?php echo $art['id']; ?>"> <?php echo $art['title']; ?></a></div>
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
								<div class="article-categorie">Categorie: <a href="categories.php?id=<?php echo $article_categorie['id']; ?>"> <?php echo $article_categorie['title']; ?> </a> </div>
								<div class="article-text">Text: <?php echo $art['text']; ?></div>
							</div>
						</div>
						<?php
					    }
						?>
					</div>
				</div>					
		    </div>

             <?php include('sidebar.php') ?>

			<div class="clear"></div>	
		</div>

      <?php include('footer.php') ?>
	       
    </div>

</body>
</html>