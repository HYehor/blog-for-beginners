<?php
include_once '../config/db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" http-equiv="Content-Type">
    <link rel="stylesheet" href="../style.css">
    <link rel="shortcut icon" type="image/x-icon" href="icon.ico">
    <title> <? echo $config['title']; ?> </title>
</head>
<body>
<div id="wrapper">

    <? include 'header.php'; ?>
    <?php
       $article = mysqli_query($connection, "SELECT * FROM `articles` WHERE `id` =" . $_GET['id']);
       if(mysqli_num_rows($article) <= 0)
       {
    ?>
    <div class="container">
        <div class="left">
            <div class="block-left">
                <div class="block-contant">
                    <div class="block-articles">
                        <div class="article">
                            <div class="article-image">
                                <img src="../images/bolt.jpg" alt="">
                            </div>
                            <div class="article-info">
                                <div>
                                    Article not found!
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include 'sidebar.php'; ?>

        <div class="clear"></div>
    </div>

    <?php
       } else {
           $art = mysqli_fetch_assoc($article);
       ?>

    <div class="container">
        <div class="left">
            <div class="block-left">
                <div class="block-contant">
                    <div class="block-articles">
                        <div class="article">
                            <div class="article-image" style="height: auto;">
                                <img src="../images/<? echo $art['image']; ?>" >
                            </div>
                            <div class="article-info" style="float: right;">
                                <div class="article-views">
                                    <?php echo $art['views']; ?>
                                </div>
                                <div class="article-title">
                                    <?php echo $art['title']; ?>
                                </div>
                                <div class="article-text">
                                    <?php echo $art['text']; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="block-left-2">
                <div>
                    <a href="#">
                        All comments
                    </a>
                    <h3>
                        Comments to this article
                    </h3>
                </div>
                <div class="block-contant">
                    <div class="block-articles">

                        <?php
                        //запрос в БД к таблице articles
                        $comments = mysqli_query($connection, "SELECT * FROM `comments` WHERE `articles_id` =" . $art['id'] . " ORDER BY `id` DESC LIMIT 5");
                        ?>
                        <?php
                        if(mysqli_num_rows($comments) <=0)
                        {
                            echo 'No comments to this article';
                        }
                        //цикл будет выводить все данные из таблицы articles
                        while($com = mysqli_fetch_assoc($comments))
                        {
                            ?>

                            <div class="article">
                                <!-- стиль указан как в css, путь к папке с картинками, а название картинки берем из БД -->
                                <div class="article-image" style=""></div>
                                <div class="article-info">
                                    <div class="article-title">
                                    </div>
                                    <div class="article-categorie">
                                        Name of author:
                                        <? echo $com['author']; ?>
                                    </div>
                                    <!-- функция обрезает необходимое количество символов текста -->
                                    <div class="article-text">
                                        <? echo $com['text']; ?>
                                    </div>
                                </div>
                            </div>

                            <?php
                            //закрываем цикл while
                        }
                        ?>

                    </div>
                </div>
            </div>

            <div class="block-left-2" id="comment_form">
                <div>
                    <h3>
                        Add your comment
                    </h3>
                </div>
                <div class="block-contant">
                    <div class="block-articles">
                        <!--необходимо сделать якорь на форму-->
                        <form action="article.php?id=<? echo $art['id'];?>#comment_form" method="post">

                            <?php
                                $errors = [];
                                if(isset($_POST['submit']))
                                {
                                    if($_POST['name'] == '')
                                        $errors[] = 'Enter your name!';
                                    if($_POST['password'] == '')
                                        $errors[] = 'Enter your password!';
                                    if($_POST['email'] == '')
                                        $errors[] = 'Enter your Email!';
                                    if($_POST['text'] == '')
                                        $errors[] = 'Enter text!';
                                    if(empty($errors))
                                    {
                                        //добавить комментарий
                                        $res = mysqli_query($connection, "INSERT INTO `comments`(`author`, `password`, `email`, `text`)
                                                                                 VALUES ('')");
                                        echo '<span style="color: green; font-weight: bold;">' . 'Comment is added!' . '</span>' . '<br>';
                                    }else
                                    {
                                        //вывести ошибку
                                        echo '<span style="color: red; font-weight: bold;">' . $errors[0] . '</span>' . '<br>';
                                    }
                                }
                            ?>

                            <input type="text" name="name" placeholder="your name" value="<?php echo $_POST['name'];?>">
                            <input type="password" name="password" placeholder="your password" value="">
                            <input type="email" name="email" placeholder="your email" value="<?php echo $_POST['email'];?>"> <br> <br>
                            <textarea name="text" cols="75" rows="5" placeholder="your text">
                            </textarea> <br> <br>
                            <input type="submit" name="submit" value="Add comment">
                        </form>
                    </div>
                </div>
            </div>

        </div>


        <?php include 'sidebar.php'; ?>

        <div class="clear"></div>
    </div>

    <?
       }
    ?>

    <? include_once 'footer.php'; ?>

</div>

</body>
</html>


