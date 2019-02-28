<?php
 include('connection.php');
?>

<?php
$article = mysqli_query($connection, "SELECT * FROM articles ORDER BY views DESC LIMIT 5");
$categorie = mysqli_query($connection, "SELECT * FROM categories");
$cat = mysqli_fetch_assoc($categorie);
?>
<div class="sidebar">
	<div class="block-right">
		<div>
		    <h3>Most read</h3>
		</div>
		<?php
		while($art = mysqli_fetch_assoc($article))
		{
		?>
		<div class="block-contant">
			<div class="block-articles-right">
				<div class="article-right">
					<div class="article-image" style="background-image: url(images/<?php echo $art['image']; ?>);"></div>
					<div class="article-info">
						<?php
						foreach($categorie as $cat)
						{
                           if($art['categorie_id'] == $cat['id'])
                           {
                           	$article_categorie = $cat;
                           	break; 
                           }
						}
						?>
						<div class="article-title">Title: <a href="article.php?id= <?php echo $art['id']; ?>"><?php echo $art['title']; ?> </a> </div>
						<div class="article-categorie">Categorie: <a href="categories.php?id= <?php echo $art['categorie_id']; ?>"><?php echo $article_categorie['title']; ?> </a> </div>
						<div class="article-text">Text: <?php echo mb_substr($art['text'], 0, 85, 'utf-8') . "..."; ?></div>
					</div>
				</div>
			</div>
		</div>
		<?php
	    }
	    ?>
	</div>

	<div class="block-right-comments">
		<div>
		    <h3>Comments</h3>
		</div>
		<div class="block-contant">
			<div class="block-articles-right">
				<div class="article-right">
					<div class="article-image"></div>
					<div class="article-info">
						<div class="article-title">Title:</div>
						<div class="article-categorie">Categorie:</div>
						<div class="article-text">Text: argbmqib[efwgwgwg a ahrghah ah ahtahath aththnysj dukiflk oinbqwuibn[ervqervqv</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>