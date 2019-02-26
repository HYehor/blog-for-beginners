<?php
include('connection.php');
?>

<header>
   <div id="header-top">
	    <div id="header-top-content">
	    	<div id="logo">
	    	    <h1>BLOG FOR BEGINNERS</h1>
	        </div>
	        <nav>
		    	<ul>
		    		<li><a href="http://github/blog-for-beginners/"> Main </a></li>
		    		<li><a href="about.php"> About us </a></li>
		    		<li><a href="contacts.php"> Contacts </a></li>
		    		<li><a href="http://facebook.com" target="_blank"> We in facebook </a></li>
		    	</ul>
	        </nav>
	    </div>
    </div>

    <div id="header-center">
    	<img src="P70609-125320.jpg" alt="">    	
    </div>

    <?php
       $categories = mysqli_query($connection, "SELECT * FROM categories");
       $cat = mysqli_fetch_assoc($categories);
    ?>

    <div id="header-bottom">
        <nav>
        	<ul>
        		<?php
                   foreach($categories as $cat)
                   {
        		?>
        		<li>
        			<a href="categories.php?id=<?php echo $cat['id'] ?>"> <?php echo $cat['title']; ?> </a>
        		</li>
        		<?php
        	       }
        		?>
        	</ul>
        </nav>		    	
    </div>
</header>