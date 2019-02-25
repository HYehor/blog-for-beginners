<?php
include('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" http-equiv="Content-Type">
	<link rel="stylesheet" href="style__.css">
	<link rel="shortcut icon" type="image/x-icon" href="icon.ico">
	<title>Blog for beginners</title>
</head>
<body>
	<div id="wrapper">
		
		<?php include('header.php'); ?>

		<div class="container">
			<div class="block-left">
				<div>
					<a href="#">All articles</a>
				    <h3>Latest published</h3>
				</div>
				<div class="block-contant">
					<div class="block-articles">
						<div class="article">
							<div class="article-image"></div>
							<div class="article-info">
								<div class="article-title">Title:</div>
								<div class="article-categorie">Categorie:</div>
								<div class="article-text">Text: argbmqib[oinbqwuibfadbabafbdababadbabababababn[ervqththjshtsh ahthteh atehethh eh atehervqv</div>
							</div>
						</div>
					</div>
				</div>
				<div class="block-contant">
					<div class="block-articles">
						<div class="article">
							<div class="article-image"></div>
							<div class="article-info">
								<div class="article-title">Title:</div>
								<div class="article-categorie">Categorie:</div>
								<div class="article-text">Text: argbmqib[oinbqwuibfadbabafbdababadbabababababn[ervqththjshtsh ahthteh atehethh eh atehervqv</div>
							</div>
						</div>
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