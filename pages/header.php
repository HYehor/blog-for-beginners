<header>
    <div id="header-top">
        <div id="header-top-content">
            <div id="logo">
                <h1> <? echo $config['title']; ?> </h1>
            </div>
            <nav>
                <ul>
                    <li><a href="/"> Main </a></li>
                    <li><a href="pages/about_me.php"> About me </a></li>
                    <li><a href="#"> Contacts </a></li>
                    <li><a href="http://facebook.com" target="_blank"> I in facebook </a></li>
                </ul>
            </nav>
        </div>
    </div>

    <?php
    //запрос в БД
       $categories = mysqli_query($connection, "SELECT * FROM `articles_categories`");
    ?>

    <div id="header-bottom">
        <nav>
            <ul>
                <?php
                //цикл проходится по всем записям таблицы категорий
                   while($cat = mysqli_fetch_assoc($categories))
                   {
                    ?>
                <li>
                    <a href="#"> <?php echo $cat['categorie']; ?> </a>
                </li>
                <?php
                   }
                ?>
            </ul>
        </nav>
    </div>
</header>
