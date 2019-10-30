<div class="sidebar">
    <div class="block-right">
        <div>
            <h3>Most read</h3>
        </div>

        <div class="block-contant">
            <div class="block-articles-right">

                <?php
                   $articles = mysqli_query($connection, "SELECT * FROM `articles` ORDER BY `views` DESC LIMIT 5");
                   while($art = mysqli_fetch_assoc($articles))
                {
                ?>

                <div class="article-right">
                    <div class="article-image" style="background-image: url(images/<?php echo $art['image']; ?>) ;" ></div>
                    <div class="article-info">
                        <div class="article-title">
                            <a href="pages/article.php?id=<? echo $art['id']; ?>">
                                <?php echo $art['title']; ?>
                            </a>
                        </div>

                        <?php
                        $art_cat = false;
                           foreach($categories as $value)
                           {
                               if($value['id'] == $art['categorie_id']){
                                   $art_cat = $value;
                                   break;
                               }
                           }
                        ?>

                        <div class="article-categorie">
                            Category:
                            <a href="categories.php?id= <? echo $art_cat['id']; ?>">
                                <?php echo $art_cat['categorie']; ?>
                            </a>
                        </div>
                        <div class="article-text">
                            <? echo mb_substr($art['text'], 0, 75, 'utf-8') . '...'; ?>
                        </div>
                    </div>
                </div>

                <?php
                }
                ?>

            </div>
        </div>
        <!--<div class="block-contant">
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
        </div> -->
    </div>

    <div class="block-right-comments">
        <div>
            <h3>Last comments</h3>
        </div>
        <div class="block-contant">
            <div class="block-articles-right">

                <?php
                   $comments = mysqli_query($connection, "SELECT * FROM `comments` ORDER BY `id` DESC LIMIT 5");
                   while($comment = mysqli_fetch_assoc($comments)) {
                       ?>

                       <div class="article-right">
                           <div class="article-info">
                               <div class="article-title">
                                   <?php echo $comment['author']; ?>
                               </div>
                               <div class="article-text">
                                   <?php echo mb_substr($comment['text'], 0, 200, 'utf-8') . '...'; ?>
                               </div>
                           </div>
                       </div>

                   <?php
                   }
                   ?>

            </div>
        </div>

    </div>
</div>